<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrxKajiUlang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trxkajiulang', function (Blueprint $table) {
            $table->increments('IDTrxKajiUlang');
            $table->integer('IDTugas');
            $table->string('Metode');
            $table->string('Peralatan');
            $table->string('Personil');
            $table->string('BahanKimia');
            $table->string('KondisiAkomodasi');
            $table->string('Kesimpulan');
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
        Schema::dropIfExists('trxkajiulang');
    }
}
