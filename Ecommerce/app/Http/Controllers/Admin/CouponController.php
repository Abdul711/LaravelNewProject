<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Coupon;
use Illuminate\Http\Request;

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
         }else{
            $pageTitle="Update Coupon";
            $fontAwesome="edit";
         }
         $result["pageTitle"]=$pageTitle;
         $result["pageFontAwesome"]=$fontAwesome;
         $result["id"]=$id;
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

        prx($request->post());
        extract($request->post());
        if($id==null){
        $model= new Coupon();
        $status=1;
        }else{
            $model=Coupon::find($id);
            $status=$model->status;
        }

    
        $model->coupon_code=$coupon_code;
        $model->cart_min_value=$cart_min_value;
        $model->coupon_amount=$coupon_amount;
        $model->max_discount=$max_discount;
        $model->coupon_type=$coupon_type;
        $model->coupon_sub_type=$coupon_sub_type;
        $model->status=$status;
        $model->added_on=date("Y-m-d H:i:s");
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
    public function update(Request $request, Coupon $coupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        //
    }
}
