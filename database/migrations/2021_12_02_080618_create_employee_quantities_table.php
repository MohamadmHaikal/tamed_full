<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeQuantitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_quantities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity');
            $table->bigInteger('employee_id')->unsigned();
            $table->foreign('employee_id')->references('id')->on('type_employments')->onDelete('cascade');
            $table->bigInteger('quote_id')->unsigned();
            $table->foreign('quote_id')->references('id')->on('quotes')->onDelete('cascade');
          
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
        Schema::dropIfExists('employee_quantities');
    }
}
