<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VwUlasan extends Migration
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
DROP VIEW IF EXISTS `vwulasan`;
SQL;
    }

    private function createView(): string
    {
        return <<<SQL
CREATE VIEW `vwulasan` AS
SELECT 
    mu.`IDUlasan`,
    mu.`IDProyek`,
    mp.`NamaProyek`,
    mp.`SponsorProyek`,
    mp.`TanggalMulai`,
    mp.`RealitaSelesai`,
    mu.`Pertanyaan1`,
    mu.`Pertanyaan2`,
    mu.`Pertanyaan3`,
    mu.`Pertanyaan4`,
    mu.`Pertanyaan5`,
    mu.`Pertanyaan6`,
    mu.`Pertanyaan7`,
    mu.`Pertanyaan8`,
    mu.`Pertanyaan9`,
    mu.`KritikSaran`,
    mu.`created_at`
    FROM `mstulasan` as mu
    LEFT JOIN `mstproyek` as mp ON mu.`IDProyek` = mp.`IDProyek`
SQL;
    }
}
