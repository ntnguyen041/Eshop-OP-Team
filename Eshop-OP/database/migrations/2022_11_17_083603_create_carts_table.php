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
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');//khoa chinh tang tu dong
            $table->integer('AccountId');//khong duc chung lap
            $table->integer('ProductID');
            $table->integer('Quantity');
            $table->timestamps();
            $table->softDeletes();// xoa mem

            //lien ket banr
            //$table->foreign('AccountId')->references('id')->on('Accounts');
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
        Schema::dropIfExists('carts');
    }
};
