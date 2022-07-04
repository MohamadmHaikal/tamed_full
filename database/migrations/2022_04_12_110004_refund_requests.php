<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RefundRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refund_requests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Membership_id')->unsigned();
            $table->foreign('Membership_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('beneficiary');
            $table->string('amount');
            $table->string('status');
            $table->string('IBAN');
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
        Schema::dropIfExists('refund_requests');
    }
}
