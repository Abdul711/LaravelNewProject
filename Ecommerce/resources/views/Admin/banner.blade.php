@extends('admin/layouts')
@section("container")
@section('banner_select','active')
@section("pageTitle","Banner")

<div class="row">
                                                 
                            <div class="col-lg-12">
                         
                           <a href="{{url('admin/banner/manage')}}"> <button type="button" class="btn btn-outline-primary">
                                            <i class="fa fa-plus"></i>&nbsp; Add </button></a>
                                <div class="table-responsive table--no-card m-b-30">

                                    <table class="table table-borderless table-striped table-earning" on>
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                  <th>Image</th>
                                                <th>Link Text</th>
                                              
                                                <th>Text</th>
                                                   <th>Added On</th>
                                                         <th>Status</th>
                                                <th>Edit</th>
                                         
                                            </tr>
                                        </thead>
                                        <tbody  id="tableBody">
                                             @foreach ($banners as $key => $item)
                                            <tr> 
                                         <td>   {{$key+1}}</td>
                                                        <td>      <img src="{{asset('storage/media/banner/'.$item->image)}}"></td>
                                                               <td>       {{$item->linktext}}</td>
                                                         <td>  {{$item->text}}</td>
                                                  
             <td> {{date("d-F-Y",strtotime($item->added_on))}}</td>
                                                   
                                                             @if($item->status==1)
                                                                  <td>    <a href="{{url('admin/banner/status/'.$item->id)}}">Active</a></td>
                                                            @else
                                                                      <td>     <a href="{{url('admin/banner/status/'.$item->id)}}">Deactive</a></td>
                                                            @endif
                                                                       <td>   <a href="{{url('admin/banner/manage/'.$item->id)}}">Edit</a></td>
                                                                    
                                             @endforeach
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                             
                            @endsection
