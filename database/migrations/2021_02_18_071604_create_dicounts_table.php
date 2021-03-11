<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDicountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dicounts', function (Blueprint $table) {
            $table->bigIncrements('id');
               $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->Integer('discount_in_percentage')->default(0);
            $table->Integer('discount_in_tk')->default(0);
            $table->Integer('discounted_quantity');
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
        Schema::dropIfExists('dicounts');
    }
}
