<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user');
            $table->integer('nisn')->unique();
            $table->date('tanggal_pendaftaran');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jk', ['Laki-laki', 'Perempuan']);
            $table->string('agama');
            $table->text('alamat');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->text('pekerjaan_ayah');
            $table->text('pekerjaan_ibu');
            $table->string('tempat_tinggal');
            $table->string('asal_sekolah');
            $table->string('transportasi');
            $table->string('foto');
            $table->string('status');
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
        Schema::dropIfExists('pendaftarans');
    }
}
