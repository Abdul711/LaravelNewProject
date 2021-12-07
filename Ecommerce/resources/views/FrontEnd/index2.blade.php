







  <!-- Start slider -->
@extends('FrontEnd/layout')
@section('container')
  <!--<section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">


                   <li>

                <img data-seq src="" alt="Men slide img" />

              <div class="seq-title">
               <span data-seq>Save Up to 75% Off</span>
                <h2 data-seq>Men Collection</h2>
                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>




          </ul>
        </div>

        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>-->
  <!-- / slider -->
  <!-- Start Promo section -->
  <section id="aa-promo">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-promo-area">
            <div class="row">
              <!-- promo left -->

              @foreach($categories as $key => $category)
                                <div class="col-md-5 no-padding">
                <div class="aa-promo-left">
                  <div class="aa-promo-banner">
                    <img src="{{asset('storage/media/category/'.$category->image)}} "alt="img">
                    <div class="aa-prom-content">

                      <h4><a href="#">{{$category->categories_name}}</a></h4>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach

              <!-- promo right -->




                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Promo section -->
  <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <ul class="nav nav-tabs aa-products-tab">

                 @foreach($categories as $key => $category)
                          <li class="active"><a href="#product_cate{{$key}}" data-toggle="tab">Men</a></li>

                 @endforeach

                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- Start men product category -->

                    <!-- / men product category -->
                    <!-- start women product category -->

                    <!-- / women product category -->
                    <!-- start sports product category -->

                    <!-- / sports product category -->
                    <!-- start electronic product category -->
                          @foreach($categories as $key => $category)
                    <div class="tab-pane fade in active" id="product_cate{{$key}}">
                       <ul class="aa-product-catg">
                        <!-- start single product item -->
                   @foreach($categories_product[$category->id] as $product)
                        <li>
                            <figure>
                              <a class="aa-product-img" href="{{url('product/'.$product->id)}}"><img src="{{ asset('storage/media/product/'.$product->image) }}"></a>
                              <a class="aa-add-card-btn" href="javascript:void(0)" onclick=""><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <figcaption>
                                <h4 class="aa-product-title"><a href="">{{$product->product_name}}</a></h4>
                                <span class="aa-product-price">Rs {{priceproduct($categories_product_attr[$product->id][0]->id)}}  </span><span class="aa-product-price"><del> </span>
                              </figcaption>
                            </figure>
                            <div class="aa-product-hvr-content">
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                                <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal{{$product->id}}">
                                <span class="fa fa-search"></span></a>
                              </div>
                          </li>
                    @endforeach
                  @endforeach

                      </ul>

                    </div>

                    <!-- / electronic product category -->
       <div>

                  <!-- quick view modal -->
                          @foreach($categories as $key => $category)
                               @foreach($categories_product[$category->id] as $product)
                  <div class="modal fade" id="quick-view-modal{{$product->id}}"
                   tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <div class="row">
                            <!-- Modal view slider -->
                    <img src="{{asset('storage/media/product/'.$product->image)}}" class="product-image">
                            <!-- Modal view content -->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="aa-product-view-content">
                                <h3>{{$product->product_name}}</h3>
                                product id:{{$product->id}}
                                <div class="aa-price-block">
                                  <span class="aa-product-view-price"><h1>{{ priceproduct($categories_product_attr[$product->id][0]->id)}} Rs</h1></span>
                                  <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                                <h4>Size</h4>
                                <div class="aa-prod-view-size">
                                       <div class="size">
                                 @foreach($categories_product_attr[$product->id] as $key => $value)

                                  <a href="javascript:void(0)" class="{{$value->color_name}}  size_product" id="size{{$value->size_id}}{{$product->id}}"
                                   onclick="select_size({{$value->size_id}},{{$product->id}},'{{$value->size_name}}','{{$value->color_name}}')" >{{$value->size_name}}</a>
                                 @endforeach
                                </div>
                                Color
                                <div>
                                 @foreach($categories_product_attr[$product->id] as $key => $value)

                                 <a href="javascript:void(0)" id="color{{$value->color_id}}{{$product->id}}" 
                                 onclick="select_color({{$value->color_id}},{{$product->id}},'{{$value->size_name}}','{{$value->color_name}}')" 
                                 class="{{$value->size_name}}  color-product product-{{strtolower($value->color_name)}}"></a>

                                @endforeach
                                </div>


                                <div class="aa-prod-quantity">

                                    <select name="" id="quantityId{{$product->id}}">

                                         @for($i=1; $i<10; $i++)
                                      <option value="{{$i}}">{{$i}}</option>
                                     
                                      @endfor
                                    </select>


