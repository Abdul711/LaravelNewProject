<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Http;
use DB;
class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= DB::table('colors')->get();
        $result["colors"]=$data;
        return view("admin/color",$result);
        die();
        print_r($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id="")
    {
       if($id==""){
        $pageTitle="Add Color";
    
        $fontAwesome="plus";
        $colorName="";
       }else{
        $pageTitle="Update Color";
        $fontAwesome="edit";
        $data=DB::table("colors")->where('id','=',$id)->get();
        if(!isset($data[0])){
            return redirect("admin/color");
        }
        $colorName=$data[0]->color_name;
       }
       $result["pageTitle"]=  $pageTitle;
       $result["fontAwesome"]=$fontAwesome;
       $result["colorName"]=$colorName;
          return view("admin/manage_color",$result);
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
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        //
    }
}
