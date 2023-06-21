<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footer=Footer::findorfail(1);

        return view("admin.footer.index",compact("footer"));
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
        //
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
            "description"=>"nullable",
            "address"=>"required",
            "phone"=>"required",
            "email"=>"required",
            "twitter_link"=>"nullable",
            "facebook_link"=>"nullable",
            "instagram_link"=>"nullable",
        ]);

        $footer=Footer::findorfail(1);

        $footer->update([
            "description"=>$request->description,
            "address"=>$request->address,
            "phone"=>$request->phone,
            "email"=>$request->email,
            "twitter_link"=>$request->twitter_link,
            "facebook_link"=>$request->facebook_link,
            "instagram_link"=>$request->instagram_link,
        ]);

        return redirect()->route("admin.footer.index")->with("success","Footer updated successfully");
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
