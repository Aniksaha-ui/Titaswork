@extends('UserPages.UserDashboard')

@section('form')

<form action="{{route('updatecart')}}"" method="post">
@csrf
<div class="table-responsive bs-example widget-shadow"  style="background-color: #659DBD" >
      <h3 style="text-align: center;margin-right: 450px;margin-left:450px;background-color: red;padding-top: 20px;padding-bottom: 20px;">Order List</h3>
   
        
        <br>
       <table class="table table-bordered" id="datatable" style="background-color: white; ">
          <thead>
            <tr>
           
                <th>Product</th>
               <th>Product Name</th>
              <th>quantity</th>
              <th>p_price</th>
              <th>Discount(In percentage)</th>
              <th>Discount(In tk)</th>
              <th>Order Status</th>
              <th>Subtotal</th>
              <th colspan="3" style="text-align: center;">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($view as $view)
                  <tr class="rem1">
                        <input type="hidden" name="id[{{$view->id}}]" value="{{$view->id}}">
                        <td class="invert-image"><a href=""><img style="width: 90px; height: 60px; border-radius: 60%" src="{{url($view->p_image)}}" alt=" " class="img-responsive" /></a></td>

                        <td class="invert" style="padding-top: 22px;padding-bottom: 10px; font-family: sans-serif;"" >{{$view->p_name}}</td>
                        <td class="invert" style="padding-top: 22px;padding-bottom: 10px; font-family: sans-serif;">
                             <div class="quantity"> 
                                <div class="quantity-select">                           
                                    
                                   <div class="product-quantity"><input type="number" id="quantity{{$view->id}}" min="1" name="quantity[{{$view->id}}]" value="{{$view->quantity}}" ></div>
                                    
                                </div>
                            </div>
                        </td>

                        <td class="invert" style="padding-top: 22px;padding-bottom: 10px; font-family: sans-serif;" id="amount{{$view->id}}">{{$view->w_price}}</td>
                        <td class="invert" style="padding-top: 22px;padding-bottom: 10px; font-family: sans-serif;" id="discountinpercentage{{$view->id}}">{{$view->cart_discount_in_percentage}}</td>
                        <td class="invert" style="padding-top: 22px;padding-bottom: 10px; font-family: sans-serif;" id="discountintk{{$view->id}}">{{$view->cart_discount_in_tk}}</td>
                         <td class="invert" style="padding-top: 22px;padding-bottom: 10px; font-family: sans-serif;">{{$view->active}}</td>
                        <td class="invert" style="padding-top: 22px;padding-bottom: 10px; font-family: sans-serif;" id="subtotal{{$view->id}}">{{($view->w_price*$view->quantity)-$view->cart_discount_in_tk-((($view->w_price*$view->quantity)*$view->cart_discount_in_percentage)/100)
                        }}</td>
                        <td class="invert-closeb">
                                  <a href="{{url('/delete/cart/')}}/{{$view->id}}" class="btn btn-danger">
                            <span class="glyphicon glyphicon-trash">Delete</span>
                          
                        </td>

                            <td style="background-color: ">
                                  <a href="{{url('/confirm/product-order/')}}/{{$view->id}}" class="btn btn-success">
                            <span class="glyphicon glyphicon-trash">Confirm order</span>
                          
                        </td>


                            <td style="background-color: ">
                                  <a href="{{url('/unconfirm/product-order/')}}/{{$view->id}}" class="btn btn-success">
                            <span class="glyphicon glyphicon-trash">Unconfirmed order</span>
                          
                        </td>
 
                    </tr>
          @endforeach

        
                    <tr><td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="invert-closeb" style="padding-top: 15px;padding-bottom: 10px; font-family: sans-serif;">Subtotal</td>
                        <td class="invert" style="padding-top: 15px;padding-bottom: 15px;">{{$total}}</td>
                        <td colspan="3">  <button class="buttonfor" style="padding-top: 10px;padding-bottom: 10px; font-family: sans-serif; background-color: blue;"  type="submit"><span aria-hidden="true"></span>Update cart</button></td>

                    </tr>

        </tbody></table>


      <div class="checkout-left" style="text-align: center;" > 
     
        <div class="checkout-right-basket" style=" background-color: yellow; text-align: center;">
          <h4 style="text-align: center;">Order Vouchar</h4>
          <ul>
          @foreach($busket as $busket)
            <li style="text-align: center;">{{$busket->p_name}}<i>-</i> <span>${{$busket->w_price}} </span></li>
          @endforeach
          <li style="text-align: center;">Delivery Charge<i>-</i> <span>${{$delivary_charge}}</span></li>
             <li style="text-align: center;">Total <i>-</i> <span>${{$total}}</span></li>
         <!--     <li>discount_total<i>-</i> <span>${{$dis_total}}</span></li> -->
             
          </ul>
        </div>
         <div class="checkout-right-basket" style="background-color: blue; ">
                  <a href="{{url("/request")}}"><h3 style="font-family: Arial Black; font-weight: 29px; text-align: center;">Confirm Order</h3></a>
          </div>
    
                  
          </div>

      </div>

      
     
        
      </div>

    </div>

    </form>
@section('footer_js')
<script>
    jQuery(document).ready(function(){
        @foreach($v as $cart)
        jQuery('#quantity{{$cart->id}}').change(function(){
            var quantity{{$cart->id}}=jQuery('#quantity{{$cart->id}}').val();
            var amount{{$cart->id}}=jQuery('#amount{{$cart->id}}').html();
           var discountintk{{$view->id}} = jQuery('#discountintk{{$cart->id}}').html();
            var discountinpercentage{{$view->id}} = jQuery('#discountinpercentage{{$cart->id}}').html();
            var discountinpercentage{{$view->id}} = (((quantity{{$cart->id}}*amount{{$cart->id}})*discountinpercentage{{$view->id}})/100)
          jQuery('#subtotal{{$cart->id}}').html((quantity{{$cart->id}}*amount{{$cart->id}})-discountinpercentage{{$view->id}} - discountintk{{$view->id}} ); 
            // jQuery('#subtotal{{$cart->id}}').html(quantity{{$cart->id}}*amount{{$cart->id}});
        })
        @endforeach
        jQuery('.couponbtn').click(function(){
          var coupon_code=  jQuery('#coupon').val();
          window.location.href="{{url('/viewcart')}}/"+coupon_code;
        })
   
    })
</script>
@endsection



@endsection