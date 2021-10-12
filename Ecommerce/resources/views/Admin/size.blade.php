@extends('admin/layouts')
@section("container")
@section('size_select','active')
@section("pageTitle","Size")


<div class="row">
                                                 
                            <div class="col-lg-12">
                         
                           <a href="{{url('admin/size/manage')}}"> <button type="button" class="btn btn-outline-primary">
                                            <i class="fa fa-plus"></i>&nbsp; Add </button></a>
                                <div class="table-responsive table--no-card m-b-30">

                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                            <th> S.No</th>
                                                <th>date</th>
                                                <th>Name</th>
                                                <th>Edit</th>
                                                <th>Status</th>
                                                <th>Delete</th>
                                        
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($sizes as $key => $size)
                                            
                                  
                                            <tr>
                                            <td> {{$key+1}}
                                                <td>{{date("d-F-Y",strtotime($size->added_on))}}</td>
                                                <td>{{$size->size_name}}</td>
                                                <td>   <a href="{{url('admin/size/manage/'.$size->id)}}"> <button type="button" class="btn btn-outline-primary">
                                            <i class="fa fa-edit"></i>&nbsp; Edit </button></a></td>
                                                                         <td> 
                                                         @php
                                                   if ($size->status==0){
$btnClass="btn btn-warning";
$btnText="Deactive";
                                                   }
                                                   
                                                   else{
$btnClass="btn btn-success";
$btnText="Active";
                                                   }

                                                   @endphp
                                                  <a href="{{url('admin/size/status/'.$size->id)}}" ><button class="{{$btnClass}}">{{$btnText}}</button></a>
                                                   </td>
                                                       <td>
                                                       <a href="{{url('admin/size/delete/'.$size->id)}}" ><button class="btn btn-danger"><i class="fa fa-trash"></i>
                                                        Delete </button></a></td>
                                            </tr>
                                                  @endforeach
                                
                                     
                                         
                                     
                                  
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            @endsection