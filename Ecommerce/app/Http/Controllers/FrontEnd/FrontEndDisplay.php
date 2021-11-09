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
              $result["categories_product"][$value->id]=DB::table("products")->where("categories_id",'=',$value->id)->get();
                foreach ($result["categories_product"][$value->id] as $key => $value2) {
                    $result["categories_product_attr"][$value2->id]=DB::table("product_attributes")
                    ->leftJoin('sizes','sizes.id','=','product_attributes.size_id')
                    ->leftJoin('colors','colors.id','=','product_attributes.color_id')
                   -> where("product_id",'=',$value2->id)->get();
               }  
                   
          }
       $result["banners"]=$bannerdata;
       $result["categories"]=$categorydata;
       echo "<pre>";
    print_r($result);
    echo "</pre>";

       return view ("FrontEnd/index2",$result);
   }
}
