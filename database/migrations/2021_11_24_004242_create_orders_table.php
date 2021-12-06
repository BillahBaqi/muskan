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
            $table->integer('user_id');
            $table->integer('discount')->nullable();
            $table->integer('sub_total');
            $table->double('amount')->nullable();
            $table->string('currency', 20)->nullable();
            $table->integer('payment_method')->nullable();
            $table->string('status', 20)->nullable();
            $table->integer('transaction_id')->nullable();
            $table->string('track', 20)->nullable();
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
