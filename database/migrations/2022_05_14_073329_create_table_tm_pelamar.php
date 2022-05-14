<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTmPelamar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tm_pelamar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama')->nullable();
            $table->string('no_ktp')->nullable();
            $table->string('tob')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('agama')->nullable();
            $table->string('gol_darah')->nullable();
            $table->string('status')->nullable();
            $table->string('alamat_ktp')->nullable();
            $table->string('alamat_domisili')->nullable();
            $table->string('email')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('keahlian')->nullable();
            $table->boolean('confirm_available_anywhere')->default(false);
            $table->string('request_salary')->nullable();
            $table->string('jabatan_id')->nullable();
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
        Schema::dropIfExists('tm_pelamar');
    }
}
