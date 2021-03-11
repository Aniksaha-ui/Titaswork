<?php

namespace App\Http\Controllers;
use App\user;
use DB;
use Illuminate\Http\Request;
use App\order;
use App\givencommision;

class commisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $manager=user::where("role","manager")->get();
       
        return view("Commision.allmanager",compact('manager'));
    }



    // manager commision page

    public function showdetails($id){
            $totalorder=0;
        $order=DB::table('orders')
                ->join('users','orders.o_user_id','users.id')
                ->where('created_by',$id)
                ->where('manager_given_commision',0)
                ->select('*')
                ->get();
        $user_id=$id;
          session(['user_id' => $user_id]);


             foreach ($order as $order) {
          
                 $totalorder=($order->product_selling_price*$order->order_quantity)+$totalorder;

             }

              return view("Commision.givencommision",compact('totalorder'));
    }

//Update the order table and add record to the givencommision table

    public function commisionadd(Request $request){
        $id=session('user_id');
                $order=DB::table('orders')
                ->join('users','orders.o_user_id','users.id')
                ->where('created_by',$id)
                ->where('manager_given_commision',0)
                ->select('*')
                ->get();


        givencommision::insert([
         'user_id'=>$id,
        'totalcost'=>$request->totalorder,
        'givencommision'=>$request->commision,
        'commisionamount'=>$request->commisionamount,
             ]);



             foreach ($order as $order) {
                 $id=$order->order_id;
              DB::table("orders")
                    ->where('order_id',$id)
                    ->update([
                    'manager_given_commision'=>1
                ]);
             }
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
