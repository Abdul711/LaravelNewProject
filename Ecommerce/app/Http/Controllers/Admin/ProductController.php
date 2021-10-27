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
    {
        return view("admin/product");
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
        if($id=="" && $id<0){
         if($request->hasFile("image_product")){
          $ext=$request->file("image_product")->extension();
        }else{
      return redirect($y);
      }
}else{

}
      
     foreach ($paid as $key => $value) {
      echo "attributeName=". $attributeName= $sku[$key];
      echo "price=". $price=$price[$key];
      echo "color_id". $colorid= $color_id[$key];
   echo    "size_id". $sizeId=$size_id[$key];
      echo"coupon". $coupon_id=$coupon_id[$key];
     echo   "tax". $tax_id=$tax_id[$key];

        $discount="";
            if($coupon_id!=""){
       $coupon_data=DB::table('coupons')->where("id",'=',$coupon_id)->where('coupon_sub_type','=','product')->get();
         
              if($coupon_data[0]){
             
             $coupon_type=$coupon_data[0]->coupon_type;
             $coupon_amount=$coupon_data[0]->coupon_amount;
            $max_discount=$coupon_data[0]->max_discount;
          $difference= $price-$coupon_amount;
           
            if($coupon_type=="fixed"){
                if($price>$coupon_amount  && $difference>1000 ){  
                   $discount=$difference;
                }else{
                    $discount=0; 
                 }
           }else{
                      floor(($coupon_amount));
           }   
         
  
              }else {
                $discount=0;
              }
          
            }else{
                $discount=0;
            }
            $price=$price-$discount;
         $productAttribute["color_id"]=$colorid;
         $productAttribute["price"]=$price;
         $productAttribute["size_id"]=$sizeId;
         $productAttribute["attribute"]=$attributeName;
         $productAttribute["tax_id"]=$tax_id;
          $productAttribute["coupon_id"]=$coupon_id;
         prx( $productAttribute);

     }
    prx($request->post());

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
