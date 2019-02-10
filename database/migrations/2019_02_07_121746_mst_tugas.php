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
            $table->string('KodeTugas',10)->unique();
            $table->string('NamaTugas');
            $table->string('DeskripsiTugas');
            $table->integer('IDKategori');
            $table->integer('IDProyek');
            $table->string('PIC');
            $table->integer('IDMilestone');
            $table->date('WaktuMulai');
            $table->date('WaktuSelesai')->nullable();
            $table->integer('Durasi')->nullable();
            $table->string('Status');
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
        Schema::dropIfExists('msttugas');
    }
}
