<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrxTugas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trxtugas', function (Blueprint $table) {
            $table->increments('IDTrxTugas');
            $table->integer('IDTugas');
            $table->integer('IDMilestoneTugas');
            $table->string('IDPenanggungJawab');
            $table->datetime('WaktuMulai')->nullable();
            $table->datetime('WaktuSelesai')->nullable();
            $table->string('Catatan')->nullable();
            $table->string('Attachment')->nullable();
            $table->string('ContentType')->nullable();
            $table->string('FileName')->nullable();
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
        Schema::dropIfExists('trxtugas');
    }
}
