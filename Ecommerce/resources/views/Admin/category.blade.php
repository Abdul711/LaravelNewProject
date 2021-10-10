@extends('admin/layouts')
@section("container")
@section('category_select','active')
@section("pageTitle","Category")
<div class="row">
                                                 
                            <div class="col-lg-12">
                         
                           <a href="{{url('admin/category/manage')}}"> <button type="button" class="btn btn-outline-primary">
                                            <i class="fa fa-plus"></i>&nbsp; Add </button></a>
                                <div class="table-responsive table--no-card m-b-30">
 <a href="https://wa.me/923323565866">Click Me</a>
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Category Name</th>
                                                <th>Parent Category</th>
                                                <th class="text-center">Added On</th>
                                                <th class="text-center">Edit</th>
                                                <th class="text-center">Delete</th>
                                                   <th class="text-center">Show/Hide</th>
                                                      <th class="text-center">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    
                                        @foreach ($categories as $key => $category)
                                                <tr>
                                                <td>{{$key+1}} </td>
                                                <td>{{$category->categories_name}}</td>
                                                <td>iPhone X 64Gb Grey</td>
                                                <td>{{date("d-F-Y",strtotime($category->added_on))}}</td>
                                                <td><a href="{{url('admin/category/manage/'.$category->id)}}" ><button class="btn btn-primary"><i class="fa fa-edit"></i> Edit </button></a></td>
                                                <td><a href="{{url('admin/category//'.$category->id)}}" ><button class="btn btn-danger"><i class="fa fa-trash"></i> Delete </button></a></td>
                                                   <td> 


                                                   @php 
if ($category->show_cate==0){
    $btnClassName="btn btn-warning";
    $btnIcon="fa fa-eye";
    $showText="Show";
}else{
        $btnClassName="btn btn-success";
            $btnIcon="fa fa-eye-slash";
              $showText="Hide";

}
                                                   @endphp
                      
                                                   <a href="{{url('admin/category/update_show/'.$category->id)}}" ><button class="{{$btnClassName}}"><i class="{{$btnIcon}}"></i>{{$showText}}</button></a>
                                                 
                                                   </td>
                                                         <td> 
                                                         @php
                                                   if ($category->status==0){
$btnClass="btn btn-warning";
$btnText="Deactive";
                                                   }
                                                   
                                                   else{
$btnClass="btn btn-success";
$btnText="Active";
                                                   }

                                                   @endphp
                                                  <a href="{{url('admin/category/status/'.$category->id)}}" ><button class="{{$btnClass}}">{{$btnText}}</button></a>
                                                   </td>
                                            </tr>
                                        @endforeach
                                        
                                       
                                         
                       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endsection