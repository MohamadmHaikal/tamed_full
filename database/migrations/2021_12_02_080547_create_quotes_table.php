<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->boolean('status');
            $table->boolean('residence');
            $table->boolean('transportation');
            $table->string('modal');
            $table->string('contract');
            $table->float('price');
            $table->bigInteger('to_id')->unsigned();
            $table->foreign('to_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('form_id')->unsigned();
            $table->foreign('form_id')->references('id')->on('users')->onDelete('cascade');
          
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
        Schema::dropIfExists('quotes');
    }
}
