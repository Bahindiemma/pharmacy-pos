<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->constrained('suppliers');
            $table->string('product_name');
            $table->text('description');
            $table->string('brand');
            $table->string('form');
            $table->string('expiredate');
            $table->integer('price');
            $table->integer('supplier_price');
            $table->integer('quantity');
            $table->integer('stock_alert')->default('100');
            $table->string('product_img')->default('product.png');
            $table->string('batch_number');
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
        Schema::dropIfExists('products');
    }
}
