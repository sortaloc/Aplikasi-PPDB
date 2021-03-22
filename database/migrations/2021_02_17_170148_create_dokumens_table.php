<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user');
            $table->string('akta');
            $table->string('skhun');
            $table->string('ijazah');
            $table->string('kk');
            $table->string('ktp');
            $table->string('pkh');
            $table->string('kip');
            $table->string('kps');
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
        Schema::dropIfExists('dokumens');
    }
}
