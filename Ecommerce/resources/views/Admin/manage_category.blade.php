@extends('admin/layouts')
@section("pageTitle",$pageTitle)
@section("container")

<div class="row">
 
                            <div class="col-lg-12">
         @error("image")
    		<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Something Went Wrong</span>
									               {{$message}}      
 
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
@enderror
       @error("categoryName")
    		<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Something Went Wrong</span>
									               {{$message}}      
 
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
@enderror
                                <div class="card">
                                    <div class="card-header">{{$pageTitle}}</div>
                                    <div class="card-body">
                                   
                                        <form action="{{route('category.store')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                                <input id="cc-pament" name="categoryName" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$categoryName}}{{old('categoryName')}}">
                                            </div>
                                     
                                         
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Parent Category</label>
                                               <select name="parentId" class="form-control">
                                           
                                               <option value="0"> Select Parent Category</option>
                                               @foreach   ($parents_id as $parent_id)
                                                         <option value="">{{$parent_id->categories_name}}</option> 
                                               @endforeach
                                             
</select>
                    
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Image</label>
                                                    <div class="input-group">
      
                                                  <input type="file" name="image">

                                                    </div>
                                                </div>
                                                <input type="hidden" name="id" value="{{$id}}">
                                            </div>
                                            <div>
                                                @csrf
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-{{$fontAwe}} fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">{{$pageTitle}}</span>
                                                
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


</div>
                            @endsection