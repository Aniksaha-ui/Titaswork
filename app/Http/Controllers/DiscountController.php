<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\dicount;
use Illuminate\support\Str;
use Image;
use DB;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function discount(){
        $product=product::all();
        return view("Discount.discountadd",compact('product'));
    }

    public function discountstore(Request $request){

        $product_details = DB::table("products")
                           ->where("id",$request->p_id)
                           ->get();

          $product_quantity = 0;
          $afterChangeQuantity = 0;
          foreach ($product_details as $product_details) {
                       $product_quantity = $product_details->p_quan;
                     echo "<br>";
                      }  

          $afterChangeQuantity = $product_quantity - $request->discounted_quantity ;

          if($request->discount_in_percentage == ""){
                $request->discount_in_percentage = 0;
            }

            if($request->discount_in_tk == ""){
                $request->discount_in_tk = 0;
            }

            if($request->discount_in_tk == "" && $request->discount_in_percentage == ""){
                echo "<script>window.alert('You must give a discount')</script>";
                exit();
            }


          if($afterChangeQuantity<0){
            echo "<script>window.alert('Stock is not avaialable')</script>";
            exit();
          }
          else if($afterChangeQuantity>=0){

               DB::table("products")
            ->where("id",$request->p_id)
            ->update([
              'p_quan' => $afterChangeQuantity
            ]); 


             dicount::insert([
            'product_id'=>$request->p_id,
            'discounted_quantity'=>$request->discounted_quantity,
            'discount_in_percentage'=>$request->discount_in_percentage,
             'discount_in_tk'=>$request->discount_in_tk
             ]);

             return back();
          }
    }

    public function discountedProduct(){

        
        
        
        $discounted_product = DB::table('dicounts')
                              ->join("products","dicounts.product_id","products.id")
                              ->where('dicounts.discounted_quantity','>',0)
                              ->select('*')
                              ->get();

                             
        

        // dd($discounted_product);
        return view("Discount.showdiscountproduct",compact('discounted_product'));
    }
}