<div id="productid">

                              @php
                              $table_name="categories";

                                     $result=fieldById($product->categories_id,$table_name);
                                  
                              @endphp
                     
                                  <p class="aa-prod-category">
                                    Category: <a href="#">{{$result[0]->categories_name}}</a>
                                  </p>
                                </div>
                                <div class="aa-prod-view-bottom">
                                  <a href="javascript:void(0)" class="aa-add-to-cart-btn"  onclick="addtocart({{$product->id}},'add_to_cart')"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                   <a href="javascript:void(0)" class="aa-add-to-cart-btn" onclick="addtocart({{$product->id}},'buy_now')"><span class="fa fa-shopping-cart"></span>Buy Now</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- / quick view modal -->


              </div>
            </div>
                @endforeach
                             @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Products section -->
  <!-- banner section -->

  <!-- popular section -->
  <!---
  <section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
        
             <ul class="nav nav-tabs aa-products-tab">
                <li class="active"><a href="#popular" data-toggle="tab">Popular</a></li>
                <li><a href="#featured" data-toggle="tab">Featured</a></li>
                <li><a href="#latest" data-toggle="tab">Latest</a></li>
              </ul>

              <div class="tab-content">
              
                <div class="tab-pane fade in active" id="popular">
                  <ul class="aa-product-catg aa-popular-slider">
               
                      <figure>
           
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                        <figcaption>
                          <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                          <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                      </figure>
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                      </div>
    
                      <span class="aa-badge aa-hot" href="#">HOT!</span>
                    </li>
     

                  </ul>

                </div>
      

    
                <div class="tab-pane fade" id="featured">
                 <ul class="aa-product-catg aa-featured-slider">
            
                    <li>
                      <figure>
                 
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                          <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                      </figure>
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                      </div>
           
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>
              

                  </ul>

                </div>
 

    
                <div class="tab-pane fade" id="latest">
                  <ul class="aa-product-catg aa-latest-slider">
           
                    <li>
                      <figure>
       
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                          <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                      </figure>
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                      </div>
    
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>
      

                  </ul>

                </div>
 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>-->
  <!-- / popular section -->
  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>FREE SHIPPING</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>30 DAYS MONEY BACK</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>SUPPORT 24/7</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Support section -->
  <!-- Testimonial -->

  <!-- / Testimonial -->

  <!-- Latest Blog -->

  <!-- / Latest Blog -->

  <!-- Client Brand -->
  <section id="aa-client-brand">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-client-brand-area">
            <ul class="aa-client-brand-slider">


@foreach($brands as $banner)

              <li><a href="#"><img src="{{asset('storage/media/brand/'.$banner->image)}}" width="70px" height="70px" alt="java img"></a></li>

@endforeach

            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Client Brand -->

  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <di class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    function addtocart(productid,actiontype){
 var quantity = $("#quantityId"+productid).val();
    $("#quantity").val(quantity);
        $("#product_id").val(productid);
        $("#actiontype").val(actiontype);
        const formData=$("#frmAddToCart").serialize();
      const ActionLink=WebsiteLink+"/add_to_cart";
        console.log(formData+"\n"+ActionLink);
          $.ajax({
              method:"POST",
              url:ActionLink,
              data:formData,
              success:function(respose,data){
          
                 
        if(actiontype=="buy_now"){
              window.location.href=WebsiteLink+"/checkout";

          }
        alert(data);
       console.log(data);




        alert(respose);
               console.log(respose);
              }
          });
  
      }

  </script>
  <form id="frmAddToCart">
             <input id="product_id" type="text" name="product_id">
    <input id="color_id" type="text" name="color_id">
     <input id="size_id" type="text" name="size_id">
          <input id="quantity" type="text" name="quantity" value="">
           <input id="actiontype" type="text" name="actiontype" value="">
    @csrf
  </form>

  @endsection

  </form>
  <!-- / Subscribe section -->

  <!-- footer -->
