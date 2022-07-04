<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFKuser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //test
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('neighbor_id')->unsigned();
            $table->foreign('neighbor_id')->references('id')->on('neighborhoods')->onDelete('cascade');
            $table->bigInteger('activitie_id')->unsigned();
            $table->foreign('activitie_id')->references('id')->on('activities')->onDelete('cascade');
     
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
