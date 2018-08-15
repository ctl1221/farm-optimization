<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FeedsData extends Migration
{
    public function up()
    {   
        Schema::create('feeds_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('farm_A');
            $table->integer('farm_B');
            $table->integer('farm_C');
            $table->integer('total_feeds');
            $table->integer('total_income')->default(0);
            $table->float('BPI_rate_A',4,2)->default(0);
            $table->float('BPI_rate_B',4,2)->default(0);
            $table->float('BPI_rate_C',4,2)->default(0);
            $table->float('FCR_rate_A',4,2)->default(0);
            $table->float('FCR_rate_B',4,2)->default(0);
            $table->float('FCR_rate_C',4,2)->default(0);
            $table->float('FCRi_rate_A',4,2)->default(0);
            $table->float('FCRi_rate_B',4,2)->default(0);
            $table->float('FCRi_rate_C',4,2)->default(0);
            $table->float('FCR_A',6,4)->default(0);
            $table->float('FCR_B',6,4)->default(0);
            $table->float('FCR_C',6,4)->default(0);
            $table->integer('BPI_A')->default(0);
            $table->integer('BPI_B')->default(0);
            $table->integer('BPI_C')->default(0);
            $table->float('HR_rate_A',4,2)->default(0);
            $table->float('HR_rate_B',4,2)->default(0);
            $table->float('HR_rate_C',4,2)->default(0);
        });

        Schema::create('birds_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Computed_Birds_A');
            $table->integer('Computed_Birds_B');
            $table->integer('Computed_Birds_C');
            $table->integer('Computed_Total_Birds');
            $table->float('Computed_HR_Income');
            $table->float('HR_rate_A',4,2)->default(0);
            $table->float('HR_rate_B',4,2)->default(0);
            $table->float('HR_rate_C',4,2)->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('feeds_data');
        Schema::dropIfExists('birds_data');
    }
}
