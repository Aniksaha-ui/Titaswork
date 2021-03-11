@extends('AdminPages.Dashboard')





@section('form')

  <div style="background-color:blue;padding:20px; margin-right: 400px; margin-left: 400px;">


        <select name="coupon" class="form-control" style="width:220px" id="coupon">
                    <option value="">--- Select Country ---</option>
                    @foreach ($users as $users)
                    <option value="{{ $users->id }}">{{ $users->name}}</option>
                    @endforeach
                </select>
                      
                <br>      
              
                  <button> 
              <a class="couponbtn" style="cursor: pointer; align-items: right; margin :20px"; >Search</a>                      
                   </button>
                       <!--  <input id="coupon" placeholder="Enter customer ID" class="form-control" type="text" value="{{$code ?? ''}}" name="coupon"> -->
                </div>


<form action="{{route('updatecart')}}"" method="post">
@csrf


<div class="table-responsive bs-example widget-shadow" style="padding-right:7px;padding-left:7px; padding-bottom: 100px; padding-top: 30px; background-color: #659DBD">

      <h3 style="text-align: center;margin-right: 450px;margin-left:450px;background-color: red;padding-top: 20px;padding-bottom: 20px;">Order List</h3>

   
        
        <br>
       <table class="table table-bordered" id="datatable" style="background-color: white; ">
          <thead>
            <tr>
           
              <th>Product</th>
               <th>Product Name</th>
              <th>quantity</th>
              <th>p_price</th>
              <th>Discount (In percentage)</th>
              <th>Discount (In tk)</th>
              <th>Subtotal</th>
              <th>Action</th>
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

                        <td class="invert" style="padding-top: 22px;padding-bottom: 10px; font-family: sans-serif;" id="amount{{$view->id}}">{{$view->price}}</td>
                        <td class="invert" style="padding-top: 22px;padding-bottom: 10px; font-family: sans-serif;" id="discountinpercentage{{$view->id}}">{{$view->cart_discount_in_percentage}}</td>
                        <td class="invert" style="padding-top: 22px;padding-bottom: 10px; font-family: sans-serif;" id="discountintk{{$view->id}}">{{$view->cart_discount_in_tk}}</td>
                        <td class="invert" style="padding-top: 22px;padding-bottom: 10px; font-family: sans-serif;" id="subtotal{{$view->id}}">{{($view->price*$view->quantity)-$view->cart_discount_in_tk-((($view->price*$view->quantity)*$view->cart_discount_in_percentage)/100)}}</td>

                        <td class="invert-closeb">
                                  <a href="{{url('/delete/cart/')}}/{{$view->id}}" class="btn btn-danger">
                            <span class="glyphicon glyphicon-trash">Delete</span>
                          
                        </td>
 
                    </tr>
          @endforeach
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="invert" style="padding-top: 15px;padding-bottom: 10px;">Discount</td>
                      <td><input id="discount" placeholder="Discount" class="form-control" type="text" value="{{$dis ?? ''}}" name="discount"></td>
                      <td style="background-color: red; padding-top: 15px;padding-bottom: 10px; margin-left: 30px;margin-right: 30px;"><a class="couponbtn2" style="cursor: pointer; align-items: right;padding: 30px;">OK</a>
</td>



                    </tr>

                    <tr><td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a href="{{url("/cartInformation/download")}}">PDF</a></td>
                        <td class="invert-closeb" style="padding-top: 15px;padding-bottom: 10px; font-family: sans-serif;">Subtotal</td>
                        <td class="invert" style="padding-top: 15px;padding-bottom: 15px;">{{$total}}</td>
                        <td>  <button class="buttonfor" style="padding-top: 10px;padding-bottom: 10px; font-family: sans-serif; background-color: blue;"  type="submit"><span aria-hidden="true"></span>Update cart</button></td>

                    </tr>



        </tbody></table>


  <div class="checkout-left" style="text-align: center;"> 
     
        <div class="checkout-right-basket"style="background-color: yellow; text-align: center">
          <h4 style="text-align: center;">Order Vouchar</h4>
          <ul>
             @foreach($busket as $busket)
            <li style="text-align: center;">{{$busket->p_name}}<i>-</i> <span>${{$busket->price}}*{{$busket->quantity}}</span></li>
          @endforeach
          <li>Delivery Charge<i>-</i> <span>${{$delivary_charge}}</span></li>
             <li>Total <i>-</i> <span>${{$total}}</span></li>
   
             
          </ul>
        </div>
        


        
         <div class="checkout-right-basket" style="background-color: blue; text-align: center;">
                  <a href="{{url("/AdminGiveOrder")}}"><h3 style="font-family: Arial Black; font-weight: 29px;">Confirm Order</h3></a>
          </div>
    
                  
          </div>


      </div>
    
      
        <div class="clearfix"> </div>
        

    </form>
@section('footer_js')
<script>
    jQuery(document).ready(function(){
        @foreach($v as $cart)
        jQuery('#quantity{{$cart->id}}').change(function(){
            var quantity{{$cart->id}}=jQuery('#quantity{{$cart->id}}').val();
            var amount{{$cart->id}}=jQuery('#amount{{$cart->id}}').html();
            var discountinpercentage{{$view->id}} = jQuery('#discountinpercentage{{$view->id}}').html();
            var discountinpercentage{{$view->id}} = (((quantity{{$cart->id}}*amount{{$cart->id}})*discountinpercentage{{$view->id}})/100)
            var discountintk{{$view->id}} = jQuery('#discountintk{{$view->id}}').html();
            jQuery('#subtotal{{$cart->id}}').html((quantity{{$cart->id}}*amount{{$cart->id}})-discountinpercentage{{$view->id}} - discountintk{{$view->id}} );

        })
        @endforeach

        jQuery('.couponbtn').click(function(){
          var id=  jQuery('#coupon').val();

          window.location.href="{{url('/viewcartforadminnew')}}/"+id;
        })


         jQuery('.couponbtn2').click(function(){
          var dis=  jQuery('#discount').val();
        window.location.href="{{url('/viewcartforadminnew/{id}')}}/"+dis;
        })
   
    })
</script>
@endsection



@endsection