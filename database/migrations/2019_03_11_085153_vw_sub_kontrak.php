<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VwSubKontrak extends Migration
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
DROP VIEW IF EXISTS `vwsubkontrak`;
SQL;
    }

    private function createView(): string
    {
        return <<<SQL
CREATE VIEW `vwsubkontrak` AS
SELECT 
    msk.`IDSubKontrak`,
    vt.`IDTugas`,
    vt.`InisialTugas`,
    vt.`IDProyek`,
    vt.`NamaTugas`
    FROM `mstsubkontrak` as msk
    LEFT JOIN `vwtugas` as vt ON msk.`IDTugas` = vt.`IDTugas`
SQL;
    }
}
