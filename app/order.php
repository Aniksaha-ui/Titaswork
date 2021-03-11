<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
 
 protected $fillable = [
'order_pid',
'order_pid',
'product_original_price',
'product_selling_price',
'order_quantity',
'order_date',
'order_discount_amount',
'manager_given_commision',
    ];

}
