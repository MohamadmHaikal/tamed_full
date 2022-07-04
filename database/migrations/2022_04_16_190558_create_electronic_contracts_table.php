<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectronicContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electronic_contracts', function (Blueprint $table) {
            $table->id();
            $table->integer('contract_number');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('SParty_id')->unsigned();
            $table->foreign('SParty_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('CRecord');
            $table->string('responsible');
            $table->string('phone');
            $table->string('status');
            $table->text('Brief_description');
            $table->date('contract_date');
            $table->date('date_start');
            $table->date('date_end');
            $table->string('renewable');
            $table->string('Payment_system');
            $table->string('amount');
            $table->Text('batch');
            $table->string('final_batch');
            $table->bigInteger('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->string('description');
            $table->string('Contract_file');
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
        Schema::dropIfExists('electronic_contracts');
    }
}
