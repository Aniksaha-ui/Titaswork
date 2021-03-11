<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\order;
class OrderController extends Controller
{
    //
    public function ShowUserOrderDetails(){
    	$ShowAllOrderDetails = DB::table('carts')
    						   ->join('users','carts.user_id','users.id')
    						   ->select(DB::raw("SUM((quantity*price)-cart_discount_in_tk-(((quantity*price)*cart_discount_in_percentage))/100) as total_cost"),"users.name","carts.user_id")
    						   ->groupBy("users.name","carts.user_id")
    						   ->where('active',1)
    						   ->get();

    	// dd($ShowAllOrderDetails);
        return view('order.allorderrequest',compact('ShowAllOrderDetails'));
        				   
    }

     public function searchOrder(){
        $users = User::all();
        return view("order.InvoiceforAdmin.searchInvoice",compact('users'));
    }


        public function searchOrderResult(Request $request){
         $searchDate = $request->date;
         $searchUserId = $request->user_id;
        $order_grandtotal = 0;
        $delivary_charge = 0;


        $searchBill = DB::table("orders")
                      ->join("users","orders.o_user_id","users.id")
                      ->join("products","orders.order_pid","products.id")
                      ->where("orders.o_user_id",$searchUserId)
                      ->where("order_date",$searchDate)
                      ->select('*')
                      ->get();


         $searchBill2 =  DB::table("orders")
                      ->join("users","orders.o_user_id","users.id")
                      ->join("products","orders.order_pid","products.id")
                      ->where("orders.o_user_id",$searchUserId)
                      ->where("order_date",$searchDate)
                      ->select('*')
                      ->limit(1)
                      ->get();            
        // dd($searchBill2);  
        

        $grandtotal = DB::table("orders")
                      ->select(DB::raw("SUM(order_subtotal) as grandtotal"))
                      ->where("order_date",$searchDate)
                      ->where("o_user_id",$searchUserId)
                      ->where("order_discount_amount",0)
                      ->get();             



        foreach ($grandtotal as $grandtotal) {
            $order_grandtotal = $grandtotal->grandtotal;
        }

        $order_discounted_product_subtotal = DB::table("orders")
                      ->select(DB::raw("SUM(order_subtotal) as grandtotal"))
                      ->where("order_date",$searchDate)
                      ->where("o_user_id",$searchUserId)
                      ->where("order_discount_amount",">",0)
                      ->get();  

  
      $order_discounted_product_amount = DB::table("orders")
                      ->select("order_discount_amount")
                      ->where("order_date",$searchDate)
                      ->where("o_user_id",$searchUserId)
                      ->where("order_discount_amount",">",0)
                      ->get();  


      $discounted_products1 = DB::table('orders')
                              ->select('*')
                              ->where('order_discount_amount','>',0)
                              ->where("order_date",$searchDate)
                      ->where("o_user_id",$searchUserId)
                              ->join('products','orders.order_pid','products.id')
                              ->get();


      $discounted_products2 = DB::table('orders')
                              ->join('products','orders.order_pid','products.id')
                              ->where("order_date",$searchDate)
                      ->where("o_user_id",$searchUserId)
                              ->where('order_carts_discount_in_tk','>',0)
                              ->select('*')
                              ->get();

                              // dd($discounted_products2);

                              // dd($discounted_products2);

      $discounted_products3 = DB::table('orders')
                              ->join('products','orders.order_pid','products.id')
                              ->where("order_date",$searchDate)
                      ->where("o_user_id",$searchUserId)
                              ->select('*')
                              ->where('order_carts_discount_in_percentage',">",0)
                              ->get();

                              // dd($discounted_products3);

        $order_discounted_amount_grandtotal =0;            

        foreach ($order_discounted_product_subtotal as $order_discounted_product_subtotal) {
          $order_discounted_amount_grandtotal = $order_discounted_product_subtotal->grandtotal;
        }

        $discount_amount = 0;

        foreach($order_discounted_product_amount as $order_discounted_product_amount){
           $discount_amount = $order_discounted_product_amount->order_discount_amount;       
        }

        $order_discounted_amount_grandtotal = $order_discounted_amount_grandtotal - (($order_discounted_amount_grandtotal*$discount_amount)/100);

        $order_grandtotal = $order_grandtotal + $order_discounted_amount_grandtotal;


        // dd($order_grandtotal);
       
       if($order_grandtotal<5000){
        $delivary_charge = 100;
        $order_grandtotal = $order_grandtotal + $delivary_charge;
       }
       else{
        $delivary_charge = 0;
         $order_grandtotal = $order_grandtotal;
       }


        return view("order.Invoice.invoice",compact('searchBill','searchBill2','grandtotal','order_grandtotal','delivary_charge','discounted_products1','discounted_products2','discounted_products3'));          

    }


