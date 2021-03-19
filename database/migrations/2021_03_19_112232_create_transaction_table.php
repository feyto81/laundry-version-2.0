<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_code');
            $table->date('date');
            $table->foreign('member_id')->references('id')->on('member');
            $table->unsignedBigInteger('member_id');
            $table->integer('additional_cost');
            $table->integer('discon');
            $table->integer('tax');
            $table->enum('status', ['baru', 'proses', 'selesai', 'diambil']);
            $table->enum('paid', ['dibayar', 'belum_dibayar']);
            $table->string('sub_total');
            $table->string('pay_total');
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
        Schema::dropIfExists('transaction');
    }
}
