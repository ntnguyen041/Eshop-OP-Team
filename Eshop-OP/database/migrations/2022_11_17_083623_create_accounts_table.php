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
            $table->bigIncrements('id');//khoa chinh tang tu dong
            $table->string('Username')->unique();
            $table->string('Password');
            $table->string('Email');
            $table->integer('Phone');
            $table->string('Address');
            $table->string('FullName');
            $table->integer('IsAdmin');
            $table->string('Avatar');
            $table->integer('Status');// tài khoản còn sử dụng hay không
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
