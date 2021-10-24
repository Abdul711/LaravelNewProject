@extends('admin/layouts')
@section("container")
@section('coupon_select','active')
@section("pageTitle","$otherAdmin Detail")
@section('otheradmin_select','active')
<div class="row">
                                                 
                            <div class="col-lg-12">
                 <h1 class="text-center"> {{$otherAdmin}} </h1>
          <div class="au-card au-card--bg-blue au-card-top-countries m-b-30">
                                    <div class="au-card-inner">
                                        <div class="table-responsive">
                                            <table class="table table-top-countries">
                                                <tbody>
                                                    <tr>
                                                        <td>Role</td>
                                                     <td class="text-right">{{$role}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                 <td class="text-right">{{$email}}</td>
                                                    </tr>
                                               
                                                       <tr>
                                                        <td>Mobile</td>
                                                          <td class="text-right">{{$mobile}}</td>
                                                    </tr>
                                              
                                                    <tr>
                                                        <td>Status</td>
                                               <td class="text-right"> {{$status}}</td>
                                                    </tr>
                                                          <tr>
                                                        <td>Verify Status</td>
                                               <td class="text-right"> {{$verifystatus}}</td>
                                                    </tr>
                                                  <tr>
                                                        <td>Registeration Date</td>
  <td class="text-right"> {{date("d-F-Y",strtotime($registerDate))}}</td>
                                                
                                                    </tr>
                                                   <tr>
                                                        <td>Registeration Time</td>
                                                <td class="text-right"> {{date("h:i a",strtotime($registerDate))}}</td>
                                                    </tr>
                                        
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                </div>
                            </div>
                            @endsection