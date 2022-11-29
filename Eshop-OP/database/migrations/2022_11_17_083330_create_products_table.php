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
            $table->integer('Price')->default(0);
            $table->integer('Stock')->default(0);
            $table->integer('Brand_id')->unsigned()->index();
            $table->integer('Category_id')->unsigned()->index();
            $table->string('Image');
            $table->integer('Status');// sản phẩm cong mở bán hay không
            $table->timestamps();
            $table->softDeletes();
            // lien ket ban khoa ngoai
            $table->foreign('Brand_id')->references('id')->on('Brands');
            $table->foreign('Category_id')->references('id')->on('Categorys');

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