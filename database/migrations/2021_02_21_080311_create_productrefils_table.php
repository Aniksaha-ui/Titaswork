<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductrefilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productrefils', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('p_id')->unsigned();
            $table->foreign('p_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->Integer('quantity');
            $table->Integer('price');
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
        Schema::dropIfExists('productrefils');
    }
}
