<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;
use App\Exports\BillingExport;
use Excel;
use App\order;


class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order=DB::table('orders')
                ->join('products','orders.order_pid','products.id')
                ->join('users','orders.o_user_id','users.id')
                ->select('*')
                ->get();

                


        $pdf = PDF::loadView('PDF.invoice',compact('order'));
        return $pdf->download('invoice.pdf');
        
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

    public function productinformationpdf(){

        $product=DB::table('products')
                ->join('catagories','products.c_id','catagories.id')
                ->select('products.*','catagories.c_name')
                ->orderby('products.id','asc')
                ->get();

      $pdf = PDF::loadView('PDF.productinformationpdf',compact('product'));
        return $pdf->download('ProductInformation.pdf');

    }


    public function cartInformation(){

    $subtotal=0;
    $grandtotal=0;
    $delivery_charge=0;

     $id = session()->get('id');
        $cart=DB::table('carts')
             ->join('products','carts.p_id','products.id')
             ->select('*')
             ->where('user_id',$id)
             ->get();


          


    foreach ($cart as $cart) {
        $subtotal=(($cart->price*$cart->quantity)+$subtotal)-(($cart->price*$cart->quantity*$cart->cart_discount_in_percentage)/100);
    }

        if($subtotal<5000){
                $delivery_charge=100;
        }
        else{
            $delivery_charge=0;
        }

        $grandtotal=$subtotal+$delivery_charge;


     $pdf = PDF::loadView('PDF.cartInformation',compact('cart','subtotal','grandtotal'));
        return $pdf->download('OrderRequestInformation.pdf');


    }


    public function exceldownload(){


        
        return Excel::download(new BillingExport,'order.xlsx');
     }


}
