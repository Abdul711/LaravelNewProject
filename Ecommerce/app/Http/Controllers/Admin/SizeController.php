<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use DB;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    
      {
        $data=DB::table('sizes')->get();
        $result["sizes"]=$data;
        return view("admin/size",$result);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=null)
    {
        if($id>0 && $id!=""){
            $data=DB::table("sizes")->where("id","=",$id)->get();
         $pageTitle="Update Size";
         $fontAwe="edit";
         $brandName=$data[0]->size_name;
     }else{
         $pageTitle="Add Size";
         $fontAwe="trash";
         $fontAwe="plus";
         $brandName="";

     }
 
     $result["pageTitle"]=$pageTitle;
     $result["fontAwesome"]=$fontAwe;
     $result["SizeName"]=$brandName;
     $result["id"]=$id;

    return view('admin/manage_size',$result);


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
        $tabledata=DB::table("sizes");
        $dataArray["added_on"]=date("Y-m-d H:i:s");
        $dataArray["size_name"]=$request->post("size_name");
        if($id!=""){
            $dataget= $tabledata->get();
            
           $dataArray["status"]=$dataget[0]->status;
           $tabledata->where('id','=',$id)->update($dataArray);
        }else{
            $dataArray["status"]=1;
            $tabledata->insert($dataArray);
          
        }
        return redirect('admin/size');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update_status($id)
    {

        $data=DB::table('sizes')->where('id','=',$id);
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('sizes')->where('id',$id)->delete();
        return redirect('admin/size');
    }
}
