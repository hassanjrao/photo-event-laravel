<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use App\Models\EventImage;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        $users = User::all()->count();
        $bookings = Booking::all()->count();
        $events = Event::all()->count();
        return view("admin.dashboard.index", compact("users", "bookings", "events"));
    }

    public function host()
    {
        $events = Event::whereHas("eventHosts", function ($q) {
            $q->where("user_id", auth()->user()->id);
        })->latest()->count();


        $images =EventImage::where("uploaded_by",auth()->user()->id)->latest()->count();


        return view("host.dashboard.index", compact("events", "images"));
    }
}
