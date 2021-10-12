@extends('admin/layouts')
@section("container")
@section('coupon_select','active')
@section("pageTitle","Coupon")
<div class="row">
                                                 
                            <div class="col-lg-12">
                    
                           <a href="{{url('admin/coupon/manage')}}"> <button type="button" class="btn btn-outline-primary">
                                            <i class="fa fa-plus"></i>&nbsp; Add </button></a>
                                <div class="table-responsive table--no-card m-b-30">

                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                               <th> S.NO</th>
                                                <th>date</th>
                                                <th>Coupon Mame</th>
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
                                                <td>{{date("d-F-Y",strtotime($coupon->added_on))}}</td>
                                                <td>{{$coupon->coupon_code}}</td>
                                                <td><a href="#"> View Detail</a></td>
                                                <td>1</td>
                                                <td>$999.00</td>
                                            </tr>
                                        @endforeach
                                         
                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endsection