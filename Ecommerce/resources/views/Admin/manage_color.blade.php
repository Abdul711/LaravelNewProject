@extends('admin/layouts')
@section("pageTitle",$pageTitle)
@section("container")
<div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">{{$pageTitle}}</div>
                                    <div class="card-body">
                                   
                                        <form action="{{route('color.store')}}" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Color Name</label>
                                                <input id="cc-pament" name="color_name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$colorName}}">
                                            </div>
                                    <input type="hidden" name="id" value="{{$id}}">
                                        @csrf
                                    
                                    
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-{{$fontAwesome}} fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">{{$pageTitle}}</span>
                                          
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


</div>
                            @endsection