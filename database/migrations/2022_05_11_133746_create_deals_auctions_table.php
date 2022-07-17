<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealsAuctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals_auctions', function (Blueprint $table) {
            $table->id();
            $table->string('refernce_num');
            $table->string('status');
            $table->string('price');
            $table->date('deals_date');
            $table->bigInteger('invoice_num')->unsigned();
            $table->foreign('invoice_num')->references('id')->on('invoices')->onDelete('cascade');
            $table->bigInteger('ads_id')->unsigned();
            $table->foreign('ads_id')->references('id')->on('ads')->onDelete('cascade');
            $table->bigInteger('to_id')->unsigned();
            $table->foreign('to_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('from_id')->unsigned();
            $table->foreign('from_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('deals_auctions');
    }
}
