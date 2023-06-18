<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutUs=AboutUs::findorfail(1);

        return view("admin.about-us.index",compact("aboutUs"));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutUs $aboutUs)
    {
        $aboutUs=AboutUs::findorfail(1);

        $request->validate([
            "description"=>"required",
            "image_1"=>"nullable|image",
            "image_2"=>"nullable|image",
        ]);

        $dataToUpdate=[
            "description"=>$request->description,
        ];

        if($request->hasFile("image_1")){
            $image_1=$request->file("image_1")->store("about-us");
            $dataToUpdate["image_1"]=$image_1;
        }

        if($request->hasFile("image_2")){
            $image_2=$request->file("image_2")->store("about-us");
            $dataToUpdate["image_2"]=$image_2;
        }

        $aboutUs->update($dataToUpdate);

        return back()->with("success","About Us updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUs $aboutUs)
    {
        //
    }
}
