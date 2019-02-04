<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MstMilestoneFlow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mstmilestoneflowtugas', function(Blueprint $table) {
            $table->increments('IDMilestoneFlowTugas');
            $table->integer('IDMilestoneTugas');
            $table->string('Kode');
            $table->string('Aksi');
            $table->integer('IDMilestoneLanjut');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mstmilestoneflowtugas');
    }
}
