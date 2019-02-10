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
            $table->date('WaktuDikirim');
            $table->date('WaktuDiterima');
            // $table->enum('Status');
            $table->string('CreatedBy');
            $table->string('UpdatedBy');
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
