<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\product;
use App\productrefil;

class productRefilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                 $product=DB::table('products')->pluck("p_name","id");

        return view("productRefil.refil",compact('product'));
    }







    //     public function getsub($id){
    //      $p_price=DB::table("products")->where('id',$id)->pluck("p_price","id");
    //          return json_encode($p_price);
    // }


 

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

        $id=$request->product;
        $quantity=0;
        $update_quantity=$request->quantity;
        $current_quantity=DB::table('products')->where('id',$id)->select('p_quan')->pluck('p_quan')->first();
        $quantity=$update_quantity+$current_quantity;

        $price=$request->price;

        if($price==null){
            $product_price=DB::table('products')
                            ->where('id',$id)
                            ->select('p_price')
                            ->pluck('p_price')
                            ->first();

        $price=$product_price;
      
        }

        else{
            $price=$price;
        }

              product::findOrFail($id)->update([
            'p_price'=>$price,
            'p_quan'=>$quantity,
             ]);


            productrefil::insert([
                'p_id'=>$request->product,
                'quantity'=>$request->quantity,
                'price'=>$price,

            ]);



              return back();
        
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
