<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use App\Models\Event;
use App\Models\Features;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Service;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class HomeController extends Controller 
{
    // use InteractsWithViews;
    public function index(): View
    {
        // $members =  User::whereHas("roles", function($q){ $q->where("name", "member_role"); })->get();
        $news = News::where('status',1)->orderBy('id', 'DESC')->paginate(20);
        $scholarshipgrantsOpportunities = NewsCategory::where('slug','scholarshipgrants-opportunities')->first();
        $scholarships = News::where('status',1)
        ->where('category_id', $scholarshipgrantsOpportunities->id)
        ->get();
        $personalities = Profile::where("status","Published")->paginate(6);
        $events = Event::where("status","published")->get();
        $services = Service::where('status',1)->get();
        $features = Features::all();
        $sliders = Slider::where('status',1)->orderBy('id','ASC')->get();
       
        return view('frontend.home', compact('news','services','features','sliders','personalities','events','scholarships'));
    }

    public function aboutUs(){
        $services = Service::where('status',1)->get();
        $members =  User::whereHas("roles", function($q){ $q->where("name", "member_role"); })->orderBy('order_num', 'ASC')->get();
       
        return view('frontend.pages.about',compact('services','members'));
    }

    public function contactUs(){
        $services = Service::where('status',1)->get();
       
        return view('frontend.pages.contact',compact('services'));
    }

    public function companyTeam(){
        $services = Service::where('status',1)->get();
       $members =  User::whereHas("roles", function($q){ $q->where("name", "member_role"); })->orderBy('order_num', 'ASC')->get();
      
       return view('frontend.pages.team',compact('members','services'));
    }

    public function companyProfile($id){
        $services = Service::where('status',1)->get();
        $member = User::where('id',$id)->first();
       
        return view('frontend.pages.member',compact('member','services'));
    }


    public function companyService($id){
        $services = Service::where('status',1)->get();
        $service = Service::where('id',$id)->first();
       
        return view('frontend.pages.service',compact('services','service'));
    }

    public function companyProjects(){
        $services = Service::where('status',1)->get();
        
        return view('frontend.pages.projects',compact('services'));
    }

    public function companyFeature($id){
        $services = Service::where('status',1)->get();
        $feature = Features::where('id',$id)->first();
       
        return view('frontend.pages.feature',compact('services','feature'));
    }
    public function eventmagazine($slug){
        $services = Service::where('status',1)->get();
        $eventDetails = Event::where('slug',$slug)->first();
        $events = Event::where("status","published")->paginate(10);
       
        return view('frontend.pages.eventmagazine',compact('services','events','eventDetails'));
    }

    public function comingSoon(){
        $services = Service::where('status',1)->get();
        return view('frontend.pages.coming_soon',compact('services'));
    }
    
    public function magazines(){
        $services = Service::where('status',1)->get();
        $magazines = Product::where('status','publish')->orderBy('id','DESC')->paginate(10);
        return view('frontend.pages.magazines',compact('services','magazines'));
    }
    public function magazine($slug){
        $services = Service::where('status',1)->get();
        $magazine = Product::where('slug',$slug)->first();
        return view('frontend.pages.magazine',compact('services','magazine'));
    }

    public function news(){
        $services = Service::where('status',1)->get();
        $news = News::where('status',1)->orderBy('id', 'DESC')->paginate(10);
        $categories = NewsCategory::where('status',1)->get();
        $topnewslist = News::latest()->whereHas('category')->where('status',1)->orderBy('id', 'DESC')->paginate(10);
        return view('frontend.pages.news',compact('services','news','categories','topnewslist'));
    }
    public function scholarship_grants_opportunities(){
        $services = Service::where('status',1)->get();
        $scholarshipgrantsOpportunities = NewsCategory::where('slug','scholarshipgrants-opportunities')->first();
        $scholarships = News::where('status',1)
        ->where('category_id', $scholarshipgrantsOpportunities->id)
        ->paginate(10);
        // $categories = NewsCategory::where('status',1)->get();
        // $topnewslist = News::latest()->whereHas('category')->where('status',1)->orderBy('id', 'DESC')->paginate(10);
        return view("frontend.pages.scholarshipOpportunities",compact('scholarships','services'));
    }

    public function personalities(){
        $services = Service::where('status',1)->get();
        $personalities = Profile::where('status',"Published")->orderBy('id', 'DESC')->paginate(10);
        // dd($personalities);
        $categories = NewsCategory::where('status',1)->get();
        $topnewslist = News::latest()->whereHas('category')->where('status',1)->orderBy('id', 'DESC')->paginate(10);
        return view('frontend.pages.personalites',compact('services','personalities','categories','topnewslist'));
    }
    public function personality($slug){
        $services = Service::where('status',1)->get();
        $personality = Profile::where('slug',$slug)->first();
        $categories = NewsCategory::where('status',1)->get();
        $topnewslist = News::latest()->whereHas('category')->where('status',1)->orderBy('id', 'DESC')->paginate(10);
        return view('frontend.pages.personality',compact('services','personality','categories','topnewslist'));
    }

    public function single_news($slug){
        $services = Service::where('status',1)->get();
        $categories = NewsCategory::where('status',1)->get();
        $news_details = News::where('slug',$slug)->first();
        $news = News::where('status',1)->orderBy('id', 'DESC')->paginate(15);
        return view('frontend.pages.readnews',compact('news_details','services','categories','news'));
    }

    public function newsCategory($slug){
        // return $slug;
        $services = Service::where('status',1)->get();
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
 
        // $validator = Validator::make($request->all(), [
        //     'email' =>    'required',
        //     'password' => 'required',
        //   ]);
          
    
        //    if($validator->fails()){
        //       return response()->json([
        //          'status'=>0, 
        //          'error'=>$validator->errors()->toArray()
        //       ]);
        //     }

        //     $user_cred = $request->only('email', 'password');
        // if (Auth::attempt($user_cred)) {

        //      //if user is logged in and the role is user
        //     // if(Auth()->user()->role=='User'){  
        //        return response()->json([ [1] ]);
        //     // }  

        // }else{
        //      //if user isn't logged in
        //         return response()->json([ [2] ]);
        // }

        // / Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed
            return response()->json([
                'status' => 'success',
                'message' => 'Login successful!',
            ]);
        }

        // Authentication failed
        return response()->json([
            'status' => 'error',
            'message' => 'Invalid credentials!',
        ], 401);
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
