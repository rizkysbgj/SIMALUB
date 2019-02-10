<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MstMilestoneTugas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mstmilestonetugas', function (Blueprint $table) {
            $table->increments('IDMilestoneTugas');
            $table->string('MilestoneTugas');
            $table->integer('IDRole');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mstmilestonetugas');
    }
}
