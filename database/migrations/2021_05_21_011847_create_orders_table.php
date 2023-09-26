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
            $table->id();
            // $table->integer('product_by_id')->nullable();
            // $table->integer('quantity')->nullable();
            // $table->integer('price')->nullable();
            // $table->integer('discount')->nullable();
            // $table->integer('total')->nullable();
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            // $table->string('paymentMethod')->nullable();
            // $table->integer('paidAmount')->nullable();
            // $table->integer('balance')->nullable();
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
