<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->integer('gateway_id')->nullable();
            $table->string('amount')->nullable();
            $table->string('charge')->nullable();
            $table->string('usd_amo')->nullable();
            $table->string('btc_amo')->nullable();
            $table->string('btc_wallet')->nullable();
            $table->string('trx')->nullable();
            $table->string('status')->nullable();
            $table->string('try')->nullable();
            $table->string('vsent')->nullable();
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
        Schema::dropIfExists('deposits');
    }
}
