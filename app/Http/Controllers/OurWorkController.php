<?php

namespace App\Http\Controllers;

use App\Models\OurWork;
use Illuminate\Http\Request;

class OurWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ourWorks=OurWork::all();

        return view("admin.our-work.index",compact("ourWorks"));
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
            "images"=>"required|array",
            "images.*"=>"required|image"
        ]);

        $dataToInsert=[];

        foreach($request->images as $image){
           $imagePath= $image->store("our-work-images");

              $dataToInsert[]=[
                "image"=>$imagePath,
                "created_at"=>now(),
                "updated_at"=>now()
              ];
        }

        OurWork::insert($dataToInsert);

        return redirect()->back()->with("success","Our Work Images Added Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OurWork  $ourWork
     * @return \Illuminate\Http\Response
     */
    public function show(OurWork $ourWork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OurWork  $ourWork
     * @return \Illuminate\Http\Response
     */
    public function edit(OurWork $ourWork)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OurWork  $ourWork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OurWork $ourWork)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OurWork  $ourWork
     * @return \Illuminate\Http\Response
     */
    public function destroy(OurWork $ourWork)
    {

        $ourWork->delete();

        return redirect()->back()->with("success","Deleted Successfully");
    }
}
