<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Coupon;
use Illuminate\Http\Request;
use DB;
class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  $data=Coupon::all();
        $result["coupons"]=$data;
        return view("admin/coupon",$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_coupon($id=null)
    {
         if($id==""){
             $pageTitle="Add Coupon";
             $fontAwesome="plus";
            $coupon_code="";
            $coupon_sub_type="";
            $coupon_amount="";
            $max_discount="";
            $coupon_type="";
            $cart_min_value="";
            $expiry_date="";
$limit="";
         }else{
             $model=Coupon::find($id);
            $pageTitle="Update Coupon";
            $fontAwesome="edit";
            $coupon_code=$model->coupon_code;
            $coupon_sub_type=$model->coupon_sub_type;
            $coupon_amount=$model->coupon_amount;
            	$max_discount=$model->max_discount;
                $coupon_type=$model->coupon_type;
                $cart_min_value=$model->cart_min_value;
                $limit=$model->limit;
                $expiry_date=$model->expiry_date;
         }
         $result["pageTitle"]=$pageTitle;
         $result["pageFontAwesome"]=$fontAwesome;
         $result["id"]=$id;
         $result["coupon_code"]=$coupon_code;
         $result["coupon_sub_type"]=$coupon_sub_type;
         $result["coupon_amount"]=$coupon_amount;
         $result["max_discount"]=$max_discount;
         $result["coupon_type"]=$coupon_type;
         $result["cart_min_value"]=$cart_min_value;
         $result["limit"]=$limit;
     $result["expiry_date"]=$expiry_date;
   
         return view("admin/manage_coupon",$result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
      $coupon_code=  $request->post('coupon_code');
      $id=  $request->post('id');
        $request->validate([
            'coupon_code'=>'required|alpha_num|unique:coupons,coupon_code,'.$id,
            "coupon_amount"=>"required|numeric",
            "coupon_type"=>"required",
            "coupon_sub_type"=>"required"
            
        ],["coupon_code.alpha_num"=>"Coupon Code Must Be Alpha Numberic",
        "coupon_code.unique"=>"The $coupon_code Coupon Code has already exists",
         "coupon_amount.numeric"=>"coupon amount must be numeric"
         
    ]);
        extract($request->post());
              if($coupon_type=="percentage" && $coupon_amount>=100){
                  $coupon_amount=25;
              }
        if($id==null){
        $model= new Coupon();
        $status=1;
        }else{
            $model=Coupon::find($id);
            $status=$model->status;
        }

    $model->limit=$limit;
        $model->coupon_code=$coupon_code;
        $model->cart_min_value=$cart_min_value;
        $model->coupon_amount=$coupon_amount;
        $model->max_discount=$max_discount;
        $model->coupon_type=$coupon_type;
        $model->coupon_sub_type=$coupon_sub_type;
        $model->status=$status;
        $model->added_on=date("Y-m-d H:i:s");       
         $model->expiry_date=date("d-M-Y",strtotime($expiry_date));

        $model->save();
        return redirect("admin/coupon");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update_status($id)
    {
        $data=DB::table("coupons")->where("id","=",$id)->get();
        $show_cate=$data[0]->status;
        if($show_cate==1){
         $show_status=0;
        }else{
            $show_status=1;
        }
        DB::table('coupons')->where('id','=',$id)->update([
         
            "status"=>$show_status
          
        ]);
        return redirect('admin/coupon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('coupons')->where('id',$id)->delete();
        return redirect('admin/coupon');
    }
    public function detail($id){
   
      $data = Coupon::find($id);
      $coupon_code= $data->coupon_code;
      $result["coupon_code"]=$coupon_code;
      $result["coupon_type"]=$data->coupon_type;
      $result["coupon_sub_type"]=$data->coupon_sub_type;
      $result["coupon_discount"]=$data->coupon_amount;
      $result["limit"]=$data->limit;
         if($data->status==0){
             $newstatus="Deactive";
         }else{
            $newstatus="Active";
         }
       $expiry_date=  strtotime($data->expiry_date);
       $current_date=strtotime(date("d-M-Y"));
            $difference= abs($expiry_date-$current_date);
              
                    $minute=floor($difference / (60 * 60 ));
                 $days=floor($difference / (60 * 60 * 24));
                  $timestamp=date("Y-m-d",strtotime($data->expiry_date));
                  $expi=facebook_time_ago($timestamp);  
               
             if($expiry_date<=$current_date){
              $expired="yes";
             }else{
                 $expired="no";
             }
             $expiry_date;
        
                 $current_date;
             
                 $diff=$expiry_date-$current_date;
                 
                      $day=floor($diff/(60*60*24));
                    $months=floor($diff/(60*60*24*30));
                     $year=floor($diff/(60*60*24*30*12));



        if($day==0){

         $daydiff="Coupon Code $coupon_code will Expiry Today";
        }else{
                if($day==1){
                    $daydiff="Coupon Code $coupon_code will Expiry Tommorrow";
                }else{
                    if($day>=30){
                         if($months>=12){
                             if($year==1){
                            $daydiff="$year Year is Left In Expiry Of Coupon Code $coupon_code";
                             }else {
                                $daydiff="$year Years Are Left In Expiry Of Coupon Code $coupon_code";
                             }
                         }else{
                             if($months==1){
                                $daydiff="One Month Is Left In Expiry Of Coupon Code $coupon_code";
                             }else{
                                $daydiff="$months Month  Are  Left In Expiry Of Coupon Code $coupon_code";
                             }
                         }
                    }else {
                        $daydiff=" $day day s Are  Left In Expiry Of Coupon Code $coupon_code";
                    }
                }
          
       
        }
     


 date("d-M-Y");
      $result["status"] = $newstatus;
      $result["max_discount"] = $data->max_discount;
      $result["cart_min_value"] = $data->cart_min_value;
      $result["expiry_date"] = $data->expiry_date;
      $result["expired"]=$expired;
      $result["expiry_msg"]=$expi;
      $result["remaining_days"]=$daydiff;
      $expiry_date=  strtotime($data->expiry_date);
      $current_date=strtotime(date("d-M-Y"));
/*prx($result);*/
 
     /* prx($result);
      die();*/
      return view("admin/coupon_detail",$result);

    }
}
