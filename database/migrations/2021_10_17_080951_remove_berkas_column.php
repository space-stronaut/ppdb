<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveBerkasColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pendaftaran', function($table) {
            $table->dropColumn('foto_nisn');
            $table->dropColumn('foto_raport');
            $table->dropColumn('pas_foto');
            $table->dropColumn('bukti_pembayaran');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
