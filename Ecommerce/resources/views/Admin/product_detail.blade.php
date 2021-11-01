@extends('admin/layouts')
@section("container")
@section('product_select','active')
@section("pageTitle","Product Detail")




<div class="row">

                            <div class="col-lg-12">
                 <h1 class="text-center"> {{$product_details[0]->product_name}}  </h1>
          <div class="au-card au-card--bg-blue au-card-top-countries m-b-30">
                                    <div class="au-card-inner">
                                        <div class="table-responsive">
                                            <table class="table table-top-countries">
                                                <tbody>

                                                    <tr>
                                                        <td>Brand</td>
                                 <td>  {{$product_details[0]->brands_name}} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Current Status</td>

                                             @if($product_details[0]->status==1)
                                             <td> Active</td>
                                                   @else
                                                     <td> Deactive</td>
                                                   @endif
                                                    </tr>
                                                         <tr>
                                                    <td> Category Name</td>
                                                    <td>  {{$product_details[0]->categories_name}} </td>
                                                    </tr>
                                                    <tr>
                                                    <td> Vendor Email </td>
                                      <td>  {{$product_details[0]->email}} </td>
                                                    </tr>
                                                    <tr>
                                                    <td> Vendor Mobile </td>
                                                    <td>  {{$product_details[0]->mobile}} </td>
                                                    </tr>
                                               <tr>
                                                <td> <img src="  {{asset('storage/media/product/'.$product_details[0]->image)}}" ></td>
                                                   </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                </div>
                            </div>
                            

                           
<div class="row">

                            <div class="col-lg-12">


                                <div class="table-responsive table--no-card m-b-30">

                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                         <tr>
                                         <th> S.No</th>
                                         <th> Color </th>
                                                <th> Size </th>
                                                <th> Price </th>
                                                   <th> Qty </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                          @foreach($product_attribute_details as $key => $value)
                                  <tr>
                                  <td>{{$key+1}}</td>
                           <td>{{$value->color_name}}       </td>
                                   <td>{{$value->size_name}}       </td>
                                           <td>{{$value->price}}       </td>
                                                   <td>{{$value->qty}}       </td>
                                                      @if($value->status==1)
                                                      <td> <a href=""> Active </a> </td>
                                                      @else
                                                        <td> <a href=""> Deactive </a> </td>
                                                      @endif
                                  </tr>
                          @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endsection
                   