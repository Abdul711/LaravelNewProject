@extends('admin/layouts')
@section("container")
@section('brand_select','active')
@section("pageTitle","$coupon_code Coupon Detail")
<div class="row">
                                                 
                            <div class="col-lg-12">
          
          <div class="au-card au-card--bg-blue au-card-top-countries m-b-30">
                                    <div class="au-card-inner">
                                        <div class="table-responsive">
                                            <table class="table table-top-countries">
                                                <tbody>
                                                    <tr>
                                                        <td>Coupon Code</td>
                                                        <td class="text-right">{{$coupon_code}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Coupon Type</td>
                                                        <td class="text-right">{{$coupon_type}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Coupon Sub Type</td>
                                                        <td class="text-right">{{$coupon_sub_type}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Coupon Discount </td>
                                                        @if ($coupon_type=="fixed")
                                                               <td class="text-right">{{$coupon_discount}} Rs</td>
                                                               @else
                                                                   <td class="text-right">{{$coupon_discount}} % </td>
                                                        @endif
                                                     
                                                    </tr>
                                                    <tr>
                                                        <td>Usage Limit Per User</td>
                                                        <td class="text-right">{{$limit}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Max Discount</td>
                                                        <td class="text-right">{{$max_discount}} Rs</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Cart Min Value </td>
                                                        <td class="text-right">{{$cart_min_value}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Current Status</td>
                                                        <td class="text-right">{{$status}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                </div>
                            </div>
                            @endsection