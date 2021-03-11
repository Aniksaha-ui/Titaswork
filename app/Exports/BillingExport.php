<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\order;
use DB;

class BillingExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {


    			$order=DB::table('orders')
    				   ->join('products','orders.order_pid','products.id')
    				   ->join('users','orders.o_user_id','users.id')
    				   ->select('*')
    				   ->get();
        	  return view('welcome2',compact('order'));
    }
}
