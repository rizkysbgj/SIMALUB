<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VwTugas extends Migration
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
DROP VIEW IF EXISTS `vwtugas`;
SQL;
    }

    private function createView(): string
    {
        return <<<SQL
CREATE VIEW `vwtugas` AS
SELECT 
    mt.`IDTugas`,
    mt.`InisialTugas`,
    mt.`IDProyek`,
    mp.`NamaProyek`,
    mt.`NamaTugas`,
    mkt.`Kategori`,
    mt.`DeskripsiTugas`,
    mt.`RencanaMulai`,
    mt.`RencanaSelesai`,
    mt.`RealitaMulai`,
    mt.`RealitaSelesai`,
    mt.`PIC` as `IDPIC`,
    mu.`NamaLengkap` as `PenanggungJawab`,
    mt.`IDMilestone`,
    mmt.`MilestoneTugas` as `Milestone`
    FROM `msttugas` as mt
    LEFT JOIN `mstproyek` as mp ON mt.`IDProyek` = mp.`IDProyek`
    LEFT JOIN `mstkategoritugas` as mkt ON mt.`IDKategori` = mkt.`IDKategori`
    LEFT JOIN `mstuser` as mu ON mt.`PIC` = mu.`IDUser`
    LEFT JOIN `mstmilestonetugas` as mmt ON mt.`IDMilestone` = mmt.`IDMilestoneTugas`
SQL;
    }
}
