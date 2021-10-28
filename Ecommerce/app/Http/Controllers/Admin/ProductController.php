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
           $productName="";
       }else{
        $pageTitle="Update Product";
       }
$result["categories"]=DB::table('categories')->get();
$result["brands"]=DB::table('brands')->get();
$result["colors"]=DB::table("colors")->get();
$result["sizes"]=DB::table("sizes")->get();
$result["taxes"]=DB::table("taxes")->get();
$result["coupons"]=DB::table("coupons")->where("coupon_sub_type","=","product")->get();
     $result["pageTitle"]=$pageTitle;
    /*     prx($result);*/
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
    $product["image"]=time()."jpg";
    $product["status"]="1";
    $product_id=$id;
         
}


     foreach ($paid as $key => $value) {
 $attributeName= $sku[$key];
    $price=$price[$key];
   $colorid= $color_id[$key];
      $sizeId=$size_id[$key];
 $coupon_id=$coupon_id[$key];
 $tax_id=$tax_id[$key];
       if($colorid==""){
        $colorid=0;
       }
       if($sizeId==""){
        $sizeId=0;
     }
    if($tax_id==""){
        $tax_id=0;
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
 DB::table('product_attributes')->insert($productAttribute);

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
