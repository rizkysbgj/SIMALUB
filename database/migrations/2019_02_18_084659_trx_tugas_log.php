<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrxTugasLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trxtugaslog', function (Blueprint $table) {
            $table->increments('IDTrxTugasLog');
            $table->integer('IDTugas');
            $table->string('Milestone');
            $table->string('IDUser');
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
        Schema::dropIfExists('trxtugaslog');
    }
}
