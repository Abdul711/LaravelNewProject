<?php

namespace App\Http\Controllers\FrontEnd;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
class FrontEndDisplay extends Controller
{
   public function index(){



   echo $ipAddress=$_SERVER['REMOTE_ADDR'];

   $macAddr=false;

#run the external command, break output into lines
$arp=`arp -a $ipAddress`;
$lines=explode("\n", $arp);

#look for the output line describing our IP address
foreach($lines as $line)
{
   $cols=preg_split('/\s+/', trim($line));
   if ($cols[0]==$ipAddress)
   {
     echo   $macAddr=$cols[1];
   }
}



$ipAddress=$_SERVER['REMOTE_ADDR'];
       $bannerdata=DB::table("banner")->where('status','=',1)->get();
       $branddata=DB::table("brands")->where('status','=',1)->get();
       $categorydata=DB::table('categories')->where('status','=',1)->get();
          foreach ($categorydata as $key => $value) {
              $result["categories_product"][$value->id]=
              DB::table("products")

              ->where("products.categories_id",'=',$value->id)->get();
                foreach ($result["categories_product"][$value->id] as $key => $value2) {
                    $result["categories_product_attr"][$value2->id]=DB::table("product_attributes")
                    ->leftJoin('sizes','sizes.id','=','product_attributes.size_id')
                    ->leftJoin('colors','colors.id','=','product_attributes.color_id')
                    ->select("product_attributes.id",
                    "sizes.size_name",
                    "colors.color_name",
                    "product_attributes.size_id",
                    "product_attributes.color_id",
                    "product_attributes.price"
                    
                    )
                   ->where("product_id",'=',$value2->id)->get();
               }

          }
       $result["banners"]=$bannerdata;
       $result["brands"]=$branddata;
       $result["categories"]=$categorydata;


       return view ("FrontEnd/index2",$result);
   }
     public function add_to_cart(Request $req){






$data=$req->post();
extract($data);
$data_attribute=DB::table('product_attributes')->where("product_id","=",$product_id)->
where("size_id","=",$size_id)->where("color_id","=",$color_id)->get();
if(isset($data_attribute)){

   print_r($data_attribute);
 echo $ip=get_client_ip();


$attr_id=$data_attribute[0]->id;

echo priceproduct($attr_id);
   

       
}else{

}
die();


     }
}
