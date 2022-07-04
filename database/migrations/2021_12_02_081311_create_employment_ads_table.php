<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment_ads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity');
            $table->bigInteger('employee_id')->unsigned();
            $table->foreign('employee_id')->references('id')->on('type_employments')->onDelete('cascade');
            $table->bigInteger('ads_id')->unsigned();
            $table->foreign('ads_id')->references('id')->on('ads')->onDelete('cascade');
          
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
        Schema::dropIfExists('employment_ads');
    }
}
