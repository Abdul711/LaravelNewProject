@extends('admin/layouts')
@section("container")
@section('tax_select','active')
@section("pageTitle","Tax")

<div class="row">
                                                 
                            <div class="col-lg-12">
                         
                           <a href="{{url('admin/tax/manage')}}"> <button type="button" class="btn btn-outline-primary">
                                            <i class="fa fa-plus"></i>&nbsp; Add </button></a>
                                <div class="table-responsive table--no-card m-b-30">

                                    <table class="table table-borderless table-striped table-earning" on>
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Tax Value</th>
                                                <th>Tax   Description</th>
                                                <th> Edit</th>
                                                <th>Status</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody  id="tableBody">
                                       
                                           @foreach ($taxes as $i => $tax)
                                               
                                      
                                            <tr>
                                                <td>{{$i+1}}</td>
                                                <td>{{$tax["tax_desc"]}}</td>
                                                <td>{{$tax['tax_value']}}</td>
                                                <td><a href="{{url('admin/tax/manage/'.$tax['id'])}}">Edit</a></td>
                                                @if($tax["status"]==1)
                                                <td><a href="{{url('admin/tax/status/'.$tax['id'])}}">Active</a></td>
                                                @else
                                                 <td><a href="{{url('admin/tax/status/'.$tax['id'])}}">Deactive</a></td>
                                                 @endif
                                            <td><a href="{{url('admin/tax/delete/'.$tax['id'])}}">Delete</a></td>

                                            </tr>
                                                 @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                             
                            @endsection
