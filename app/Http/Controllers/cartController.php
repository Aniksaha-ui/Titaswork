<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\cart;
use App\catagory;
use DB;
use App\User;
use App\order;
use Carbon\carbon;
use App\product;

class cartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function singlecart($id,$pageName,$discount_in_percentage,$discount_in_tk,request $request)
    {

        if($pageName == "fromsimplecart"){
             $price=0;
                $user_id=Auth::id();
                if($user_id==null){
                    return view("auth.login");
                }
         //jodi ei product age ekber add kora takhe tahole update korbe
              $cart_cheke=cart::where('p_id',$id)->where('user_id',$user_id)->where('pagefrom',"fromsimplecart")->count();

        if($cart_cheke){
                cart::where('p_id',$id)->where('user_id',Auth::id())->increment('quantity',1); 
         
                return redirect()->back()->with('success','product quantity increment successfully');           
        }

        //naile insert korbe
        else{

            $user_info= DB::table('users')->where('id', $user_id)->select('role')->pluck('role')->first();

     

            if($user_info=='Dealer'){
                
                 $product_info= DB::table('products')
                                ->where('id', $id)
                                ->select('d_price')
                                ->pluck('d_price')
                                ->first();

                    $price=$product_info;
                    }


                    if($user_info=='shopper'){
                    $product_info= DB::table('products')
                                ->where('id', $id)
                                ->select('s_price')
                                ->pluck('s_price')
                                ->first();

                    $price=$product_info;

                  
                }

                    if($user_info=='whole'){
                    $product_info= DB::table('products')
                                ->where('id', $id)
                                ->select('w_price')
                                ->pluck('w_price')
                                ->first();

                    $price=$product_info;
                 }


          $cart=cart::insert([
                'p_id'=>$id,
                'user_id'=>$user_id,
                'quantity'=> 1,
                'price'=>$price,
                'active'=>0,
                'cart_discount_in_percentage'=>0,
                'cart_discount_in_tk' => 0,
                'cart_discount_description' => "tk",
                'pagefrom' => "fromsimplecart"
        ]);

          return redirect()->back()->with('success','New Item Added successfully'); 
      
        }
    }
        else if($pageName == "fromdiscount"){
   $price=0;
                $user_id=Auth::id();
                if($user_id==null){
                    return view("auth.login");
                }
         //jodi ei product age ekber add kora takhe tahole update korbe
              $cart_cheke=cart::where('p_id',$id)->where('user_id',$user_id)->where("pagefrom","fromdiscount")->count();

        if($cart_cheke){
                cart::where('p_id',$id)->where('user_id',Auth::id())->increment('quantity',1); 
         
                return redirect()->back()->with('success','product quantity increment successfully');           
        }

        //naile insert korbe
        else{

            $user_info= DB::table('users')->where('id', $user_id)->select('role')->pluck('role')->first();

     

            if($user_info=='Dealer'){


                
                 $product_info= DB::table('products')
                                ->where('id', $id)
                                ->select('d_price')
                                ->pluck('d_price')
                                ->first();
                    
                    $price=$product_info;
                    

                    }


                    if($user_info=='shopper'){
                    $product_info= DB::table('products')
                                ->where('id', $id)
                                ->select('s_price')
                                ->pluck('s_price')
                                ->first();

                    $price=$product_info;

                  
                }

                    if($user_info=='whole'){
                    $product_info= DB::table('products')
                                ->where('id', $id)
                                ->select('w_price')
                                ->pluck('w_price')
                                ->first();

                    $price=$product_info;
                 }

                 

          $cart=cart::insert([
                'p_id'=>$id,
                'user_id'=>$user_id,
                'quantity'=> 1,
                'price'=>$price,
                'active'=>0,
                'cart_discount_in_percentage'=>$discount_in_percentage,
                'cart_discount_in_tk' => $discount_in_tk,
                'cart_discount_description' => "tk",
                'pagefrom' => "fromdiscount"
        ]);

          return redirect()->back()->with('success','New Item Added successfully'); 
      
        }
        }

      
    }



          public function deletecart($id){
                cart::findOrFail($id)->delete();
                return back();
            }



public function UpdateProductOrderStatus($cart_id){
            
               DB::table("carts")
                    ->where('id',$cart_id)
                    ->update([
                    'active'=>1
                ]);
                return back();    
               
}


