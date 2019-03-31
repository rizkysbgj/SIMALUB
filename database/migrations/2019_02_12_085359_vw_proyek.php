<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VwProyek extends Migration
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
DROP VIEW IF EXISTS `vwproyek`;
SQL;
    }

    private function createView(): string
    {
        return <<<SQL
CREATE VIEW `vwproyek` AS
SELECT 
    mp.`IDProyek`,
    mp.`NamaProyek`,
    mp.`InisialProyek`,
    mu.`NamaLengkap` as `PenanggungJawab`,
    mp.`TanggalMulai`,
    mp.`RencanaSelesai`,
    mp.`RealitaSelesai`,
    mp.`DeskripsiProyek`,
    (SELECT COUNT(`IDTugas`) FROM `mstTugas` AS mt WHERE mt.`IDProyek` = mp.`IDProyek` AND mt.`StatusKajiUlang` <> 'Tidak' ) AS `TotalTugas`,
    mp.`SiapBuatSertifikat`
    FROM `mstproyek` as mp
    LEFT JOIN `mstuser` as mu ON mp.`PenanggungJawab` = mu.`IDUser`;
SQL;
    }
}
