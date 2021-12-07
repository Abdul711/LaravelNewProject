
  <!-- / menu -->  
 
  <!-- catg header banner section -->

@extends('FrontEnd/layout')
@section("container")

  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach($cart_datas as $key => $value)
                            <tr>
                        <td><a class="remove" href="#"><fa class="fa fa-close"></fa></a></td>
                        <td><a href="#"><img src="{{asset('storage/media/product/'.$value->image)}}" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="#">{{$value->product_name}}</a></td>
                        <td>{{$value->price}}</td>
                        <td><input class="aa-cart-quantity" type="number" value="{{$value->qty}}"></td>
                        <td>{{$value->qty * $value->price}}</td>
                      </tr>
                    @endforeach
                
             
                 
         
                      </tbody>
                  </table>
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Cart Total</th>
                     <td>{{$subtotal}} Rs</td>
                   </tr>
                   <tr>
                     <th>Government Tax ({{$gst}})</th>
                     <td>{{$tax}} Rs</td>
            
                   </tr>
                   <tr>
                   <th> Discount </th>
                          <td>  {{$discount}} Rs </td></tr>
                       <tr><th> Delivery Charge</th>  <td> {{$delivery_charge}} Rs</td> </tr>
                        <tr><th> Final Amount</th>  <td> {{$final}} Rs</td> </tr>
                 </tbody>
               </table>
               <a href="#" class="aa-cart-view-btn">Proced to Checkout</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 @endsection
 <!-- / Cart view section -->


  <!-- Subscribe section -->
  