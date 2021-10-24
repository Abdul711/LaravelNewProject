@extends('admin/layouts')
@section("container")
@section('otheradmin_select','active')
@section("pageTitle","Other Admin")
<div class="row">
                                                 
                            <div class="col-lg-12">
                         
                         
                                <div class="table-responsive table--no-card m-b-30">

                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                            <th> S.NO</th>
                                                <th>date</th>
                                                <th> Name</th>
                                                <th> View Detail</th>
                                                <th >Verify </th>
                                                <th >Block/Unblock</th>
                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                          @foreach ($otheradmins as $key => $otheradmin)
                                               <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{date("d-F-Y",strtotime($otheradmin->added_on))}}</td>
                                                <td>{{$otheradmin->username}}</td>
                                                    <td><a href="{{url('admin/otheradmin/detail/'.$otheradmin->id)}}">View Detail</a></td>
                                         
                                                   @if($otheradmin->verified==1)
                                                  <td>


                                                  <a href="{{url('admin/otheradmin/verified/'.$otheradmin->id)}}" >
                                                  <button class="btn btn-success">Verified </button></a></td>
                                                                         <td> 
                                                                         @else
                                                                           <td>


                                                  <a href="{{url('admin/otheradmin/verified/'.$otheradmin->id)}}" >
                                                  <button class="btn btn-danger">Not Verified </button></a></td>
                                                                         <td> 
                                                                    @endif     

                                                         @php
                                                   if ($otheradmin->status==0){
$btnClass="btn btn-warning";
$btnText="Deactive";
                                                   }
                                                   
                                                   else{
$btnClass="btn btn-success";
$btnText="Active";
                                                   }

                                                   @endphp
                                                  <a href="{{url('admin/otheradmin/status/'.$otheradmin->id)}}" ><button class="{{$btnClass}}">{{$btnText}}</button></a>
                                                   </td>
                                            </tr>
                                          @endforeach 
                                
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endsection