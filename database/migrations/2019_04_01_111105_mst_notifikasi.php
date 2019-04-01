<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MstNotifikasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mstnotifikasi', function (Blueprint $table) {
            $table->increments('IDNotifikasi');
            $table->string('IDUser');
            $table->string('Pesan');
            $table->string('Aksi');
            $table->boolean('Dibaca')->default(false);
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
        Schema::dropIfExists('mstnotifikasi');
    }
}
