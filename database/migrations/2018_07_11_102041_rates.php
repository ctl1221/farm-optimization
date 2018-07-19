<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Rates extends Migration
{
    public function up()
    {   
        Schema::create('FCR_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->float('start',6,4);
            $table->float('end',6,4);
            $table->float('rate');
        });

        Schema::create('BPI_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->float('start');
            $table->float('end');
            $table->float('rate');
        });

        Schema::create('FCRi_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->float('start',5,3);
            $table->float('end',5,3);
            $table->float('rate');
        });

        Schema::create('ALW_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->float('start',5,3);
            $table->float('end',5,3);
            $table->float('rate');
        });

        Schema::create('HR_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->float('start',5,2);
            $table->float('end',5,2);
            $table->float('rate');
        });

    }

    public function down()
    {
        Schema::dropIfExists('FCR_rates');
        Schema::dropIfExists('BPI_rates');
        Schema::dropIfExists('FCRi_rates');
    }
}