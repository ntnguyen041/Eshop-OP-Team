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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name')->uniqid();
            $table->string('Description')->uniqid();
            $table->float('Price')->default(0);
            $table->integer('Stock')->default(0);
            $table->integer('BrandID')->unsigned()->index();
            $table->integer('CategoryID')->unsigned()->index();
            $table->string('Image');
            $table->integer('Status');// sản phẩm cong mở bán hay không
            $table->timestamps();
            $table->softDeletes();
            // lien ket ban khoa ngoai
            //$table->foreign('BrandID')->references('id')->on('Brands');
            //$table->foreign('CategoryID')->references('id')->on('Categorys');

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
};
