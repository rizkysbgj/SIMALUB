<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrxLapor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trxlapor', function (Blueprint $table) {
            $table->increments('IDTrxLapor');
            $table->integer('IDTugas');
            $table->string('Pelapor');
            $table->string('Attachment');
            $table->string('ContentType');
            $table->string('NamaFile');
            $table->string('Catatan');
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
        Schema::dropIfExists('trxlapor');
    }
}
