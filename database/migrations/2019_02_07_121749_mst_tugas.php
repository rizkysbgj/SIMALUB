<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MstTugas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msttugas', function (Blueprint $table) {
            $table->increments('IDTugas');
            $table->string('InisialTugas');
            $table->string('NamaTugas');
            $table->string('DeskripsiTugas');
            $table->integer('IDProyek');
            $table->string('IDPenanggungJawab');
            $table->integer('IDMilestoneTugas');
            $table->date('RencanaMulai');
            $table->date('RencanaSelesai');
            $table->date('RealitaMulai')->nullable();
            $table->date('RealitaSelesai')->nullable();
            $table->string('StatusKajiUlang')->nullable();
            $table->string('CreatedBy');
            $table->string('UpdatedBy')->nullable();
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
        Schema::dropIfExists('msttugas');
    }
}
