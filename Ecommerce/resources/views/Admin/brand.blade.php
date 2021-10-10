@extends('admin/layouts')
@section("container")
@section('brand_select','active')
@section("pageTitle","Category")
<div class="row">
                                                 
                            <div class="col-lg-12">
                         
                           <a href="{{url('admin/brand/manage')}}"> <button type="button" class="btn btn-outline-primary">
                                            <i class="fa fa-plus"></i>&nbsp; Add </button></a>
                                <div class="table-responsive table--no-card m-b-30">

                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>date</th>
                                                <th> Name</th>
                                                <th>name</th>
                                                <th >Edit </th>
                                                <th >quantity</th>
                                                <th >total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                          @foreach ($brands as $brand)
                                               <tr>
                                                <td>{{date("d-F-Y",strtotime($brand->added_on))}}</td>
                                                <td>{{$brand->brands_name}}</td>
                                                <td><img src="{{asset('storage//media/brand/'.$brand->image)}}"</td>
                                                <td>   <a href="{{url('admin/brand/manage/'.$brand->id)}}"> <button type="button" class="btn btn-outline-primary">
                                            <i class="fa fa-edit"></i>&nbsp; Edit </button></a></td>
                                                  <td><a href="{{url('admin/brand/delete/'.$brand->id)}}" ><button class="btn btn-danger"><i class="fa fa-trash"></i> Delete </button></a></td>
                                                <td >$999.00</td>
                                            </tr>
                                          @endforeach 
                                
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endsection