<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('UserID');
            $table->string('FullName');
            $table->string('Password');
            $table->string('PasswordSalt');
            $table->timestamp('CreatedDate');
            $table->string('CreatedBy');
            $table->timestamp('UpdatedDate')->nullable();
            $table->string('UpdatedBy');
            $table->rememberToken();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('users');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
}
