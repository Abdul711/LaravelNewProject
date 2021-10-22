@extends('admin/layouts')
@section('tax_select','active')
@section("pageTitle",$pageTitle)
@section("container")
<div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">{{$pageTitle}}</div>
                                    <div class="card-body">
                                   
                                        <form action="{{route('tax.store')}}" method="post">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Tax Value</label>
                                                <input id="cc-pament" name="tax_value" type="text" class="form-control" aria-required="true"
                                                 aria-invalid="false" value="{{$tax_value}}">
                                            </div>
                                         
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Tax Desc</label>
                                                <input id="cc-number" name="tax_desc" type="tel" class="form-control cc-number identified visa" 
                                                value="{{$tax_desc}}" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                            <input type="text" name="id" value="{{$id}}" hidden>
                                            <div>
                                            @csrf
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-{{$fontAwesome}}"></i>&nbsp;
                                                    <span id="payment-button-amount">{{$pageTitle}}</span>
                                               
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


</div>
                            @endsection