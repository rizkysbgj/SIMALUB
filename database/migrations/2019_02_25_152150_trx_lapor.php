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
            $table->integer('IDProyek');
            $table->string('IDPelapor');
            $table->string('Attachment')->nullable();
            $table->string('ContentType')->nullable();
            $table->string('NamaFile')->nullable();
            $table->string('Catatan');
            $table->integer('StatusTidakan')->default('0');
            $table->string('AttachmentTindakan')->nullable();
            $table->string('ContentTypeTindakan')->nullable();
            $table->string('NamaFileTindakan')->nullable();
            $table->string('CatatanTindakan')->nullable();
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
