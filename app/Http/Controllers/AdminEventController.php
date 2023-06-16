<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminEventController extends Controller
{
    public function __construct()
    {
        $this->middleware("role:admin");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events=Event::with("eventHosts", "eventHosts.user")
        ->latest()->get();


        return view("admin.events.index", compact("events"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $event=null;

        $hosts=User::role("host")->get();

        return view("admin.events.add_edit", compact("event", "hosts"));
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
            "name"=>"required",
            "date"=>"date|required",
            "location"=>"required",
            "ticket_price"=>"required|numeric",
            "total_tickets"=>"required|numeric",
            "image"=>"nullable|image",
            "description"=>"nullable",
            "hosts"=>"required|array",
            "hosts.*"=>"required|exists:users,id",

        ]);

        $data=[
            "name"=>$request->name,
            "start_date"=>$request->date,
            "location"=>$request->location,
            "total_tickets"=>$request->total_tickets,
            "description"=>$request->description,
            "ticket_price"=>$request->ticket_price,
        ];

        if($request->hasFile("image")){
            $data["image"]=$request->file("image")->store("events");
        }

        $event=Event::create($data);

        $event->eventHosts()->createMany(array_map(function($host){
            return ["user_id"=>$host];
        }, $request->hosts));

        return redirect()->route("admin.events.index")->withToastSuccess("Event Created Successfully");

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
        $event=Event::with("eventHosts")->findOrFail($id);

        $hosts=User::role("host")->where(function($query) use($event){
            $query->whereDoesntHave("eventHosts")
            ->orWhereHas("eventHosts", function($query) use($event){
                $query->where("event_id", $event->id);
            });
        })->get();





        return view("admin.events.add_edit", compact("event", "hosts"));
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
            "name"=>"required",
            "date"=>"date|required",
            "location"=>"required",
            "total_tickets"=>"required|numeric",
            "image"=>"nullable|image",
            "description"=>"nullable",
            "hosts"=>"required|array",
            "hosts.*"=>"required|exists:users,id",
            "ticket_price"=>"required|numeric"
        ]);

        $event=Event::findOrFail($id);

        $data=[
            "name"=>$request->name,
            "start_date"=>$request->date,
            "location"=>$request->location,
            "total_tickets"=>$request->total_tickets,
            "description"=>$request->description,
            "ticket_price"=>$request->ticket_price
        ];

        if($request->hasFile("image")){

            if($event->image){
                Storage::delete($event->image);
            }

            $data["image"]=$request->file("image")->store("events");
        }

        $event->update($data);

        $event->eventHosts()->delete();

        $event->eventHosts()->createMany(array_map(function($host){
            return ["user_id"=>$host];
        }, $request->hosts));

        return redirect()->route("admin.events.index")->withToastSuccess("Event Updated Successfully");
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
