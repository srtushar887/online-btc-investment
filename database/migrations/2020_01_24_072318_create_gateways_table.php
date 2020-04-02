<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGatewaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gateways', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('main_name')->nullable();
            $table->string('name')->nullable();
            $table->string('minamo')->nullable();
            $table->string('maxamo')->nullable();
            $table->string('fixed_charge')->nullable();
            $table->string('percent_charge')->nullable();
            $table->string('rate')->nullable();
            $table->string('val1')->nullable();
            $table->string('val2')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('gateways');
    }
}
