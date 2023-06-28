<?php

namespace App\Http\Controllers;

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
        return view('front.home', compact('members','services'));
    }

    public function aboutUs(){
        $services = Service::all();
        return view('front.pages.about',compact('services'));
    }

    public function contactUs(){
        $services = Service::all();
        return view('front.pages.contact',compact('services'));
    }

    public function companyProfiles(){
        $services = Service::all();
       $members =  User::whereHas("roles", function($q){ $q->where("name", "member_role"); })->get();
        return view('front.pages.profile',compact('members','services'));
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

    public function clearCache(): View
    {
        Artisan::call('cache:clear');

        return view('clear-cache');
    }
}
