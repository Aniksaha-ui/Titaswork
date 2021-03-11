<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("UserPages.UserDashboard");
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




    public function catagoriesshow(){

        $catagory=DB::table('catagories')
                 ->select('*')
                 ->get();

        return view("UserPages.catagorywiseproductshow",compact('catagory'));
    }


    public function showcatagoryresult($id){
             $product=DB::table('catagories')
            ->join('products', 'catagories.id', '=', 'products.c_id')
            ->where('products.c_id',$id)
            ->where('products.p_quan','>',0)
            ->select('products.*','catagories.c_name')
            ->get();

    
            
            return view('product.manageuser',compact('product'));

    }


    public function userdetails(){
                    $id=Auth::id();


                 $user=DB::table("users")
                       ->join("userdetails","users.id","userdetails.u_id")
                       ->select("*")
                       ->where("users.id",$id)
                       ->get();

                return view("UserPages.profileshow",compact('user'));


    }


    public function profilechange($id){

                $id=$id;
                session(['id' => $id]);
                 $user=DB::table("users")
                       ->join("userdetails","users.id","userdetails.u_id")
                       ->select("*")
                       ->where("users.id",$id)
                       ->get();


                return view("UserPages.profileedit",compact('user'));


            }


    public function profileedit(Request $request){

                $id = $request->session()->get('id');
                DB::table("users")
                ->where("id",$id)
                ->update([
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'password'=>Hash::make($request->password),
                ]);

                DB::table("userdetails")
                ->where("u_id",$id)
                ->update([
                        'phone'=>$request->phone,
                        'address'=>$request->address,
                        'city'=>$request->city,
                ]);


                return redirect("/userDetails");
    }

}
