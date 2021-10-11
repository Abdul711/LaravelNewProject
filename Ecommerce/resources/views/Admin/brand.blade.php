@extends('admin/layouts')
@section("container")
@section('brand_select','active')
@section("pageTitle","Brand")
<div class="row">
                                                 
                            <div class="col-lg-12">
                         
                           <a href="{{url('admin/brand/manage')}}"> <button type="button" class="btn btn-outline-primary">
                                            <i class="fa fa-plus"></i>&nbsp; Add </button></a>
                                <div class="table-responsive table--no-card m-b-30">

                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                            <th> S.NO</th>
                                                <th>date</th>
                                                <th> Name</th>
                                                <th>name</th>
                                                <th >Edit </th>
                                                <th >Delete</th>
                                                <th >Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                          @foreach ($brands  as $key => $brand)
                                               <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{date("d-F-Y",strtotime($brand->added_on))}}</td>
                                                <td>{{$brand->brands_name}}</td>
                                                <td><a href="{{asset('storage//media/brand/'.$brand->image)}}"><img src="{{asset('storage//media/brand/'.$brand->image)}}"></a></td>
                                                <td>   <a href="{{url('admin/brand/manage/'.$brand->id)}}"> <button type="button" class="btn btn-outline-primary">
                                            <i class="fa fa-edit"></i>&nbsp; Edit </button></a></td>
                                                  <td><a href="{{url('admin/brand/delete/'.$brand->id)}}" ><button class="btn btn-danger"><i class="fa fa-trash"></i> Delete </button></a></td>
                                                                         <td> 
                                                         @php
                                                   if ($brand->status==0){
$btnClass="btn btn-warning";
$btnText="Deactive";
                                                   }
                                                   
                                                   else{
$btnClass="btn btn-success";
$btnText="Active";
                                                   }

                                                   @endphp
                                                  <a href="{{url('admin/brand/status/'.$brand->id)}}" ><button class="{{$btnClass}}">{{$btnText}}</button></a>
                                                   </td>
                                            </tr>
                                          @endforeach 
                                
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endsection