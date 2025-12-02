<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Events\Registered;

class VendorController extends Controller
{
  
    public function index(){
        return view("vendors.dashboard");
    }
    public function showRegistrationForm()
    {
        $services = Service::where('status',1)->get();
        return view('auth.vendor_register',compact("services"));
    }


       public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'captcha' => 'required|captcha'

        ],[
            'captcha.required' =>'Invalid captcha'
        ]);

        $user = User::create([
            'name' => $request->first_name.' '.$request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
             'password' => $request->password,
            // 'password' => Hash::make($request->password),
        ]);

        Vendor::create([
        'user_id' => $user->id,
        'referral_code' => Str::slug($user->name) . rand(1000, 9999), // or custom logic
        // 'referral_code' => Str::random(10), // or custom logic
                ]);

        $user->assignRole('vendor');
        event(new Registered($user));
        // Auth::login($user);
        // return redirect('/email/verify');
    //    return redirect()->route('login')->with("success","registration complete login to continue");
        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }

        public function product(){
        $vendor = Vendor::where('user_id', auth()->id())->first();
        $magazines = Product::where('status','publish')->orderBy('id','DESC')->get();
        return view("userType.vendor.vendor_magazine",compact("vendor","magazines"));
        }

        public function vendorProfile(){
              $vendor = Vendor::where('user_id', auth()->id())->first();
             return view("userType.vendor.vendor_profile",compact("vendor"));
        }

    public function showTerms()
{
    return view("userType.vendor.vendor_terms"); // Create this view
}

public function acceptTerms(Request $request)
{
    $vendor = Vendor::where('user_id', auth()->user()->id)->first();

    if ($vendor) {
        $vendor->accepted_terms = true;
        $vendor->save();
        return response()->json(['status' => true, 'message' => 'Terms accepted']);
    }

       return response()->json(['status' => false, 'message' => 'Vendor not found'], 404);
}



}

