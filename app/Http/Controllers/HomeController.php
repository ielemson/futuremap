<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use App\Models\Features;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(): View
    {
        // $members =  User::whereHas("roles", function($q){ $q->where("name", "member_role"); })->get();
        $news = News::where('status',1)->orderBy('id', 'DESC')->paginate(6);
        $services = Service::all();
        $features = Features::all();
        return view('frontend.home', compact('news','services','features'));
    }

    public function aboutUs(){
        $services = Service::all();
        $members =  User::whereHas("roles", function($q){ $q->where("name", "member_role"); })->orderBy('order_num', 'ASC')->get();
        return view('frontend.pages.about',compact('services','members'));
    }

    public function contactUs(){
        $services = Service::all();
        return view('frontend.pages.contact',compact('services'));
    }

    public function companyTeam(){
        $services = Service::all();
       $members =  User::whereHas("roles", function($q){ $q->where("name", "member_role"); })->orderBy('order_num', 'ASC')->get();
        return view('frontend.pages.team',compact('members','services'));
    }

    public function companyProfile($id){
        $services = Service::all();
        $member = User::where('id',$id)->first();
        return view('frontend.pages.member',compact('member','services'));
    }


    public function companyService($id){
        $services = Service::all();
        $service = Service::where('id',$id)->first();
        return view('frontend.pages.service',compact('services','service'));
    }

    public function companyProjects(){
        $services = Service::all();
        return view('frontend.pages.projects',compact('services'));
    }

    public function companyFeature($id){
        $services = Service::all();
        $feature = Features::where('id',$id)->first();
        return view('frontend.pages.feature',compact('services','feature'));
    }

    public function comingSoon(){
        $services = Service::all();
        return view('frontend.pages.coming_soon',compact('services'));
    }
    
    public function magazines(){
        $services = Service::all();
        $magazines = Product::where('status','publish')->paginate(10);
        return view('frontend.pages.magazines',compact('services','magazines'));
    }

    public function news(){
        $services = Service::all();
        $news = News::where('status',1)->orderBy('id', 'DESC')->paginate(10);
        $categories = NewsCategory::where('status',1)->get();
        $topnewslist = News::latest()->whereHas('category')->where('status',1)->orderBy('id', 'DESC')->paginate(10);
        return view('frontend.pages.news',compact('services','news','categories','topnewslist'));
    }

    public function single_news($slug){
        $services = Service::all();
        $categories = NewsCategory::where('status',1)->get();
        $single_news = News::where('slug',$slug)->first();
        return view('frontend.pages.single_news',compact('single_news','services','categories'));
    }

    public function newsCategory($slug){
        // return $slug;
        $services = Service::all();
        $categories = NewsCategory::where('status',1)->get();
        $getNewsCategory = NewsCategory::where('slug',$slug)->first();
        $topnewslist = News::latest()->whereHas('category')->where('status',1)->orderBy('id', 'DESC')->paginate(10);
        // dd($getNewsCategory);
        $news = News::where('category_id',$getNewsCategory->id)->where('status',1)->orderBy('id', 'DESC')->paginate(10);
        // dd($news);
        return view('frontend.pages.news',compact('services','news','categories','topnewslist'));
    }

    public function StoreUser(Request $request){

        // $validator = Validator::make($request->all(), ['name' => 'required', 'email' => 'required|unique:users','password'=>'required']);
        
        if(User::where('email',$request->email)->exists()){

            return response(['status'=>'error','msg'=>'User already exist']);
        }

        if($request->password != $request->cpassword){

            return response(['status'=>'error','msg'=>'Password mis-match']);
        }

        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
        ]);

        $user->assignRole('User');
        // return $user;
        Auth::login($user);
  
        // return response()->json([
        //     "status" => true, 
        //     "redirect" => url("dashboard")
        // ]);

        return response(['status'=>'success','msg'=>'Account Registered']);
    }

    public function LoginUser(Request $request){
        // // return $request->all();
        // $validator = Validator::make($request->all(), [
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);


        // if ($validator->fails()){
        //     return response()->json([
        //             "status" => false,
        //             "errors" => $validator->errors()
        //         ]);
        // } else {
        //     if (Auth::attempt($request->only("email", "password"))) {
        //         return response()->json([
        //             "status" => true, 
        //             "msg" => "Login successful"
        //         ]);
        //     } 
        //     else {
        //         return response()->json([
        //             "status" => false,
        //             "msg" => "Invalid credentials"
        //         ]);
        //     }
        // }

        $validator = Validator::make($request->all(), [
            'email' =>    'required',
            'password' => 'required',
          ]);
          
    
           if($validator->fails()){
              return response()->json([
                 'status'=>0, 
                 'error'=>$validator->errors()->toArray()
              ]);
            }

            $user_cred = $request->only('email', 'password');
        if (Auth::attempt($user_cred)) {

             //if user is logged in and the role is user
            // if(Auth()->user()->role=='User'){  
               return response()->json([ [1] ]);
            // }  

        }else{
             //if user isn't logged in
                return response()->json([ [2] ]);
        }
    }


    public function CotactForm(Request $request){


        // $validator =  $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'msg_subject' => 'required',
        //     'phone_number' => 'required',
        //     'message_body' => 'required',
        //     'captcha' => 'required|captcha'
        // ]);

    	$validator = Validator::make($request->all(), [
         'name' => 'required',
            'email' => 'required|email',
            'msg_subject' => 'required',
            'phone_number' => 'required',
            'message' => 'required',
            'captcha' => 'required|captcha'

        ],[
            'captcha.required' =>'Invalid captcha'
        ]);

        if ($validator->fails()) {

            return response()->json(['error'=>$validator->errors()->all()]);

        }

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'msg_subject' => $request->msg_subject,
            'phone_number' => $request->phone_number,
            'message_body' => $request->message
        ];
        
        // $userEmail = $request->email;
        Mail::to("info@fmapmedia.com")->send(new ContactMessage($details));
 
        if (Mail::failures()) {
            //  return response()->Fail('Sorry! Please try again latter');
            return response()->json(['status'=>400,'data'=>'Message was not sent, please check your network and try again']);
        }else{
            //  return response()->success('Great! Successfully send in your mail');
            return response()->json(['status'=>200,'msg'=>'Great! we have received your message.']);
           }
      
        // return response()->json(['data'=>$request->all()]);
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    public function clearCache(): View
    {
        Artisan::call('cache:clear');

        return view('clear-cache');
    }
}
