<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->integer('nip')->unique();
            $table->integer('nuptk')->unique();
            $table->string('tahun_masuk');
            $table->string('nama');
            $table->string('pendidikan');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jk', ['Laki-laki', 'Perempuan']);
            $table->string('agama');
            $table->text('alamat');
            $table->string('no_hp');
            $table->string('email')->unique();
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
        Schema::dropIfExists('gurus');
    }
}
