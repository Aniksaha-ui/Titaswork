<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;

class Billing implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
     public function view(): View
    {
    	
    }
}
