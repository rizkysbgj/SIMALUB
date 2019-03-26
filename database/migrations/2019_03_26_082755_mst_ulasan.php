<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MstUlasan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mstulasan', function (Blueprint $table) {
            $table->increments('IDUlasan');
            $table->integer('IDProyek');
            $table->integer('Pertanyaan1')->nullable();
            $table->integer('Pertanyaan2')->nullable();
            $table->integer('Pertanyaan3')->nullable();
            $table->integer('Pertanyaan4')->nullable();
            $table->integer('Pertanyaan5')->nullable();
            $table->integer('Pertanyaan6')->nullable();
            $table->integer('Pertanyaan7')->nullable();
            $table->integer('Pertanyaan8')->nullable();
            $table->integer('Pertanyaan9')->nullable();
            $table->string('KritikSaran')->nullable();
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
        Schema::dropIfExists('mstulasan');
    }
}
