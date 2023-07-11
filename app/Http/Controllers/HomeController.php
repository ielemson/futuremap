<?php

namespace App\Http\Controllers;

use App\Models\Features;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $members =  User::whereHas("roles", function($q){ $q->where("name", "member_role"); })->get();
        $services = Service::all();
        $features = Features::all();
        return view('frontend.home', compact('members','services','features'));
    }

    public function aboutUs(){
        $services = Service::all();
        $members =  User::whereHas("roles", function($q){ $q->where("name", "member_role"); })->get();
        return view('frontend.pages.about',compact('services','members'));
    }

    public function contactUs(){
        $services = Service::all();
        return view('frontend.pages.contact',compact('services'));
    }

    public function companyTeam(){
        $services = Service::all();
       $members =  User::whereHas("roles", function($q){ $q->where("name", "member_role"); })->get();
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
        $news = News::where('status',1)->paginate(10);
        $categories = NewsCategory::where('status',1)->get();
        return view('frontend.pages.news',compact('services','news','categories'));
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
        // dd($getNewsCategory);
        $news = News::where('category_id',$getNewsCategory->id)->paginate(5);
        // dd($news);
        return view('frontend.pages.news',compact('services','news','categories'));
    }
    public function clearCache(): View
    {
        Artisan::call('cache:clear');

        return view('clear-cache');
    }
}
