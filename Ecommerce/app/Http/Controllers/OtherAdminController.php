<?php

namespace App\Http\Controllers;

use App\Models\OtherAdmin;
use Illuminate\Http\Request;
use DB;
class OtherAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data=OtherAdmin::where("role",'!=',"0")->get();
 
       $result["otheradmins"]=$data;
       return view("admin/otheradmin",$result);
       prx($result);

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
     * @param  \App\Models\OtherAdmin  $otherAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(OtherAdmin $otherAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OtherAdmin  $otherAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(OtherAdmin $otherAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OtherAdmin  $otherAdmin
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        echo $id;
       $data=OtherAdmin::find($id);
        $verified=$data->verified;
        if($verified==0){
          $data->verified=1;
          $data->save();
          return redirect("admin/otheradmin");
        }else{
            return redirect("admin/otheradmin");
        }
    }
   public function detail($id){
       $data=OtherAdmin::where("id",'=',$id)->where("role",'!=',"0")->get();
    $otherAdmin=$data[0]->username;
    $status=($data[0]->status==0)?"Blocked":"UnBlocked";
    $verifystatus=($data[0]->verified==0)?"Unverified":"Verified";
    $result["otherAdmin"]=$otherAdmin;
    $result["registerDate"]= $data[0]->added_on;
        $result["status"]=$status;
        $result["role"]=($data[0]->role==1)?"Vendor":"Rider";
        $result["mobile"]=$data[0]->mobile;
        $result["email"]=$data[0]->email;
        $result["verifystatus"]=$verifystatus;
       return view("admin/otheradmin_detail",$result);
   }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OtherAdmin  $otherAdmin
     * @return \Illuminate\Http\Response
     */
    public function update_status($id)
    {
        $data=DB::table("admins")->where("id","=",$id)->get();
        $show_cate=$data[0]->status;
        if($show_cate==1){
         $show_status=0;
        }else{
            $show_status=1;
        }
        DB::table('admins')->where('id','=',$id)->update([
         
            "status"=>$show_status
          
        ]);

        return redirect("admin/otheradmin");
    }
}
