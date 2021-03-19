<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_detail', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_code');
            $table->foreign('paket_id')->references('id')->on('paket');
            $table->unsignedBigInteger('paket_id');
            $table->foreign('outlet_id')->references('id')->on('outlet');
            $table->unsignedBigInteger('outlet_id');
            $table->date('pay_date');
            $table->date('deadline');
            $table->integer('weight');
            $table->text('keterangan');
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
        Schema::dropIfExists('transaction_detail');
    }
}
