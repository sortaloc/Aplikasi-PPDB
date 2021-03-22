<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapelUjiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapel_ujians', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_mapel')->unique();
            $table->string('nama_mapel');
            $table->integer('kkm');
            $table->integer('jumlah');
            $table->integer('waktu');
            $table->string('foto');
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
        Schema::dropIfExists('mapel_ujians');
    }
}
