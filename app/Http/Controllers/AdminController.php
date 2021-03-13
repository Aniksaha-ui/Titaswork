<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use Crypt;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("AdminPages.Dashboard");
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
    public function useredit($id)
    {
            $users = DB::table('users')
                ->select('*')
                ->where('id',$id)
                ->get();
                session(['id' => $id]);

                // foreach ($users as $users) {
                //     echo Hash::make('plain-text',$users->password);
                // }

                return view('Usermanagement.Edit',['users'=>$users]);
    }


    public function useredit1(Request $request){
         $id = $request->session()->get('id');
         user::findOrFail($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role,
            'password'=>Hash::make($request->password)
             ]);
          return redirect("/userlist")->with('alert', 'Data Update successfully');


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

    public function Usermanagement(){

        $user=User::all();

        return view("Usermanagement.alluser",compact('user'));
    }



    public function profit(){

        //post request diye order_p_id and date ta niye asbi form thake , then just where clause ta chalai dibo 

        $profit=DB::table('orders')
                ->join('products','orders.order_pid','products.id')
                ->select(DB::raw("SUM(order_subtotal) -SUM(product_original_price*order_quantity) as profit"),'products.p_name')
                ->groupBy('products.p_name')
                ->get();
                
                return view("Analysis.productwiseprofit",compact('profit'));


               
    }



    public function Dashboard(){
        $newcount = 0;
        $users_total_order = 0;
        $newOrderMessage = ""; 
        $pending_message = "";
        $count = DB::table('carts')
                ->select(DB::raw("Count(active) as count"))
                ->where('active',1)
                ->get();

        $prev_count = session('prev_Count');


        
       // dd($count);

        foreach ($count as  $count) {
            $newcount = $count->count ;
            if($newcount == $prev_count){
                $newOrderMessage = "No New order";
            }
            else if($newcount > $prev_count){
             $newOrderMessage = "New order here check please" ;
            }
        }

             $total_order = DB::table('carts')
                ->select(DB::raw("Count(active) as total_order"),"user_id")
                ->groupBy('user_id')
                ->where('active',1)
                ->get();

            foreach($total_order as $total_order){
                $users_total_order = $total_order->total_order;
                if($users_total_order>0){
                     $pending_message = "Pending Order";
                }
                else if($users_total_order == 0){
                    $pending_message = "No Pending Order";
                }
            }

     
        
        session(['prev_Count' => $newcount ]);    

        return view("Homepage.HomepageForAdmin.adminDashBoard",compact('newOrderMessage','users_total_order','pending_message'));    

    }


    public function searchconfirmingorder(){

        return view('order.orderhistory.ordersearching');

    }


    public function searchconfirmingorderresult(Request $request){

        $date=$request->date;
              session(['date' => $date]);

        $searchresult=DB::table('orders')
                      ->join('products','orders.order_pid','products.id')
                      ->join('users','orders.o_user_id','users.id')
                      ->select(DB::raw("SUM(order_subtotal-((order_discount_amount*order_subtotal)/100))  as orderamount"),'name','o_user_id')
                      ->where('order_date',$date)
                      ->groupBy('name','o_user_id')
                      ->get();

                 return view('order.orderlist.groupusersmanage',compact('searchresult'));


    }


    public function ordershowdetail($id){

        $id=$id;    
        $date = session()->get('date');
        $order=DB::table('orders')
               ->join('products','orders.order_pid','products.id')
               ->join('users','orders.o_user_id','users.id')
               ->where('o_user_id',$id)
               ->where('order_date',$date)
               ->select("*")
               ->get();

   




               return view('order.orderlist.groupusersmanageresult',compact('order','order1','date'));
    }
}