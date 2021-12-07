<?php 
function prx($arr){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
    die();
}
function AdvancxTime($timerequired,$unit){
  $t=time();
      if($unit=="hr"){
        $t=time()+60*60*$timerequired;

      }else{
        if($unit=="day"){
          $t=time()+60*60*24*$timerequired;
        }else{
        $t=time()+60*$timerequired;
        }
      }
$data=(date("d-F-Y H:i a",$t));
return $data;
}
function facebook_time_ago($timestamp)  
{  
     $time_ago = strtotime($timestamp);  
     $current_time = time();  
     $time_difference = $current_time - $time_ago;  
     $seconds = $time_difference;  
     $minutes      = round($seconds / 60 );           // value 60 is seconds  
     $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
     $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
     $weeks          = round($seconds / 604800);          // 7*24*60*60;  
     $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
     $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
     if($seconds <= 60)  
     {  
    return "Just Now";  
  }  
     else if($minutes <=60)  
     {  
    if($minutes==1)  
          {  
      return "one minute ago";  
    }  
    else  
          {  
      return "$minutes minutes ago";  
    }  
  }  
     else if($hours <=24)  
     {  
    if($hours==1)  
          {  
      return "an hour ago";  
    }  
          else  
          {  
      return "$hours hrs ago";  
    }  
  }  
     else if($days <= 7)  
     {  
    if($days==1)  
          {  
      return "yesterday";  
    }  
          else  
          {  
      return "$days days ago";  
    }  
  }  
     else if($weeks <= 4.3) //4.3 == 52/12  
     {  
    if($weeks==1)  
          {  
      return "a week ago";  
    }  
          else  
          {  
      return "$weeks weeks ago";  
    }  
  }  
      else if($months <=12)  
     {  
    if($months==1)  
          {  
      return "a month ago";  
    }  
          else  
          {  
      return "$months months ago";  
    }  
  }  
     else  
     {  
    if($years==1)  
          {  
      return "one year ago";  
    }  
          else  
          {  
      return "$years years ago";  
    }  
     }
    }  

       function fieldById($id,$table_name){
         $result=DB::table($table_name)->where("id","=",$id)->get();
         return $result;
       }
       function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = '192.168.1.100';
        return $ipaddress;
    }
    function priceproduct($attr_id){
    $attr_data=DB::table('product_attributes')->where("id",'=',$attr_id)->get();
    $price=$attr_data[0]->price;
    $tax_id=$attr_data[0]->tax_id;
    $coupon_id=$attr_data[0]->coupon_id;
    $tax_data=DB::table('taxes')->where("id",'=',$tax_id)->where('status','=',1)->get();
    $coupon_data=DB::table('coupons')->where("id",'=',$coupon_id)->where('status','=',1)->get();
              $discount=0;
              $tax=0;
              if(isset($coupon_data[0])){
            $coupon_amount=$coupon_data[0]->coupon_amount;
            $coupon_type=$coupon_data[0]->coupon_type;
               if($coupon_type=="fixed"){
                $discount=$coupon_amount;
               }else{
                   $discount=floor(($coupon_amount/100)*$price);

               }
              }else{
                $discount=0;

              }
              $pricedis=$price-$discount;
              if(isset($tax_data[0])){
               $tax_value= $tax_data[0]->tax_value;
                 $tax=floor(($tax_value/100)*$pricedis);
              }else{
                $tax=0;
              }
              $finalprice=$pricedis+$tax;
     return $finalprice;
    }

?>