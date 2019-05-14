<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
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
            $table->string('name');
            $table->string('phone',11);
            $table->string('address');
            $table->enum('state',['waiting','completed'])->default('waiting');
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('total_price');
            $table->timestamps();
        });
        Schema::create('order-detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedInteger('amount');
            $table->foreign('product_id')
                ->references('id')->on('products');
            $table->foreign('order_id')
                ->references('id')->on('orders')
                ->onDelete('cascade');    
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
        Schema::dropIfExists('order');
        Schema::dropIfExists('order-detail');
    }
}
