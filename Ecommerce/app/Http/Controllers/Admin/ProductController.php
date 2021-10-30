<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $result["products"]=DB::table("products")->get();
   
        return view("admin/product",$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id="")
    {
       
     
       if($id==""){
           $pageTitle="Add Product";
           $categories_id="";
           $productName="";
           $brand_id="";
           $desc="";
           $short_desc="";
           $keyword="";
           $result['productAttributes'][0]["id"]="";
           $result['productAttributes'][0]["size_id"]="";
           $result['productAttributes'][0]["color_id"]="";
           $result['productAttributes'][0]["price"]="";
           $result['productAttributes'][0]["product_id"]="";
           $result['productAttributes'][0]["attribute"]="";
           $result['productAttributes'][0]["tax_id"]="";
           $result['productAttributes'][0]["coupon_id"]="";
           $result['productAttributes'][0]["qty"]="";
       }else{
        $pageTitle="Update Product";
        $data=DB::table('products')->where("id",'=',$id)->get();
       /* prx($data);*/
       $productName=$data[0]->product_name;
      $categories_id=$data[0]->categories_id;
      $brand_id=$data[0]->brand_id;
      $desc=$data[0]->desc;
      $keyword=$data[0]->keyword;
      $short_desc=$data[0]->shortdesc;
      $productAttrdata= DB::table('product_attributes')->where(['product_id'=>$id])->get();
      $productAttrdata=json_decode($productAttrdata,true);
      $result['productAttributes']=$productAttrdata;
       }
       $result["productName"]=$productName;
       $result["pageTitle"]=$pageTitle;
       
$result["id"]=$id;

$result["brand_id"]=$brand_id;
$result["categories_id"]=$categories_id;
$result["desc"]=$desc;
$result["short_desc"]=$short_desc;
$result["keyword"]=$keyword;
$result["categories"]=DB::table('categories')->get();
$result["brands"]=DB::table('brands')->get();
$result["colors"]=DB::table("colors")->get();
$result["sizes"]=DB::table("sizes")->get();
$result["taxes"]=DB::table("taxes")->get();
$result["coupons"]=DB::table("coupons")->where("coupon_sub_type","=","product")->get();
/*
      prx($result);
      */
        return view("admin/manage_products",$result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        prx($request->post());
*/
        $y=  url()->previous();
        $data=$request->post();
        extract($data);
        $admin_id=session()->get("ADMINID");
        $product["product_name"]=$name;
        $product["brand_id"]=$brand;
        $product["categories_id"]=$category_id;
        $product["admin_id"]=$admin_id;
  
    
        $product["desc"]=$desc;
        $product["keyword"]=$keywords;
        $product["shortdesc"]=$short_desc;
        $product["added_on"]=date("Y-m-d H:i:s");
if($id==""){
   if($request->hasFile("image_product")){
    $image=$request->file("image_product");

  $path="/public/media/product";
  $ext=$image->extension();
  $image_name=time().'.'.$ext;
  $image->storeAs($path,$image_name);
  }else{
      return redirect($y);
      }
      $product["image"]=time().".".$ext;
      $product["status"]="1";
  $product_id=DB::table('products')->insertGetId($product);
}else{
    $product_table=DB::table('products');
    $product_table_data=$product_table->where('id','=',$id)->get();

    $product_status=$product_table_data[0]->status;
    if($request->hasFile("image_product")){
      $image=$request->file("image_product");

        $path="/public/media/product";
        $ext=$image->extension();
        $image_name=time().'.'.$ext;
        $image->storeAs($path,$image_name);
        $product_image=$image_name;
    }else{
        $product_image=$product_table_data[0]->image;
    }

    $product["image"]=$product_image;
    $product["status"]=$product_status;
    $product_id=$id;
    DB::table('products')->where('id','=',$id)->update($product);
         
}


     foreach ($paid as $key => $value) {
 $attributeName= $sku[$key];
    $price=$price[$key];
   $colorid= $color_id[$key];
      $sizeId=$size_id[$key];
 $coupon_id=$coupon_id[$key];
 $tax_id=$tax_id[$key];
 $pattrid=$paid[$key];
 $qty=$qty[$key];
       if($colorid==""){
        $colorid=0;
       }
       if($sizeId==""){
        $sizeId=0;
     }

        
    $discount=0;
              if($coupon_id!=""){
                 $data=DB::table('coupons')->where('id','=',$coupon_id)->get();
                  if(isset($data[0])){
                $coupon_amount=$data[0]->coupon_amount;
                          if($data[0]->coupon_type=="fixed"){
                             $after_discount_price=$price-$coupon_amount;
                                 if($after_discount_price>$price ||  $after_discount_price <0){
                                     $discount=0;
                                     
                                 }else{
                                     $discount=$coupon_amount;
                                 }

                          }else{
                               $coupon_discount=floor(($coupon_amount/100)*$price);
                               $after_discount_price=$price-$coupon_discount;
                               if($after_discount_price>$price ||  $after_discount_price <0){
                                   $discount=0;   
                               }else{
                                   $discount=$coupon_discount;
                               }
                          }
                  


                  }else {
                    $discount=0;
                  }
              }else{
                  $discount=0;
              }
              $price=$price-$discount;
              $data_tax=DB::table('taxes')->where('id','=',$tax_id)->get();
              
                if(isset($data_tax[0])){
                    $tax_value=$data_tax[0]->tax_value;
                    $tax=floor(($tax_value/100)*$price);

                }else{
             $tax=0;
                }
          
              $price=$price+$tax;
 
         $productAttribute["color_id"]=$colorid;
         $productAttribute["price"]=$price;
         $productAttribute["size_id"]=$sizeId;
         $productAttribute["attribute"]=$attributeName;
         $productAttribute["tax_id"]=$tax_id;
          $productAttribute["coupon_id"]=$coupon_id;
          $productAttribute["product_id"]=$product_id;
          $productAttribute["qty"]=$qty;
         if ($pattrid==""){
            DB::table('product_attributes')->insert($productAttribute);
         }else{
            DB::table('product_attributes')->where('id','=',$pattrid)->update($productAttribute);
         }


     }
     return redirect("admins/product");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
