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
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->String('email');
            $table->String('phone');
            $table->String('name');
            $table->text('shipping_address');
            $table->float('cost', 6, 2)->default('0');;
            $table->text('message')->nullable();
            $table->String('transaction_id')->nullable();
            $table->boolean('is_paid')->default(0);
            $table->tinyInteger('order_status')->default(0);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('payment_id')
                ->references('id')->on('payments')
                ->onDelete('cascade');

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