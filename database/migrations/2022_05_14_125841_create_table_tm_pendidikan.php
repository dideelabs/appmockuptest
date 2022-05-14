<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTmPendidikan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tm_pendidikan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pelamar')->nullable();
            $table->string('jenjang')->nullable();
            $table->string('institusi')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('tahun')->nullable();
            $table->string('ipk')->nullable();
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
        Schema::dropIfExists('tm_pendidikan');
    }
}
