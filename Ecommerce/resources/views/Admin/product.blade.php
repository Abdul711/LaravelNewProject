@extends('admin/layouts')
@section("container")
@section('product_select','active')
@section("pageTitle","Product")
<div class="row">
                                                 
                            <div class="col-lg-12">
                         
                           <a href="{{url('admin/product/manage')}}"> <button type="button" class="btn btn-outline-primary">
                                            <i class="fa fa-plus"></i>&nbsp; Add </button></a>
                                <div class="table-responsive table--no-card m-b-30">

                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                            <th> S.NO </th>
                                                <th>date</th>
                                   
                                                <th>Name</th>
                                        <th> Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    @foreach($products as $key => $value)
                                               <tr>
                                             <td>  {{$key+1}}</td>
                                                <td>{{date("d-F-Y",strtotime($value->added_on))}}</td>
                                                <td>{{$value->product_name}}</td>
                                                      <td><img src="{{asset('storage/media/product/'.$value->image)}}"></td>
                                            </tr>
                                    @endforeach
                                     
                                 
                                       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endsection