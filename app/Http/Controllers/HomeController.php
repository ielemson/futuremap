<?php

namespace App\Http\Controllers;

use App\Models\Features;
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
        return view('front.home', compact('members','services','features'));
    }

    public function aboutUs(){
        $services = Service::all();
        return view('front.pages.about',compact('services'));
    }

    public function contactUs(){
        $services = Service::all();
        return view('front.pages.contact',compact('services'));
    }

    public function companyTeam(){
        $services = Service::all();
       $members =  User::whereHas("roles", function($q){ $q->where("name", "member_role"); })->get();
        return view('front.pages.team',compact('members','services'));
    }

    public function companyProfile($id){
        $services = Service::all();
        $member = User::where('id',$id)->first();
        return view('front.pages.member',compact('member','services'));
    }


    public function companyService($id){
        $services = Service::all();
        $service = Service::where('id',$id)->first();
        return view('front.pages.service',compact('services','service'));
    }

    public function companyProjects(){
        $services = Service::all();
        return view('front.pages.projects',compact('services'));
    }

    public function companyFeature($id){
        $services = Service::all();
        $feature = Features::where('id',$id)->first();
        return view('front.pages.feature',compact('services','feature'));
    }

    public function comingSoon(){
        $services = Service::all();
        return view('front.pages.coming_soon',compact('services'));
    }
    
    public function magazines(){
        $services = Service::all();
        $magazines = Product::where('status','publish')->paginate(10);
        return view('front.pages.magazines',compact('services','magazines'));
    }
    public function clearCache(): View
    {
        Artisan::call('cache:clear');

        return view('clear-cache');
    }
}
