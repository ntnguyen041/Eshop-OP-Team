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
            $table->integer('Invoice_id')->unsigned()->index();
            $table->integer('Product_id')->unsigned()->index();
            $table->integer('Quantity');
            $table->integer('UnitPice');
            $table->timestamps();

            // kết bản
            $table->foreign('Invoice_id')->references('id')->on('Invoices');
            $table->foreign('Product_id')->references('id')->on('Products');

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
