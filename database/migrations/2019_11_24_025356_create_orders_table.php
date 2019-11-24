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
            $table->bigIncrements('id');
            $table->BigInteger('user_id');
            $table->String('email');
            $table->String('phone');
            $table->String('name');
            $table->String('contact');
            $table->text('primary_address');
            $table->text('secondary_address');
            $table->String('payment_method');
            $table->tinyInteger('payment_status');
            $table->tinyInteger('order_status');
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