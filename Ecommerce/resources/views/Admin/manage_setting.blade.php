@extends('admin/layouts')
@section('setting_select','active')
@section("pageTitle",$pageTitle)
@section("container")
<div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">{{$pageTitle}}</div>
                                    <div class="card-body">
                                   
                                        <form action="{{route('setting.store')}}" method="post">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Delivery Charge</label>
                                                <input id="cc-pament" name="delivery_charge" type="text" class="form-control" aria-required="true"
                                                 aria-invalid="false" value="{{$delivery_charge}}">
                                            </div>
                                         
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Cart Min Amount</label>
                                                <input id="cc-number" name="cart_min_amount" type="tel" class="form-control cc-number identified visa" 
                                                value="{{$cart_min_amount}}" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                                     <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Delivery Time</label>
                                                <input id="cc-number" name="delivery_time" type="tel" class="form-control cc-number identified visa" 
                                                value="{{$delivery_time}}" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                                     <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Min Item</label>
                                                <input id="cc-number" name="min_item" type="tel" class="form-control cc-number identified visa" 
                                                value="{{$min_item}}" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                                     <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Referral Amount</label>
                                                <input id="cc-number" name="referral_amount" type="tel" class="form-control cc-number identified visa" 
                                                value="{{$referral_amount}}" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                                     <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Welcome Amount</label>
                                                <input id="cc-number" name="welcome_amount" type="tel" class="form-control cc-number identified visa" 
                                            value="{{$welcome_amount}}" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                                          <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1"> Amount For Free Delivery</label>
                                                <input id="cc-number" name="amount_delivery" type="tel" class="form-control cc-number identified visa" 
                                            value="{{$amount_delivery}}" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                          

                                     <div class="form-group">
                                     Web Status
                                     <select name="web_status" class="form-contorl-select col-12">
                                           @if($web_status==1)
                                              <option value="1" selected> On </option>
                                                          <option value="0"> Off </option>
                                                          @else
      <option value="1"> On </option>
                                                          <option value="0" selected> Off </option>
                                           @endif
                                           </select>
                                           </div>
                            <input type="text" name="id" value="" hidden>
                                            <div>
                                            @csrf
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                 
                                                    <span id="payment-button-amount">{{$pageTitle}}</span>
                                               
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


</div>
                            @endsection