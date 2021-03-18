<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_code');
            $table->dateTime('date');
            $table->foreign('outlet_id')->references('id')->on('outlet');
            $table->unsignedBigInteger('outlet_id');
            $table->date('pay_date');
            $table->date('deadline');
            $table->foreign('paket_id')->references('id')->on('paket');
            $table->unsignedBigInteger('paket_id');
            $table->integer('weight');
            $table->integer('sub_total');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('cart');
    }
}
