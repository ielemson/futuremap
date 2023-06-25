<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home');
    }

    public function aboutUs(){
        return view('front.pages.about');
    }

    public function contactUs(){
        return view('front.pages.contact');
    }

    public function companyProfile(){
        return view('front.pages.profile');
    }


    public function clearCache(): View
    {
        Artisan::call('cache:clear');

        return view('clear-cache');
    }
}
