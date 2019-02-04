<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MstProyek extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mstproyek', function (Blueprint $table) {
            $table->increments('IDProyek');
            $table->string('NamaProyek');
            $table->string('InisialProyek');
            $table->string('PenanggungJawab');
            $table->enum('Status', ['Aktif', 'Batal']);
            $table->dateTime('TanggalMulai');
            $table->dateTime('RencanaSelesai');
            $table->dateTime('RealitaSelesai')->nullable();
            $table->string('DeskripsiProyek');
            $table->string('SponsorProyek');
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
        Schema::dropIfExists('mstproyek');
    }
}
