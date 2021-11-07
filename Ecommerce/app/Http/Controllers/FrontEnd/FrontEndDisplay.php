<?php

namespace App\Http\Controllers\FrontEnd;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
class FrontEndDisplay extends Controller
{
   public function index(){
       $bannerdata=DB::table("banner")->where('status','=',1)->get();
       $categorydata=DB::table('categories')->where('status','=',1)->get();
          foreach ($categorydata as $key => $value) {
              $result["categories_product"][$value->id]="";
          }
       $result["banmers"]=$bannerdata;
       $result["categories"]=$categorydata;
      prx($result);

    die();
       return view ("FrontEnd/index");
   }
}
