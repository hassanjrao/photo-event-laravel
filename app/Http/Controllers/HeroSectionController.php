<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use Illuminate\Http\Request;

class HeroSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heroSection=HeroSection::findorfail(1);

        $heroSectionImages=$heroSection->images;

        return view("admin.hero-section.index",compact("heroSection","heroSectionImages"));
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
     * @param  \App\Models\HeroSection  $heroSection
     * @return \Illuminate\Http\Response
     */
    public function show(HeroSection $heroSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HeroSection  $heroSection
     * @return \Illuminate\Http\Response
     */
    public function edit(HeroSection $heroSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HeroSection  $heroSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HeroSection $heroSection)
    {



        $request->validate([
            "first_heading"=>"required",
            "second_heading"=>"required",
            "intro_text"=>"required",
            "video"=>"nullable|mimes:mp4,ogx,oga,ogv,ogg,webm",
        ]);

        $dataToUpdate=[
            "first_heading"=>$request->first_heading,
            "second_heading"=>$request->second_heading,
            "intro_text"=>$request->intro_text,
        ];

        if($request->hasFile("video")){
            $video=$request->file("video")->store("hero-section");

            $dataToUpdate["video"]=$video;
        }

        $heroSection->update($dataToUpdate);

        return redirect()->back()->with("success","Hero Section Updated Successfully");
    }

    public function updateImages(Request $request, HeroSection $heroSection)
    {
        $request->validate([
            "image1"=>"nullable|image",
            "image2"=>"nullable|image",
            "image3"=>"nullable|image",
            "image4"=>"nullable|image",
        ]);

         $heroSection=$heroSection->findorfail(1);


        if($request->hasFile("image1")){
            $image1=$request->file("image1")->store("hero-section");
            $heroSection->images[0]->update([
                "image"=>$image1,
            ]);
        }

        if($request->hasFile("image2")){
            $image2=$request->file("image2")->store("hero-section");
            $heroSection->images[1]->update([
                "image"=>$image2,
            ]);
        }

        if($request->hasFile("image3")){
            $image3=$request->file("image3")->store("hero-section");
            $heroSection->images[2]->update([
                "image"=>$image3,
            ]);
        }

        if($request->hasFile("image4")){
            $image4=$request->file("image4")->store("hero-section");
            $heroSection->images[3]->update([
                "image"=>$image4,
            ]);
        }


        return redirect()->back()->with("success","Hero Section Images Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HeroSection  $heroSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(HeroSection $heroSection)
    {
        //
    }
}
