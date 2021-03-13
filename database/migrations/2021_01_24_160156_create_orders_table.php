<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            $table->bigInteger('order_pid')->unsigned();
            $table->foreign('order_pid')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->Integer('product_original_price');
            $table->Integer('product_selling_price');
            $table->Integer('order_quantity');
            $table->string('order_date');
            $table->Integer('order_discount_amount');
            $table->bigInteger('o_user_id')->unsigned();
            $table->Integer("order_subtotal");
            $table->foreign('o_user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->Integer('order_carts_discount_in_tk');
            $table->Integer('order_carts_discount_in_percentage');
            $table->Integer('manager_given_commision');
            $table->string('shipping_method')->Default('Patho');
            $table->string('del_status')->Default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}