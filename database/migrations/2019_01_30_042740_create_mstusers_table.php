<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mstuser', function (Blueprint $table) {
            $table->increments('id');
            $table->string('IDUser');
            $table->string('NIK');
            $table->string('NamaLengkap');
            $table->integer('IDRole');
            $table->string('Email');
            $table->string('Password');
            $table->enum('Status', ['Aktif', 'Tidak Aktif']);
            $table->string('CreatedBy');
            $table->string('UpdatedBy')->nullable();
            $table->string('Avatar')->nullable();
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
        Schema::dropIfExists('mstuser');
    }
}
