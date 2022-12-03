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
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');//khoa chinh tang tu dong
            $table->string('Username')->unique();
            $table->string('Password')->nullable();
            $table->string('Email')->nullable();
            $table->string('Phone')->nullable();
            $table->string('Address')->nullable();
            $table->string('FullName')->nullable();
            $table->integer('IsAdmin')->nullable();
            $table->string('Avatar')->nullable();
            $table->integer('Status')->nullable();// tài khoản còn sử dụng hay không
            $table->timestamps();
            $table->softDeletes();// xoa mem
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
};
