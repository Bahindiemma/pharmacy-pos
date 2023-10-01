<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name')->default("Ema");
            $table->text('address')->default("kampala");
            $table->string('mobile')->default("0783224234");
            $table->string('email')->default("ema@gmail.com");
            $table->timestamps();
        });
        // Insert data into the table
        \DB::table('suppliers')->insert([
            'supplier_name' => 'John Doe',
            'address' => 'Kampala',
            'mobile' => '0750482089',
            'email' => 'john@example.com'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
