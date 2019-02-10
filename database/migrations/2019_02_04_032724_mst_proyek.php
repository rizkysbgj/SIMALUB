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
            $table->string('NamaProyek',100)->unique();
            $table->string('InisialProyek',10)->unique();
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
