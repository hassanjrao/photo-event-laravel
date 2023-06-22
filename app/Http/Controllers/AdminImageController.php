<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventImage;
use App\Models\User;
use Illuminate\Http\Request;

class AdminImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::with(["eventImages", "eventImages.users"])->latest()->get();

        $users = User::role("user")->get();

        return view("admin.images.index", compact("events", "users"));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "event" => "required|exists:events,id",
            "images" => "required|array",
            "images.*" => "required|image",
            "users" => "required|array",
            "users.*" => "required|exists:users,id",
        ]);

        foreach ($request->images as $image) {
            $image = $image->store("event-user-images");

            $eventImage = EventImage::create([
                "event_id" => $request->event,
                "image" => $image,
                "uploaded_by" => auth()->user()->id,
            ]);

            $eventImage->users()->sync($request->users);
        }



        return back()->with("success", "Image uploaded successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eventImage = EventImage::findorfail($id);

        $users = User::role("user")->get();


        $events = Event::with(["eventImages", "eventImages.users"])->latest()->get();

        return view("admin.images.edit", compact("eventImage", "users", "events"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "event" => "required|exists:events,id",
            "image" => "nullable|image",
            "users" => "required|array",
            "users.*" => "required|exists:users,id",
        ]);

        $eventImage = EventImage::findorfail($id);

        $eventImage->users()->sync($request->users);

        $dataToUpdate = [];

        if ($request->hasFile("image")) {
            $image = $request->file("image")->store("event-user-images");
            $dataToUpdate["image"] = $image;
        }

        $dataToUpdate["event_id"] = $request->event;

        $eventImage->update($dataToUpdate);

        return back()->with("success", "Image updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
