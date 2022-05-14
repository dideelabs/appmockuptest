<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTmRiwayatKerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tm_riwayat_kerja', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pelamar')->nullable();
            $table->string('perusahaan')->nullable();
            $table->string('posisi')->nullable();
            $table->string('gaji')->nullable();
            $table->string('tahun')->nullable();
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
        Schema::dropIfExists('tm_riwayat_kerja');
    }
}
