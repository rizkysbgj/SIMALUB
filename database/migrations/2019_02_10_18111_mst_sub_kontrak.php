<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MstSubKontrak extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mstsubkontrak', function (Blueprint $table) {
            $table->increments('IDSubKontrak');
            $table->integer('IDTugas');
            $table->date('WaktuDikirim')->nullable();
            $table->date('WaktuDiterima')->nullable();
            $table->integer('StatusSubKontrak')->default(0);
            $table->string('Attachment')->nullable();
            $table->string('ContentType')->nullable();
            $table->string('NamaFile')->nullable();
            $table->string('Catatan')->nullable();
            $table->string('IDPenanggungJawab');
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
        Schema::dropIfExists('mstsubkontrak');
    }
}