public function UpdateProductOrderStatusUnconfirmed($cart_id){
     DB::table("carts")
                    ->where('id',$cart_id)
                    ->update([
                    'active'=>0
                ]);
                return back();
}


    public function viewcart($code=''){

               $catagories=catagory::all();
               $delivary_charge=0;
        $total=0;
        $dis_amount=0;
        $dis_total=0;
                 $user_id=Auth::id();
                if($user_id==null){
                    return view("auth.login");
                }


         $user_info= DB::table('users')->where('id', $user_id)->select('role')->pluck('role')->first();
               

        if($user_info=='Dealer'){

                     if($code==''){

                    $v =cart::where('user_id',Auth::id())->get();
        
            foreach ($v as $value) {
                $total += ($value->product->d_price*$value->quantity)-$value->cart_discount_in_tk-((($value->product->d_price*$value->quantity)*$value->cart_discount_in_percentage)/100) ;
        }


          if($total<5000){
                    $delivary_charge=100;
                 }
            else{
                    $delivary_charge=0;
              }



             $view=DB::table('carts')
              ->join('products','carts.p_id','products.id')
              ->where('user_id',Auth::id())
                ->select('carts.*','products.p_name','products.p_image','products.d_price')
              ->get();

              $busket=DB::table('carts')
                    ->join('products','carts.p_id','products.id')
                    ->where('user_id',Auth::id())
                    ->select('carts.*','products.p_name','products.p_image','products.d_price')
                    ->get();
            
                $total=$total+$delivary_charge;
                $dis_total=$total;
        session(['dis_amount' => $dis_amount , 'total' => $total,'discount_total' => $dis_total]);

        return view('cart.viewcartforDealer',compact('viewcart','view','v','coupon','total','dis_amount','dis_total','catagories','busket','delivary_charge'));
        }

        else{

        return view('cart.viewcartforDealer',compact('catagories'));

        }

        }





        if($user_info=='shopper'){


                     if($code==''){

                    $v =cart::where('user_id',Auth::id())->get();
        
            foreach ($v as $value) {
                $total += $value->product->s_price*$value->quantity-$value->cart_discount_in_tk-((($value->product->s_price*$value->quantity)*$value->cart_discount_in_percentage)/100);
        }



          if($total<5000){
                    $delivary_charge=100;
                 }
            else{
                    $delivary_charge=0;
              }





             $view=DB::table('carts')
              ->join('products','carts.p_id','products.id')
              ->where('user_id',Auth::id())
                ->select('carts.*','products.p_name','products.p_image','products.s_price')
              ->get();

              $busket=DB::table('carts')
                    ->join('products','carts.p_id','products.id')
                    ->where('user_id',Auth::id())
                    ->select('carts.*','products.p_name','products.p_image','products.s_price')
                    ->get();
            
                 $total=$total+$delivary_charge;
                $dis_total=$total;



        session(['dis_amount' => $dis_amount , 'total' => $total,'discount_total' => $dis_total]);

        return view('cart.viewcartforshopper',compact('viewcart','view','v','coupon','total','dis_amount','dis_total','catagories','busket','delivary_charge'));
        }

        else{

        return view('cart.viewcartforshopper',compact('catagories'));

        }



        }






        if($user_info=='whole'){


                     if($code==''){

                    $v =cart::where('user_id',Auth::id())->get();
        
            foreach ($v as $value) {
                $total += $value->product->w_price*$value->quantity-$value->cart_discount_in_tk-((($value->product->w_price*$value->quantity)*$value->cart_discount_in_percentage)/100);
                 }

                 if($total<5000){
                    $delivary_charge=100;
                 }
                 else{
                    $delivary_charge=0;
                 }



             $view=DB::table('carts')
              ->join('products','carts.p_id','products.id')
              ->where('user_id',Auth::id())
                ->select('carts.*','products.p_name','products.p_image','products.w_price')
              ->get();

              $busket=DB::table('carts')
                    ->join('products','carts.p_id','products.id')
                    ->where('user_id',Auth::id())
                    ->select('carts.*','products.p_name','products.p_image','products.w_price')
                    ->get();
            
                $total=$total+$delivary_charge;
                $dis_total=$total;
        session(['dis_amount' => $dis_amount , 'total' => $total,'discount_total' => $dis_total]);

        return view('cart.viewcartforwhole',compact('viewcart','view','v','coupon','total','dis_amount','dis_total','catagories','busket','delivary_charge'));
        }

        else{

        return view('cart.viewcartforwhole',compact('catagories'));

        }

        }

     } 




     public function viewcartforadmin(){

        return view('cart.searchcustomer');    
     }


       public function viewcartforadmin2(Request $request){

            $total=0;
            $id=$request->c_id;


            $v =cart::where('user_id',$id)->get();
               foreach ($v as $value) {
                $total += $value->price*$value->quantity;
                 }


                  if($total<5000){
                    $delivary_charge=100;
                 }
                 else{
                    $delivary_charge=0;
                 }

                 $total=$total+$delivary_charge;
                 
                // $view =cart::where('user_id',$id)->get();



             $view=DB::table('carts')
              ->join('products','carts.p_id','products.id')
              ->where('user_id',$id)
                ->select('carts.*','products.p_name','products.p_image','products.w_price')
              ->get();
               

             
                $busket=DB::table('carts')
                    ->join('products','carts.p_id','products.id')
                    ->where('user_id',$id)
                    ->select('carts.*','products.p_name','products.p_image','products.w_price')
                    ->get();
            

                  return view("cart.viewcartforadmin",compact('view','delivary_charge','total','busket','v'));

     }





      public function updatecart(Request $request)
  {
        foreach ($request->id as $key => $value) {
               cart::findOrFail($value)->update([
                
                    'quantity' => $request->quantity[$key]
                ]);

               }
               return back();  
}



      public function request()
  {

        $id=Auth::id();

        $cart=cart::where('user_id',$id)->get();
        cart::where('user_id',$id)->update([
            'active'=>1
             ]);   

        return back();          



}



  public function viewcartforadminnew($id='',$dis=''){

           $catagories=catagory::all();
               $delivary_charge=0;
        $total=0;
        $dis_amount=0;
        $dis_total=0;
        $user_id=Auth::id();
        $users = User::all();
        
        if($user_id==null){
          return view("auth.login");
        }




                     if($id=='' && $dis==''){

                    $v =cart::where('user_id',Auth::id())->get();
        
            foreach ($v as $value) {
                $total = $total + $value->price ;
                 }

                 if($total<5000){
                    $delivary_charge=100;
                 }
                 else{
                    $delivary_charge=0;
                 }



             $view=DB::table('carts')
              ->join('products','carts.p_id','products.id')
              ->where('user_id',Auth::id())
                ->select('carts.*','products.p_name','products.p_image','products.w_price')
              ->get();

              $busket=DB::table('carts')
                    ->join('products','carts.p_id','products.id')
                    ->where('user_id',Auth::id())
                    ->select('carts.*','products.p_name','products.p_image','products.w_price')
                    ->get();
            
                $total=$total+$delivary_charge;
                $dis_total=$total;
        session(['dis_amount' => $dis_amount , 'total' => $total,'discount_total' => $dis_total]);

        return view('cart.viewcartforadminnew',compact('viewcart','view','v','coupon','total','dis_amount','dis_total','catagories','busket','delivary_charge','users'));
        }




        elseif($id!='' && $dis==''){
                session(['id' => $id]);   //new insert in cart

                $v =cart::where('user_id',$id)->get();

                    foreach ($v as $value) {
                $total = $total + $value->price*$value->quantity - $value->cart_discount_in_tk - ((($value->price*$value->quantity)*$value->cart_discount_in_percentage)/100);
                 }

                  if($total<5000){
                    $delivary_charge=100;
                 }
                 else{
                    $delivary_charge=0;
                 }


                    $view=DB::table('carts')
              ->join('products','carts.p_id','products.id')
              ->where('user_id',$id)
                ->select('carts.*','products.p_name','products.p_image','carts.price')
              ->get();

              $busket=DB::table('carts')
                    ->join('products','carts.p_id','products.id')
                    ->where('user_id',$id)
                    ->select('carts.*','products.p_name','products.p_image','carts.price')
                    ->get();



             $total=$total+$delivary_charge;
                $dis_total=$total;


                session(['dis_amount' => $dis_amount , 'total' => $total,'discount_total' => $dis_total,'id'=>$id,'delivary_charge'=>$delivary_charge]);

                
        return view('cart.viewcartforadminnew',compact('viewcart','view','v','coupon','total','dis_amount','dis_total','catagories','busket','delivary_charge','users'));


        // return view('cart.viewcartforwhole',compact('catagories'));

        }


        elseif($dis!=''){


                

                 $id=session('id');

                  $v =cart::where('user_id',$id)->get();

     foreach ($v as $value) {
                $total += $value->price*$value->quantity - $value->cart_discount_in_tk - ((($value->price*$value->quantity)*$value->cart_discount_in_percentage)/100);
                
                 }

                  if($total<5000){
                    $delivary_charge=100;
                 }
                 else{
                    $delivary_charge=0;
                 }


                 $dis_amount=(($total*$dis)/100);
                 $total=$total-$dis_amount;
                 $total = $total+$delivary_charge;

                  $view=DB::table('carts')
              ->join('products','carts.p_id','products.id')
              ->where('user_id',$id)
                ->select('carts.*','products.p_name','products.p_image','carts.price')
              ->get();

              $busket=DB::table('carts')
                    ->join('products','carts.p_id','products.id')
                    ->where('user_id',$id)
                    ->select('carts.*','products.p_name','products.p_image','carts.price')
                    ->get();





                session(['dis_amount' => $dis_amount , 'total' => $total,'discount_total' => $dis_total,'id'=>$id,'delivary_charge'=>$delivary_charge,'discount_percentage'=>$dis]);

                
        return view('cart.viewcartforadminnew',compact('viewcart','view','v','coupon','total','dis_amount','dis_total','catagories','busket','delivary_charge','users'));

                

        }
        
    }



    public function payment(){
  
    //from session find the user id 
    $id=session('id');
    $discount_amount = session('discount_percentage');

    if($discount_amount==null){
        $discount_amount=0;
    }

    //find the user's product request from cart
    $UsersOrderFind = DB::table('carts')
                     ->join('products','carts.P_id','products.id')
                     ->join('users','carts.user_id','users.id')
                     ->where('carts.user_id',$id)
                     ->select('*')
                     ->get();



     foreach ($UsersOrderFind as $UsersOrderFind) {
               
              $subtotal = ($UsersOrderFind->price * $UsersOrderFind->quantity) - $UsersOrderFind->cart_discount_in_tk - ((($UsersOrderFind->price*$UsersOrderFind->quantity)*$UsersOrderFind->cart_discount_in_percentage)/100);


           

                // $product_info = DB::table("products")
                if($UsersOrderFind->pagefrom=="fromsimplecart"){
                $product_information = DB::table('products')
                                      ->select('*')
                                      ->where('id',$UsersOrderFind->p_id)
                                      ->get();
                foreach($product_information as $product_information){
                  if($product_information->p_quan>=$UsersOrderFind->quantity){
                    echo "if the product info is right";
                    echo "<br>";
                    echo $product_information->id;
                    echo "<br>";
                    echo $product_information->p_quan;
                    echo "<br>";
                    echo $UsersOrderFind->quantity;
                    echo "<br>";

                product::findOrfail($UsersOrderFind->p_id)->decrement('p_quan',$UsersOrderFind->quantity);
                     order::insert([
                'order_pid'=> $UsersOrderFind->p_id,
                'product_original_price'=> $UsersOrderFind->p_price,
                'product_selling_price'=> $UsersOrderFind->price,
                'order_quantity'=> $UsersOrderFind->quantity,
                'order_date'=>date('Y-m-d'),
                'order_discount_amount'=> $discount_amount,
                'o_user_id' =>$id,
                'order_subtotal'=> $subtotal,
                'order_carts_discount_in_tk'=>$UsersOrderFind->cart_discount_in_tk,
                'order_carts_discount_in_percentage'=>$UsersOrderFind->cart_discount_in_percentage,
                'manager_given_commision'=>0
                    ]);

    #delete from cart where order place

                $deleteFromCart = DB::table('carts')
                                  ->where('carts.user_id',$id)
                                  ->delete();
               
                                  
                  }
                  else if($product_information->p_quan<=0 || $product_information->p_quan < $UsersOrderFind->quantity){
                    echo "<script>window.alert('Product is not available')</script>";
                    exit();
                  }
                }
                }

                else if($UsersOrderFind->pagefrom == "fromdiscount"){

                
                   
                    $product_information = DB::table('dicounts')
                                      ->select('*')
                                      ->where('product_id',$UsersOrderFind->p_id)
                                      ->get();


                   foreach($product_information as $product_information){
                    $discounted_product_quantity = $product_information->discounted_quantity - $UsersOrderFind->quantity;

                  if($product_information->discounted_quantity>=$UsersOrderFind->quantity){

                       DB::table('dicounts')
                       ->where('product_id',$UsersOrderFind->p_id)
                       ->update([
                         'discounted_quantity'=>$discounted_product_quantity
                        ]);

                 order::insert([
                'order_pid'=> $UsersOrderFind->p_id,
                'product_original_price'=> $UsersOrderFind->p_price,
                'product_selling_price'=> $UsersOrderFind->price,
                'order_quantity'=> $UsersOrderFind->quantity,
                'order_date'=>date('Y-m-d'),
                'order_discount_amount'=> $discount_amount,
                'o_user_id' =>$id,
                'order_subtotal'=> $subtotal,
                'order_carts_discount_in_tk'=>$UsersOrderFind->cart_discount_in_tk,
                'order_carts_discount_in_percentage'=>$UsersOrderFind->cart_discount_in_percentage,
                'manager_given_commision'=>0
                    ]);

    #delete from cart where order place

                $deleteFromCart = DB::table('carts')
                                  ->where('carts.user_id',$id)
                                  ->delete();
                                
                  }
                  else if($product_information->discounted_quantity<0 || $product_information->discounted_quantity < $UsersOrderFind->quantity){
                    echo "<script>window.alert('Product is not available')</script>";
                    exit();
                  }
                }                     

                   // dd($product_information);                   
                }
                

           }      

    // echo "<pre>";
    // print_r($UsersOrderFind);  
  return back();
          

    }




    public function prnpriview(){




    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}