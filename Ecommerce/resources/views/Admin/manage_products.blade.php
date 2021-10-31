@extends('Admin/layouts')
@section('pageTitle',$pageTitle)
@section('product_select','active')
@section('container')


<h1 class="mb10">{{$pageTitle}}</h1>

<!--<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">

   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">×</span>
   </button>
</div> -->




<div class="row m-t-30">
   <div class="col-md-12">
      <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-body">
                     @csrf
                     <div class="form-group">
                        <label for="name" class="control-label mb-1"> Name</label>
                        <input id="name" value="{{$productName}}" name="name" type="text" class="form-control" aria-="true" aria-invalid="false"  >
                      
                     </div>
                
                     <div class="form-group">
                        <label for="image" class="control-label mb-1"> Image</label>
                        <input id="image" name="image_product" type="file" class="form-control" aria-="true" aria-invalid="false">
                   
                     </div>
                     
                     <div class="form-group">
                        <div class="row">
                           <div class="col-md-6">
                              <label for="category_id" class="control-label mb-1"> Category</label>
                              <select id="category_id" name="category_id" class="form-control" >
                                 <option value="">Select Categories</option>
                                 @foreach ($categories as $category )
                                @if($categories_id==$category->id)
                                    <option value="{{$category->id}}" selected> {{$category->categories_name}} </option>
                                    @else

                                  <option value="{{$category->id}}"> {{$category->categories_name}} </option>
                                @endif
                                 
                                 @endforeach
                              </select>
                           </div>
                           <div class="col-md-6">
                              <label for="category_id" class="control-label mb-1"> Brand</label>
                              <select id="brand" name="brand" class="form-control" >
                                 <option value="">Select Brand</option>
                                   @foreach($brands as $brand)
                                       @if($brand_id == $brand->id)
                                     <option value="{{$brand->id}}" selected> {{$brand->brands_name}} </option>
                                     @else
                                      <option value="{{$brand->id}}"> {{$brand->brands_name}} </option>
                                     @endif
                                   @endforeach
                              </select>
                           </div>
                      
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="short_desc" class="control-label mb-1"> Short Desc</label>
                        <textarea id="short_desc" name="short_desc" type="text" class="form-control" aria-="true" aria-invalid="false"
                         >{{$short_desc}}</textarea>
                     </div>
                     <div class="form-group">
                        <label for="desc" class="control-label mb-1"> Desc</label>
                        <textarea id="desc" name="desc" type="text" class="form-control" aria-="true" aria-invalid="false" >{{$desc}}</textarea>
                     </div>
                     <div class="form-group">
                        <label for="keywords" class="control-label mb-1"> Keywords</label>
                        <textarea id="keywords" name="keywords" type="text" class="form-control" aria-="true" aria-invalid="false" >
                        {{$keyword}}
                      </textarea>
                     </div>
            
               

                        </div>
                     </div>

                 <!-- 
                  </div>
               </div>-->
            </div>
    
            <div class="col-lg-12">
                    <h2 class="mb10 ml15">Product Images</h2>
               <div class="card">
                  <div class="card-body">
                     <div class="form-group">
                        <div class="row" id="product_images_box">
                
                        <input id="piid" type="hidden" name="piid[]" value="">
                        <div class="col-md-4 product_images_"  >
                              <label for="images" class="control-label mb-1"> Image</label>
                              <input id="images" name="images[]" type="file" class="form-control" aria-="true" aria-invalid="false" >

                         
                           </div>
                           
                           <div class="col-md-2">
                              <label for="images" class="control-label mb-1"> 
                              &nbsp;&nbsp;&nbsp;</label>
                              
                       
                                <button type="button" class="btn btn-success btn-lg" onclick="add_image_more()">
                                <i class="fa fa-plus"></i>&nbsp; Add</button>
                           
                              <a href="""><button type="button" class="btn btn-danger btn-lg">
                                <i class="fa fa-minus"></i>&nbsp; Remove</button></a>
                              

                           </div>
                           
                        </div>
                     </div>
                  </div>
               </div>
               
            </div>
        
            <div class="col-lg-12" id="product_attr_box">
              <h2 class="mb10 ml15">Product Attributes</h2>
              @foreach($productAttributes as $key => $productAttribute)
               <input id="paid" type="hidden" name="paid[]" value="{{$productAttribute["id"]}}">
               <div class="card" id="product_attr_">
                  <div class="card-body">
                     <div class="form-group">
                        <div class="row">
                           <div class="col-md-2">
                              <label for="sku" class="control-label mb-1"> SKU</label>
                              <input id="sku" name="sku[]" type="text" class="form-control" aria-="true" aria-invalid="false"
                               value="{{$productAttribute["attribute"]}}" >
                           </div>
                      
                  
                           <div class="col-md-2">
                              <label for="price" class="control-label mb-1"> Price</label>
                              <input id="price" name="prices[]" type="text" class="form-control" aria-="true" aria-invalid="false" 
                              value="{{$productAttribute['price']}}" >
                           </div>
                           <div class="col-md-3">
                              <label for="size_id" class="control-label mb-1"> Size</label>
                              <select id="size_id" name="size_id[]" class="form-control">
                                 <option value="">Select</option>
                                  @foreach ($sizes as  $size)
                                     @if($productAttribute["size_id"]==$size->id)
                                      <option value="{{$size->id}}"selected> {{$size->size_name}}</option>
                                      @else
                                           <option value="{{$size->id}}"> {{$size->size_name}}</option>
                                      @endif
                                  @endforeach
                              </select>
                           </div>
                           <div class="col-md-3">
                              <label for="color_id" class="control-label mb-1"> Color</label>
                              <select id="color_id" name="color_id[]" class="form-control">
                                 <option value="">Select</option>
                                     @foreach ($colors as  $color)
                                       @if($productAttribute["color_id"]==$color->id)
                                      <option value="{{$color->id}}"selected> {{$color->color_name}}</option>
                                      @else
                                           <option value="{{$color->id}}"> {{$color->color_name}}</option>
                                      @endif
                                  @endforeach
                               </select>
                           </div>
                                <div class="col-md-3">
                              <label for="tax_id" class="control-label mb-1">Tax</label>
                              <select id="tax_id" name="tax_id[]" class="form-control">
                                 <option value="">Select</option>
                                      @foreach ($taxes as  $tax)
                                            @if($productAttribute["tax_id"]==$tax->id)
                                      <option value="{{$tax->id}}"selected> {{$tax->tax_desc}}</option>
                                      @else
                                        <option value="{{$tax->id}}"> {{$tax->tax_desc}}</option>
                                        @endif
                                  @endforeach
                               </select>
                           </div>
                              <div class="col-md-3">
                              <label for="coupon_id" class="control-label mb-1">Coupon</label>
                              <select id="coupon_id" name="coupon_id[]" class="form-control">
                                 <option value="">Select</option>
                                  @foreach ($coupons as  $coupon)
                                       @if($productAttribute["coupon_id"]==$coupon->id)
                                      <option value="{{$coupon->id}}" selected> {{$coupon->coupon_code}}</option>
                                      @else
                                                    <option value="{{$coupon->id}}"> {{$coupon->coupon_code}}</option>
                                      @endif
                                  @endforeach
                               </select>
                           </div>
                           <div class="col-md-2">
                              <label for="qty" class="control-label mb-1"> Qty</label>
                              <input id="qty" name="qtys[]" type="text" class="form-control" aria-="true" aria-invalid="false"
                               value="{{$productAttribute['qty']}}" >
                           </div>
                        <!--   <div class="col-md-4">
                              <label for="attr_image" class="control-label mb-1"> Image</label>
                              <input id="attr_image" name="attr_image[]" type="file" class="form-control" aria-="true" aria-invalid="false" >

                          
                           </div>-->
                           <div class="col-md-2">
                         
                      
                               @if ($key>=0 && $key<1) 
                                    <button type="button" class="btn btn-success btn-lg m-4" onclick="add_more()">
                                <i class="fa fa-plus"></i>&nbsp; Add</button>
                                      @else
                                          <a href=""><button type="button" class="btn btn-danger btn-lg m-4">
                                <i class="fa fa-minus"></i>&nbsp; Remove</button></a>
                               @endif
                               
                                   
                    
                          
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            @endforeach
            </div>
         </div>
         <div>
            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
            {{$pageTitle}}
            </button>
         </div>
         <input type="hidden" name="id" value="{{$id}}"/>
      </form>
   </div>
</div>
<script>
   var loop_count=1; 
   function add_more(){
       loop_count++;
       var html='<input id="paid" type="hidden" name="paid[]" ><div class="card" id="product_attr_'+loop_count+'"><div class="card-body"><div class="form-group"><div class="row">';

       html+='<div class="col-md-2"><label for="sku" class="control-label mb-1"> SKU</label><input id="sku" name="sku[]" type="text" class="form-control" aria-="true" aria-invalid="false" ></div>'; 

   

       html+='<div class="col-md-2"><label for="price" class="control-label mb-1"> Price</label><input id="price" name="prices[]" type="text" class="form-control" aria-="true" aria-invalid="false" ></div>';

       var size_id_html=jQuery('#size_id').html(); 
       size_id_html = size_id_html.replace("selected", "");
       html+='<div class="col-md-3"><label for="size_id" class="control-label mb-1"> Size</label><select id="size_id" name="size_id[]"  class="form-control">'+size_id_html+'</select></div>';

       var color_id_html=jQuery('#color_id').html(); 
       color_id_html = color_id_html.replace("selected", "");
       html+='<div class="col-md-3"><label for="color_id" class="control-label mb-1"> Color</label><select name="color_id[]" class="form-control" >'+color_id_html+'</select></div>';
       var tax_id_html=jQuery('#tax_id').html(); 
       tax_id_html = tax_id_html.replace("selected", "");
  html+='<div class="col-md-3"><label for="tax_id" class="control-label mb-1">Tax</label><select  name="tax_id[]" class="form-control" >'+tax_id_html+'</select></div>';
       var coupon_id_html=jQuery('#coupon_id').html(); 
       coupon_id_html = coupon_id_html.replace("selected", " ");
  html+='<div class="col-md-3"><label for="color_id" class="control-label mb-1">Coupon</label><select  name="coupon_id[]" class="form-control" >'+coupon_id_html+'</select></div>';
       html+='<div class="col-md-3"><label class="control-label mb-1">Qty</label><input type="text" name="qtys[]" class="form-control"> </div>';
  html+=' <div class="col-md-2 m-4"><button type="button" class="btn btn-danger btn-lg" onclick=remove_more("'+loop_count+'")><i class="fa fa-minus"></i>&nbsp; Remove</button></div>'; 
   
       html+='</div></div></div></div>';

       jQuery('#product_attr_box').append(html);
   }
   function remove_more(loop_count){
        jQuery('#product_attr_'+loop_count).remove();
   }

   var loop_image_count=1; 
   function add_image_more(){
      loop_image_count++;
      var html='<input id="piid" type="hidden" name="piid[]" value=""><div class="col-md-4 product_images_'+loop_image_count+'"><label for="images" class="control-label mb-1"> Image</label><input id="images" name="images[]" type="file" class="form-control" aria-="true" aria-invalid="false" ></div>';
      //product_images_box
       html+='<div class="col-md-2 product_images_'+loop_image_count+'""><label for="attr_image" class="control-label mb-1"> &nbsp;&nbsp;&nbsp;</label><button type="button" class="btn btn-danger btn-lg" onclick=remove_image_more("'+loop_image_count+'")><i class="fa fa-minus"></i>&nbsp; Remove</button></div>'; 
       jQuery('#product_images_box').append(html)
   }

   function remove_image_more(loop_image_count){
        jQuery('.product_images_'+loop_image_count).remove();
   }
   CKEDITOR.replace('short_desc');
   CKEDITOR.replace('desc');
   CKEDITOR.replace('technical_specification');
</script>
@endsection