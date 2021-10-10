<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Validator;
use DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /*  $otps=rand(89,456);
        $mobilenumber="92332356586";
        $arr=json_encode(array('body' =>"Hello Your Otp is $otps" ,"phone"=>$mobilenumber ));
       $url= "https://api.chat-api.com/instance343403/message?token=d1q7370j3sn889na";
       $ch = curl_init();
       curl_setopt($ch,CURLOPT_URL,$url);
       curl_setopt($ch,CURLOPT_POST,true);
       curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
       curl_setopt($ch,CURLOPT_POSTFIELDS,$arr);
       curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-type:application/json' ,"Content-length:".strlen($arr) ));

     $result=curl_exec($ch);
     curl_close($ch);
     echo $result;*/
     
       $data["categories"]=DB::table('categories')->get();
       return view("admin/category",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id="")
    {
        if($id>0 && $id!=""){
               $data=DB::table("categories")->where("id","=",$id)->get();
            $pageTitle="Update Category";
            $fontAwe="edit";
            $categoryName=$data[0]->categories_name;
        }else{
            $pageTitle="Add Category";
            $fontAwe="trash";
            $fontAwe="plus";
            $categoryName="";

        }
        $result["parents_id"]=DB::table('categories')->where('parent_id','=',0)->get();
        $result["pageTitle"]=$pageTitle;
        $result["fontAwe"]=$fontAwe;
        $result["categoryName"]=$categoryName;
        $result["id"]=$id;
        return view("admin/manage_category",$result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  $id=$request->post('id');
           if($id==""){
          $imageValid ="required";
           }else{
               $imageValid="";
           }

        $validator = Validator::make($request->all(), [
 
         'categoryName'=>'required|alpha|unique:categories,categories_name,'.$id,
          "image"=>$imageValid
    ],["categoryNmae.required"=>"Category Name Must Be Provided"]) ;
      $y=  url()->previous();
  if ($validator->fails()) {
    return redirect($y)
                ->withErrors($validator)
                ->withInput();

}else{

       $image=$request->file("image");
            
       if($request->hasfile('image')){
           
        $path="/public/media/category";
        $ext=$image->extension();
        $image_name=time().'.'.$ext;
        $image->storeAs($path,$image_name);
       }else{
           if($id>0){
            $data=DB::table("categories")->where("id","=",$id)->get();
    $image_name=$data[0]->image;
            
           }
       }

   
       $categoryName=$request->post("categoryName");
$dated=date('d-F-Y');
$monthed=date('F');
$ye=date("Y");
if($id =="") {
DB::table('categories')->insert([
    "categories_name"=>$categoryName,
    "parent_id"=>0,
    "status"=>1,
    "image"=>$image_name,
    "show_cate"=>1,
    "added_on"=>date("Y-m-d H:i:s")
]);
}else {
    # code...


    DB::table('categories')->where('id','=',$id)->update([
        "categories_name"=>$categoryName,
        "parent_id"=>0,
        "status"=>1,
        "image"=>$image_name,
        "show_cate"=>1,
        "added_on"=>date("Y-m-d H:i:s")
    ]);
}
 
       return redirect('admin/category');
   /*   echo $trimmed = str_replace("/public/", ' ',$path);

          echo"</pre>";     
         echo  asset('storage/media/');
         */


}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show_status($id)
    {
        $data=DB::table("categories")->where("id","=",$id)->get();
        $show_cate=$data[0]->show_cate;
        if($show_cate==1){
         $show_status=0;
        }else{
            $show_status=1;
        }
        DB::table('categories')->where('id','=',$id)->update([
         
            "show_cate"=>$show_status
          
        ]);
        return redirect('admin/category');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update_status($id)
    {
        $data=DB::table("categories")->where("id","=",$id)->get();
        $show_cate=$data[0]->status;
        if($show_cate==1){
         $show_status=0;
        }else{
            $show_status=1;
        }
        DB::table('categories')->where('id','=',$id)->update([
         
            "status"=>$show_status
          
        ]);
        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,$id)
    {
        DB::table('categories')->where('id',$id)->delete();
        return redirect('admin/category');
    }
}
