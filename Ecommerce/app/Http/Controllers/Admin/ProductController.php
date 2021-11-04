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
    
     
        $y=  url()->previous();
        $data=$request->post();
        $tax=$request->post('tax_id');
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



   $colorid= $color_id[$key];
      $sizeId=$size_id[$key];
         if($colorid==""){
          $colorid=0;
         }
         if($sizeId==""){
             $sizeId=0;
         }
 $coupon_ids=$coupon_id[$key];
  $tax_id_a=$tax_id[$key];
 $pattrid=$paid[$key];
 $price=$prices[$key];
    $price = (int) $price;
    $qty= $qtys[$key];
    $qty = (int) $qty;
 /*echo gettype($price);*/
 
  


 
            $coupon_data=DB::table('coupons')->where("id",'=',$coupon_ids)->get();
       $coupon_type="";
              if(isset($coupon_data[0])){
                $coupon_type=$coupon_data[0]->coupon_type;
                $coupon_amount=$coupon_data[0]->coupon_amount;
                   $coupon_amount= (int) $coupon_amount;
                    if($coupon_type=="fixed"){
                      $discount=$coupon_amount;
                    }else{
                      $discount=floor(($coupon_amount/100)*$price);
                    }
              }else{
                  $discount=0;
              }
                


$discount=(int) $discount;
  gettype($discount);
        $price=$price-$discount;
         gettype($price);
      $tax_data=DB::table('taxes')->where('id','=',$tax_id_a)->get();
          if(isset($tax_data))
           {
              $tax_amount=$tax_data[0]->tax_value;
                $tax=floor(($tax_amount/100)*$price);
           }else{
             $tax=0;
           }    
           $tax=(int) $tax;
           $price=$price+$tax;
           gettype($price);
         $productAttribute["color_id"]=$colorid;
         $productAttribute["price"]=$price;
         $productAttribute["size_id"]=$sizeId;
         $productAttribute["attribute"]=$attributeName;
         $productAttribute["tax_id"]=$tax_id_a;
          $productAttribute["coupon_id"]=$coupon_ids;
          $productAttribute["product_id"]=$product_id;
          $productAttribute["qty"]=$qty;
 
         if ($pattrid==""){
            $productAttribute["status"]=1;
         DB::table('product_attributes')->insert($productAttribute);
         }else{
            $dataattr=DB::table('product_attributes')-where("id,'=",$pattrid)->get();
           $status=$dataattr[0]->status;
           $productAttribute["status"]=$status;
          DB::table('product_attributes')->where('id','=',$pattrid)->update($productAttribute);
         }


     }
     return redirect("admin/product");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id,$show=null)
    {
       
       /* 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 
       
           "     git push https://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@github.com/Abdul711/LaravelNewProject.git"
       */
      
            $result["product_details"] = DB::table('products')
            ->leftJoin('brands', 'brands.id', '=', 'products.brand_id')
            ->leftJoin('categories', 'categories.id', '=', 'products.categories_id')
            ->leftJoin('admins', 'admins.id', '=', 'products.admin_id')
            ->select("products.id as product_id","products.product_name",'products.status','products.image','products.added_on','brands.brands_name','categories.categories_name','admins.id as admin_id','admins.email',
            'admins.mobile')
        ->get();
        $result["product_attribute_details"] = DB::table('product_attributes')
        ->leftJoin('colors', 'colors.id', '=', 'product_attributes.color_id')
        ->leftJoin('sizes', 'sizes.id', '=', 'product_attributes.size_id')
   ->select("product_attributes.price","product_attributes.attribute","colors.color_name","sizes.size_name",'product_attributes.qty','product_attributes.status')
        ->get();
        if($show==0){
            prx($result);
        }
    
  return view("admin/product_detail",$result);
     
        echo $id;
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
    public function update_status($id)
    {
        
        $data_table=DB::table('products');
         $data=$data_table->where("id",'=',$id)->get();
             $status=$data[0]->status;
             if($status==0){
                 $newStatus=1;

             }else{
                $newStatus=0;
             }
             $data_table->update(["status"=>$newStatus]);
         return redirect("admin/product");
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
