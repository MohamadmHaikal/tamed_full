<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('quantity');
            $table->integer('value');
            $table->double('discount');
            $table->tinyInteger('discount_type');
            $table->double('Taxable_amount');
            $table->double('tax_rate');
            $table->double('tax_amount');
            $table->bigInteger('invoices_id')->unsigned();
            $table->foreign('invoices_id')->references('id')->on('invoices')->onDelete('cascade');
            $table->double('total');
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
        Schema::dropIfExists('products');
    }
}
