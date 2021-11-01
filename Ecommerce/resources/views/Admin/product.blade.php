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
                                         

                                                <th>Name</th>
                                
                                        <th colspan="4" class="text-center"> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    @foreach($products as $key => $value)
                                               <tr>
                                             <td>  {{$key+1}}</td>
                                         
                                                <td>{{$value->product_name}}</td>
                                             
                                                      <td><a href="{{url('admin/product/manage/'.$value->id)}}"> Edit </a></td>


                                                          @if($value->status==1)
                                                          <td><a href="{{url('admin/product/status/'.$value->id)}}"> Active </a></td>
                                                          @else
                                                                <td><a href="{{url('admin/product/status/'.$value->id)}}"> Deactive </a></td>
                                                            @endif
                                                              <td><a href="{{url('admin/product/detail/'.$value->id.'/1')}}"> Show Detail</a></td>
                                                  
                                            </tr>
                                    @endforeach



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endsection
