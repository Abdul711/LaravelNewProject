@extends('admin/layouts')
@section("pageTitle",$pageTitle)
@section('coupon_select','active')
@section("container")
          
     

          @error('coupon_code')
                 	<div class="sufee-alert alert with-close alert-danger alert-dismissible m-2  fade show">
								  
								        {{$message}}
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
                                         
                                            @enderror
                                                @error('coupon_amount')
                 	<div class="sufee-alert alert with-close alert-danger alert-dismissible m-2  fade show">
								  
								        {{$message}}
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
                                         
                                            @enderror
                                            
<div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">{{$pageTitle}}</div>
                                    <div class="card-body">
                                   
                                        <form action="{{route('coupon.store')}}" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Coupon Code</label>
                                                <input id="cc-pament" name="coupon_code" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$coupon_code}}">
                                            </div>
                                          <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Cart Min Value</label>
                                                <input id="cc-pament" name="cart_min_value" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$cart_min_value}}">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Coupon Amount(Coupon Value)</label>
                                                <input id="cc-name" name="coupon_amount" type="text" 
                                                class="form-control cc-name valid" data-val="true" 
                                                data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true"
                                                     aria-invalid="false" aria-describedby="cc-name-error" value="{{$coupon_amount}}">
                                                <span class="help-block field-validation-valid"
                                                 data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Max Discount</label>
                                                <input id="cc-number" name="max_discount" type="text" 
                                                class="form-control cc-number identified visa" 
                                                data-val="true"
                                                     value="{{$max_discount}}">
                                             
                                            </div>
                                                      <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Limit Per User</label>
                                                <input id="cc-number" name="limit" type="text" 
                                                class="form-control cc-number identified visa" 
                                                data-val="true"
                                                     value="{{$limit}}">
                                             
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Coupon Main Type</label>
                                                        <select name="coupon_type">
         <option value=""> Please select </option>
                                                        @if ($coupon_type=="fixed")
                                                              <option value="fixed" selected>Fixed</option>
                                                                <option value="percentage">Percentage</option>
                                                            @elseif($coupon_type=="percentage") 
                                                                <option value="fixed" >Fixed</option>
                                                                <option value="percentage"selected >Percentage</option> 
                                                                @else
                                                                      <option value="fixed" >Fixed</option>
                                                                <option value="percentage">Percentage</option> 
                                                        @endif
                                                      
                                                        
                                                        </select>

                                                 
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                
                                                    <div class="form-group">
                                                    <label for="cc-exp" class="control-label mb-1">Coupon Sub Type</label>
                                                         <select name="coupon_sub_type">
                                                         <option value=""> Please select </option>
                                                                  @if ($coupon_sub_type=="order")
                                                         <option value="order" selected> Order</option>
                                                         <option value="product"> Product</option>
                                                          @elseif ($coupon_sub_type=="product")
                                                            <option value="order"> Order</option>
                                                         <option value="product" selected> Product</option>
                                                         @else
                                                                  <option value="order"> Order</option>
                                                         <option value="product"> Product</option>
                                                         @endif
                                                          </select>
                                                           
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                            <input type="hidden" value="{{$id}}" name="id">
                                            @csrf
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-{{$pageFontAwesome}} fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">{{$pageTitle}}</span>
                                               
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


</div>
                            @endsection