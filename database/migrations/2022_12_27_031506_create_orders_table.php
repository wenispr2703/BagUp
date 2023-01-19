<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->integer('user_id');
            $table->integer('material_id');
            $table->integer('color_id');
            $table->integer('size_id');
            $table->integer('quantity');
            $table->string('design');
            $table->integer('pickup_id')->nullable();
            $table->integer('status_id')->default('1');
            $table->integer('pembayaran_id')->default('1');

            $table->unsignedBigInteger('customer_id');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers');
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
};
