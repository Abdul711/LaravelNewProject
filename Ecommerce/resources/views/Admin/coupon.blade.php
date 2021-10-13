@extends('admin/layouts')
@section("container")
@section('coupon_select','active')
@section("pageTitle","Coupon")
   @error("coupon_code")
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
 {{$message}} 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> 
    @enderror
<div class="row">
                                                 
                            <div class="col-lg-12">
                    
                           <a href="{{url('admin/coupon/manage')}}"> <button type="button" class="btn btn-outline-primary">
                                            <i class="fa fa-plus"></i>&nbsp; Add </button></a>
                                <div class="table-responsive table--no-card m-b-30">

                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                               <th> S.NO</th>
                                         
                                                <th>Coupon Code</th>
                                                <th> View Detail </th>
                                                <th>Edit</th>
                                                        <th>Delete</th>
                                               <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        
                                        @foreach ($coupons  as $key=> $coupon)
                                               <tr>
                                                <td>{{$key+1}}</td>
                                    
                                                <td>{{$coupon->coupon_code}}</td>
                                                <td><a href="{{url('admin/coupon/detail/'.$coupon->id)}}"> View Detail</a></td>
                                             

                                                  <td><a href="{{url('admin/coupon/manage/'.$coupon->id)}}" ><button class="btn btn-primary"><i class="fa fa-edit"></i> Edit </button></a></td>
                                                <td><a href="{{url('admin/coupon/delete/'.$coupon->id)}}" ><button class="btn btn-danger"><i class="fa fa-trash"></i> Delete </button></a></td>
                                                                                                      <td> 
                                                         @php
                                                   if ($coupon->status==0){
$btnClass="btn btn-warning";
$btnText="Deactive";
                                                   }
                                                   
                                                   else{
$btnClass="btn btn-success";
$btnText="Active";
                                                   }

                                                   @endphp
                                                  <a href="{{url('admin/coupon/status/'.$coupon->id)}}" ><button class="{{$btnClass}}">{{$btnText}}</button></a>
                                                   </td>
                                            </tr>
                                        @endforeach
                                         
                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endsection