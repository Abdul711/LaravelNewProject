@extends('admin/layouts')
@section("container")
@section('color_select','active')
@section("pageTitle","color")
<div class="row">
                                                 
                            <div class="col-lg-12">
                         
                           <a href="{{url('admin/color/manage')}}"> <button type="button" class="btn btn-outline-primary">
                                            <i class="fa fa-plus"></i>&nbsp; Add </button></a>
                                <div class="table-responsive table--no-card m-b-30">

                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>date</th>
                                                <th>order ID</th>
                                                <th>name</th>
                                                <th class="text-right">price</th>
                                                <th class="text-right">quantity</th>
                                                <th class="text-right">total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($colors as $color)
                                            
                                  
                                            <tr>
                                                <td>{{date("d-F-Y",strtotime($color->added_on))}}</td>
                                                <td>{{$color->color_name}}</td>
                                                <td>   <a href="{{url('admin/color/manage/'.$color->id)}}"> <button type="button" class="btn btn-outline-primary">
                                            <i class="fa fa-edit"></i>&nbsp; Edit </button></a></td>
                                                                         <td> 
                                                         @php
                                                   if ($color->status==0){
$btnClass="btn btn-warning";
$btnText="Deactive";
                                                   }
                                                   
                                                   else{
$btnClass="btn btn-success";
$btnText="Active";
                                                   }

                                                   @endphp
                                                  <a href="{{url('admin/color/status/'.$color->id)}}" ><button class="{{$btnClass}}">{{$btnText}}</button></a>
                                                   </td>
                                            </tr>
                                                  @endforeach
                                
                                     
                                         
                                     
                                  
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endsection