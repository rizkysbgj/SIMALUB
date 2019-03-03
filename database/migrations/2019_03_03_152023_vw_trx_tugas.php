<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VwTrxTugas extends Migration
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

    private function dropView(): string
    {
        return <<<SQL
DROP VIEW IF EXISTS `vwtrxtugas`;
SQL;
    }

    private function createView(): string
    {
        return <<<SQL
CREATE VIEW `vwtrxtugas` AS
SELECT 
    tt.`IDTrxTugas`,
    tt.`IDTugas`,
    mu.`NamaLengkap`,
    mmt.`MilestoneTugas`,
    tt.`WaktuMulai`,
    tt.`WaktuSelesai`,
    tt.`Catatan`,
    tt.`Attachment`
    FROM `trxtugas` as tt
    LEFT JOIN `mstuser` as mu ON tt.`IDPenanggungJawab` = mu.`IDUser`
    LEFT JOIN `mstmilestonetugas` as mmt ON tt.`IDMilestoneTugas` = mmt.`IDMilestoneTugas`
SQL;
    }
}
