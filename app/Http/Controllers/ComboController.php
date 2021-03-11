<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\combo;
use Illuminate\support\Str;
use Image;

class ComboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('combopackage.addcombo');
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
                   if($request->hasFile('image')){
        $get_image = $request->file('image');
        $image = time().Str::random(10).'.'.$get_image->getClientOriginalExtension();
        Image::make($get_image)->resize(500,300)->save(public_path('image/product/'.$image));
    }

     else{
            $image = "default.png";
        }

        combo::insert([
            'title'=>$request->title,
            'image'=>'image/product/'.$image,
         
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


    public function managecombo(){

        $combo=combo::all();

        return view('combopackage.combomanage',compact('combo'));
    }


    public function delete($id){
         combo::findOrFail($id)->delete();
         return back();
    }
}
