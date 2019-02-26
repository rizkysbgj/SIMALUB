<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VwTrxLapor extends Migration
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
DROP VIEW IF EXISTS `vwtrxlapor`;
SQL;
    }

    private function createView(): string
    {
        return <<<SQL
CREATE VIEW `vwtrxlapor` AS
SELECT 
    tl.`IDTrxLapor`,
    tl.`IDProyek`,
    tl.`IDTugas`,
    vt.`InisialTugas`,
    vt.`NamaTugas`,
    tl.`Pelapor`,
    tl.`Attachment`,
    tl.`ContentType`,
    tl.`NamaFile`,
    tl.`Catatan`,
    tl.`created_add` AS `WaktuLapor`
    FROM `trxlapor` as tl
    LEFT JOIN `vwtugas` as vt ON tl.`IDTugas` = vt.`IDTugas`
SQL;
    }
}