    public function manageOrder(){

      $allorders = DB::table("orders")
                   ->join("products","products.id","orders.order_pid")
                   ->select("*")
                   ->get();

      // echo "<pre>";
      // print_r($allorders);

      return view("order.Orderlist.manageorders",compact('allorders'));
    }

    public function deleteOrder($id){

      //retrive the order details for product id
      $orderDetails = DB::table("orders")
                      ->select("*")
                      ->where("order_id",$id)
                      ->get();

       $product_id = -1;
       $order_quantity = -1;             

       foreach ($orderDetails as  $orderDetails) {
                $product_id = $orderDetails->order_pid;
                $order_quantity = $orderDetails->order_quantity;
                      }

        //get the product details from passing the product_id, for updating product quantity in the product table
        
        $singleProductInformation = DB::table("products") 
                                    ->select("*")
                                    ->where("id",$product_id)
                                    ->get();
        //get the product quantity

          $product_quantity = -1 ;

          foreach($singleProductInformation as $singleProductInformation){
             $product_quantity = $singleProductInformation->p_quan;
          }                         

          //adding the order quantity with the product quantity for final quantity
          $product_quantity = $product_quantity + $order_quantity ;

            DB::table("products")
                    ->where('id',$product_id)
                    ->update([
                    'p_quan'=>$product_quantity
                ]);

          //Delete from orders table

          DB::table("orders")
          ->where("order_id",$id)
          ->Delete();
    return back();      
    }

    public function updateOrder($id){
      $singleOrderData = DB::table("orders")
                         ->join("products","products.id","orders.order_pid")
                         ->select("*")
                         ->where("order_id",$id)
                         ->get();
      // echo "<pre>";
      // print_r($singleOrderData);
       return view("order.updateorder.updateorder",compact("singleOrderData"));                  
    }

    public function updateYourOrder(Request $request){
       // echo $request->p_name;
      // dd($request->order_id);
        

         $product_details = DB::table("products")
                            ->where("id",$request->order_pid)
                            ->get();

          $product_quantity = 0;
          $afterChangeQuantity = 0;
          foreach ($product_details as $product_details) {
                       $product_quantity = $product_details->p_quan;
                     echo "<br>";
                      }  

          $afterChangeQuantity = $product_quantity + $request->order_quantity1 - $request->quantity;


          if($afterChangeQuantity<0){
            echo "<script>window.alert('Stock is not avaialable')</script>";
            exit();
          }
          else if($afterChangeQuantity>=0){
              DB::table("products")
            ->where("id",$request->order_pid)
            ->update([
              'p_quan' => $afterChangeQuantity
            ]);  


           $findOrderDiscountAmount = DB::table('orders')
                                     ->where('order_id',$request->order_id)
                                     ->select('*')
                                     ->get();

          $order_discount_amount_in_tk = 0;
          $order_discount_amount_in_percentage = 0;
           foreach($findOrderDiscountAmount as $findOrderDiscountAmount){
            $order_discount_amount_in_percentage = $findOrderDiscountAmount->order_carts_discount_in_percentage;
            $order_discount_amount_in_tk = $findOrderDiscountAmount->order_carts_discount_in_tk;
           }




            DB::table("orders")
                    ->where('order_id',$request->order_id)
                    ->update([
                    'product_selling_price'=>$request->p_price,
                    'order_quantity' => $request->quantity,
                    'order_subtotal' => ($request->p_price*$request->quantity) - ((($request->p_price*$request->quantity)*$order_discount_amount_in_percentage)/100) -$order_discount_amount_in_tk ,
                    'order_date' => $request->order_date
                ]);

            return back();
          }

                       
    }


    public function orderhistory(){

      $orderHistory=DB::table('orders')
                    ->join('products','orders.order_pid','products.id')
                    ->where('orders.o_user_id',Auth::id())
                    ->select('*')
                    ->get();
                    return view("order.orderhistory.orderhistory",compact('orderHistory'));
    }

}
