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
       $result["id"]=$id;
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
     
        $id=$request->post('id');
    $tabledata=DB::table("colors");
    $dataArray["added_on"]=date("Y-m-d H:i:s");
    $dataArray["color_name"]=$request->post("color_name");
    if($id!=""){
        $dataget= $tabledata->get();
        
       $dataArray["status"]=$dataget[0]->status;
       $tabledata->where('id','=',$id)->update($dataArray);
    }else{
        $dataArray["status"]=1;
        $tabledata->insert($dataArray);
      
    }
    return redirect('admin/color');
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
    public function update_status($id)
    {

        $data=DB::table('colors')->where('id','=',$id);
        $dataA=$data->get();
            $currentStatus=$dataA[0]->status;
            if($currentStatus==0){
                $newStatus=1;
            }else{
                $newStatus=0;
            }
                  $data->update(["status"=>$newStatus]);
                  $redirectLink=  url()->previous();
          return       redirect($redirectLink) ;
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('colors')->where('id',$id)->delete();
        return redirect('admin/color');
    }
}
