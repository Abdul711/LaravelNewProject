<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Admin\Tax;
class TaxController extends Controller
{
   public function index(){
       $data=Tax::all();
       $data=json_decode($data,true);
       $result["taxes"]=$data;
       return view("admin/tax",$result);
   }
   public function manage_tax($id=null){
      if($id==""){
          $pageTitle="Add Tax";
          $fontAwesome="plus";
          $tax_desc="";
          $tax_value="";
      }else{
        $pageTitle="Update Tax";
        $fontAwesome="edit";
        $data=Tax::find($id);
        $data=json_decode($data,true);
        $tax_desc=$data["tax_desc"];
        $tax_value=$data["tax_value"];
        
      }
      $result["pageTitle"]=$pageTitle;
      $result["fontAwesome"]=$fontAwesome;
      $result["tax_desc"]=$tax_desc;
      $result["tax_value"]=$tax_value;
      $result["id"]=$id;

       return view("Admin/manage_tax",$result);
   }
   public function  manage_tax_store(Request $req){
     
      $data= $req->post();
      extract($data);
      if($id==null){
       $model=new Tax();
       $status=1;
      }else{
        $model=Tax::find($id);
        $status=$model->status;
      }
      $model->tax_value =$tax_value;
      $model->tax_desc =$tax_desc;
      $model->status =$status;
      $model->save();
      return redirect("admin/tax");
   }
   public function manage_status_tax($action,$id){
    
     $model=Tax::find($id);
        if($action=="status"){
       $status=$model->status;
            if($status==1){
                $new_status=0;
            }else{
                $new_status=1;
            }
        
       $model->status=$new_status;
       $model->save();
        }else{
            $model->delete();
        }
       return redirect("admin/tax");
   }

}
