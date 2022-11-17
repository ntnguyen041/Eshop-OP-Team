<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('InvoiceID');
            $table->integer('ProductID');
            $table->integer('Quantity');
            $table->integer('UnitPice');
            $table->timestamps();

            // kết bản
           // $table->foreign('InvoiceID')->references('id')->on('Invoices');
            //$table->foreign('ProductID')->references('id')->on('Products');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_details');
    }
};
