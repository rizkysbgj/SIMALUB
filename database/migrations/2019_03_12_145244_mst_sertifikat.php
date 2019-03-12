<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MstSertifikat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mstsertifikat', function (Blueprint $table) {
            $table->increments('IDSertifikat');
            $table->integer('IDProyek');
            $table->string('Attachment')->nullable();
            $table->string('ContentType')->nullable();
            $table->string('NamaFile')->nullable();
            $table->string('Catatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mstsertifikat');
    }
}
