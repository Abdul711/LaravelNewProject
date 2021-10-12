<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data=DB::table('brands')->get();    
        $result["brands"]=$data;
  
       return view("admin/brand",$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=null)
    {
       
        if($id>0 && $id!=""){
            $data=DB::table("brands")->where("id","=",$id)->get();
         $pageTitle="Update Brand";
         $fontAwe="edit";
         $brandName=$data[0]->brands_name;
     }else{
         $pageTitle="Add Brand";
         $fontAwe="trash";
         $fontAwe="plus";
         $brandName="";

     }
 
     $result["pageTitle"]=$pageTitle;
     $result["fontAwe"]=$fontAwe;
     $result["BrandName"]=$brandName;
     $result["id"]=$id;
     return view("admin/manage_brand",$result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
          
             $brandDataArray["brands_name"]=$request->post("brands_name");

            if( $request->post("id")!="" && $request->post("id") >0  ){
                $data=DB::table("brands")->where("id","=",$request->post("id"))->get();
                if($request->hasFile("brandImage")){
                    $image=$request->file("brandImage");
                    $ext=$image->extension();
                    $image_name=time().'.'.$ext;
                    $path="/public/media/brand";
                    $image->storeAs($path,$image_name);

                }else{
               
                  $image_name=$data[0]->image;
                }
               if( $data[0]->status!=""){
                $brandDataArray["status"]=$data[0]->status;
               }else{
                $brandDataArray["status"]=1;
               }
                $brandDataArray["image"]=$image_name;
                DB::table('brands')->where('id','=',$request->post('id'))->update($brandDataArray);
                return redirect('admin/brand');
            }else{
                if($request->hasFile("brandImage")){
                    $image=$request->file("brandImage");
                    $ext=$image->extension();
                    $image_name=time().'.'.$ext;
                    $path="/public/media/brand";
                    $image->storeAs($path,$image_name);
                    $brandDataArray["image"]=$image_name;
                    $brandDataArray["status"]=1;
               
                    $brandDataArray["added_on"]=date("Y-m-d H:i:s");
                    print_r($brandDataArray);
                    DB::table('brands')->insert($brandDataArray);
                    return redirect('admin/brand');
                }else{
                    $y=  url()->previous();
                    return redirect($y);
                }
            }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update_status($id)
    {
        echo $id;
      $data=DB::table('brands')->where('id','=',$id);
 $dataA=$data->get();
     $currentStatus=$dataA[0]->status;
     if($currentStatus==0){
         $newStatus=1;
     }else{
         $newStatus=0;
     }
           $data->update(["status"=>$newStatus]);
           $redirectLink=  url()->previous();
   return       redirect($redirectLink) ;
           }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand,$id)
    {
        //
        DB::table('brands')->where('id',$id)->delete();
        return redirect('admin/brand');
    }
    public function getData()
    {
       $data= DB::table("brands")->get();
       return $data;
    }
}
