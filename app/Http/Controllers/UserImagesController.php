<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserImagesController extends Controller
{
    public function index(Request $request)
    {


        $userBookings = auth()->user()->bookings;

        $events = Event::whereIn('id', $userBookings->pluck('event_id'))
            ->get();


        $eventImages = $this->getEventImages($events->pluck('id'));

        return view('front.images.index', compact('eventImages', "events"));
    }


    public function getEventImages($event_ids)
    {
        $eventImages = EventImage::whereIn('event_id', $event_ids)
            ->whereHas('users', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })
            ->get();

        return $eventImages;
    }

    public function eventImages(Request $request){

        $event_ids=$request->event_ids ? $request->event_ids : auth()->user()->bookings->pluck('event_id');



        $eventImages = $this->getEventImages($event_ids);

        $eventImages=$eventImages->map(function($eventImage){
            return [
                "image"=>Storage::url($eventImage->image),
            ];
        });

        return response()->json([
            "eventImages"=>$eventImages
        ]);


    }
}
