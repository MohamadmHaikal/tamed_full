<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationSectionActiv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        // Schema::table('activities', function (Blueprint $table) {
        //     $table->bigInteger('section_id')->unsigned();
        //     $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
     
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relation_section_activ');
    }
}
