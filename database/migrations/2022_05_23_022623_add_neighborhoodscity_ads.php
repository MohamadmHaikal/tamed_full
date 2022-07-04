<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNeighborhoodscityAds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->bigInteger('city_id')->unsigned();
          $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
          $table->bigInteger('neighborhood_id')->unsigned();
          $table->foreign('neighborhood_id')->references('id')->on('neighborhoods')->onDelete('cascade');
   
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
