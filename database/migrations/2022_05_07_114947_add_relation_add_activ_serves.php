<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationAddActivServes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('services', function (Blueprint $table) {
        //     $table->bigInteger('Addactivitie_id')->unsigned();
        //     $table->foreign('Addactivitie_id')->references('id')->on('additional_activities')->onDelete('cascade');
     
        // });
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
