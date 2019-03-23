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
    mt.`IDProyek`,
    mt.`NamaTugas`,
    tt.`IDPenanggungJawab`,
    mu.`NamaLengkap`,
    tt.`IDMilestoneTugas`,
    mmt.`MilestoneTugas`,
    tt.`StatusTugas`,
    mp.`Percepatan`,
    tt.`WaktuMulai`,
    tt.`WaktuSelesai`,
    tt.`Catatan`,
    tt.`Attachment`
    FROM `trxtugas` as tt
    LEFT JOIN `mstuser` as mu ON tt.`IDPenanggungJawab` = mu.`IDUser`
    LEFT JOIN `mstmilestonetugas` as mmt ON tt.`IDMilestoneTugas` = mmt.`IDMilestoneTugas`
    LEFT JOIN `msttugas` as mt ON tt.`IDTugas` = mt.`IDTugas`
    LEFT JOIN `mstproyek` as mp ON mt.`IDProyek` = mp.`IDProyek`
SQL;
    }
}
