<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('name');
            $table->char('nisn', 9);
            $table->char('nohp', 12);
            $table->string('tempat_lahir');
            $table->string('email')->unique();
            $table->date('tanggal_lahir');
            $table->string('gender');
            $table->string('password');
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('smp_id');
            $table->foreign('smp_id')->references('id')->on('smp')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('jurusan_id');
            $table->foreign('jurusan_id')->references('id')->on('jurusan')->onDelete('cascade')->onUpdate('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
