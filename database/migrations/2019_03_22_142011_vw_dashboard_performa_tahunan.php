<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VwDashboardPerformaTahunan extends Migration
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
DROP VIEW IF EXISTS `vwDashboardPerformaTahunan`;
SQL;
    }

    private function createView(): string
    {
        return <<<SQL
CREATE VIEW `vwDashboardPerformaTahunan` AS
SELECT 
    mu.`IDUser`,
    mu.`NamaLengkap`,
    YEAR(vtt.`WaktuMulai`) as `Tahun`,
    SUM(CASE WHEN vtt.`IDMilestoneTugas` =  5 AND vtt.`Percepatan` = 0 THEN 1 ELSE 0 END) as `TotalAnalisisBiasa`,
    SUM(CASE WHEN vtt.`IDMilestoneTugas` =  5 AND vtt.`Percepatan` = 1 THEN 1 ELSE 0 END) as `TotalAnalisisPercepatan`,
    SUM(CASE vtt.`IDMilestoneTugas` WHEN 5 THEN 1 ELSE 0 END) as `TotalAnalisis`,
    SUM(CASE vtt.`IDMilestoneTugas` WHEN 8 THEN 1 ELSE 0 END) as `TotalSelia`
    FROM `mstuser` as mu
    INNER JOIN `vwtrxtugas` as vtt ON vtt.`IDPenanggungJawab` = mu.`IDUser` AND vtt.`StatusTugas` IS NULL  AND vtt.`WaktuMulai` IS NOT NULL
    WHERE `IDRole` = 4 OR `IDRole` = 5
    GROUP BY mu.`IDUser`, YEAR(vtt.`WaktuMulai`), mu.`NamaLengkap`
SQL;
    }
}
