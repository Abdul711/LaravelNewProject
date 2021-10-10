@extends('admin/layouts')
@section('brand_select','active')
@section("pageTitle",$pageTitle)
@section("container")
<div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">{{$pageTitle}}</div>
                                    <div class="card-body">
                                   
                                        <form action="{{route('brand.store')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Brand Name</label>
                                                <input id="cc-pament" name="brands_name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$BrandName}}">
                                            </div>
                                    
                                              <div class="form-group">
                                                  <label for="cc-payment" class="control-label mb-1">Choose Brand Logo</label>
                                         <input type="file" class="form-control-file" name="brandImage">
                                 <input type="hidden" name="id" value="{{$id}}">
                                           </div>
                                            <div>
                                               @csrf
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                   <i class="fa fa-{{$fontAwe}} fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">{{$pageTitle}}</span>
                                             
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


</div>
                            @endsection