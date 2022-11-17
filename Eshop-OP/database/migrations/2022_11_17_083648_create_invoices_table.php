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
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');//khoa chinh tang tu dong
            $table->string('Code');
            $table->integer('AccountID');
            $table->date('IsuedData');
            $table->string('ShoppingAddress');
            $table->string('ShoppingPhone');
            $table->integer('Total');
            $table->string('Status');// ghi chú thêm
            $table->timestamps();
            $table->softDeletes();// xoa mem
            // liên kêt
            //$table->foreign('AccountID')->references('id')->on('Accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
