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
            $table->char('nisn', 9)->nullable();
            $table->char('nohp', 12)->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('jalur')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_wali')->nullable();
            $table->string('email')->unique();
            $table->date('tanggal_lahir')->nullable();
            $table->string('gender')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('smp_id')->nullable();
            $table->foreign('smp_id')->references('id')->on('smp')->onDelete('cascade')->onUpdate('cascade');
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
