<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Event;
use App\Models\HeroSection;
use App\Models\OurWork;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events=Event::latest()->get();

        $heroSection=HeroSection::with("images")->findorfail(1);

        $aboutUs=AboutUs::findorfail(1);

        $ourWorks=OurWork::all();

        return view('front.index',compact("events","heroSection","aboutUs","ourWorks"));
    }
}
