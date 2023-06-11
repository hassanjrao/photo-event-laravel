<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserEventController extends Controller
{

    public function index()
    {
        $events = Event::latest()->get();

        return view("front.events.index", compact("events"));
    }


    public function show($id)
    {
        $event = Event::findorfail($id);

        $user = Auth::user();

        return view("front.events.show", compact("event"));
    }
}
