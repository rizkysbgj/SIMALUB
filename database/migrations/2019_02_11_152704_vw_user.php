<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VwUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement($this->dropView());
    
        DB::statement($this->createView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // public function down()
    // {
        
    // }

    private function dropView(): string
    {
        return <<<SQL
DROP VIEW IF EXISTS `vwuser`;
SQL;
    }

    private function createView(): string
    {
        return <<<SQL
CREATE VIEW `vwuser` AS
SELECT 
    mu.`id`,
    mu.`IDUser`,
    mu.`NamaLengkap`,
    mu.`IDRole`,
    mr.`Role`,
    mu.`Status`
    FROM `mstuser` as mu
    LEFT JOIN `mstrole` as mr ON mu.`IDRole` = mr.`IDRole`;
SQL;
    }
}