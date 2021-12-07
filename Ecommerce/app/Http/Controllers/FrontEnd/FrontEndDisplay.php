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
print_r($data);
extract($data);
$data_attribute=DB::table('product_attributes')->where("product_id","=",$product_id)->
where("size_id","=",$size_id)->where("color_id","=",$color_id)->get();
if(isset($data_attribute[0])){

   print_r($data_attribute);
 echo $ip=get_client_ip();
 if(isset($_SESSION["USERID"])){
  $userid=  $_SESSION["USERID"];
  $usertype="reg";
 }else{
$userid=0;
$usertype="non-reg";
 }

$attr_id=$data_attribute[0]->id;

echo $price=priceproduct($attr_id);
$dataTablecsrt=DB::table('carts');
$cartdata=$dataTablecsrt->where("ip_add","=",$ip)->where("customer_id","=",$userid)->where("attr_id","=",$attr_id)->where("product_id","=",$product_id)->get();
if(isset($cartdata[0])){
    $cartdataid=$cartdata[0]->id;
    $dataTablecsrt->where("id","=",$cartdataid)->update([
        "ip_add"=>$ip,
        "attr_id"=>$attr_id,
        "qty"=>$quantity,
        "customer_id"=>$userid,
        "customer_type"=>$usertype,
        "added_on"=>date("Y-m-d H:i:s"),
        "price"=>$price,
        "product_id"=>$product_id
    ]);
}else{
    $dataTablecsrt->insert([
        "ip_add"=>$ip,
        "attr_id"=>$attr_id,
        "qty"=>$quantity,
        "customer_id"=>$userid,
        "customer_type"=>$usertype,
        "added_on"=>date("Y-m-d H:i:s"),
        "price"=>$price,
        "product_id"=>$product_id
    ]);
}


}else{

}
die();

     }
     function viewcart(){
        $ip=get_client_ip();
        if(isset($_SESSION["USERID"])){
            $userid=  $_SESSION["USERID"];
            $usertype="reg";
           }else{
          $userid=0;
          $usertype="non-reg";
           }
           $data=DB::table('carts')->leftJoin("products","products.id","=","carts.product_id")
           ->leftJoin("product_attributes","product_attributes.id","=","carts.attr_id")
           ->leftJoin("colors","colors.id","=","product_attributes.color_id")
           ->leftJoin("sizes","sizes.id","=","product_attributes.size_id")
           ->select("sizes.size_name","colors.color_name","products.image","products.product_name","carts.price","carts.qty")
           ->where('ip_add','=',$ip)->where('customer_id','=',$userid)->get();
   
           $total=0;
            foreach($data as $datas){
               $price= $datas->price;
               $quantity= $datas->qty;
          $sub= $price*$quantity;
               $total=$sub+$total;
            }

                $setweb=DB::table('setting')->get();
                $gst=$setweb[0]->tax_gst;
                $delivery=$setweb[0]->delivery_charge;

    
                $result["subtotal"]=$total;
                $result["delivery_charge"]=$delivery;
                $tax=floor(($gst/100)*$total);
                $result["gst"]=$gst."%";
                $result["tax"]=$tax;
                $result["cart_datas"]=$data;
                  if(isset($_SESSION["COUPON"])){
                  $dis=  $_SESSION["DIS"];
                  }else{
                      $dis=100;
                  }
                  $result["discount"]=$dis;
                $result["final"]=($total-$dis)+$delivery+$tax;
          


          
    return view("FrontEnd/cart",$result);
    }
   
}
