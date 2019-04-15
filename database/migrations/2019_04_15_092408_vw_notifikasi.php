<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VwNotifikasi extends Migration
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
DROP VIEW IF EXISTS `vwnotifikasi`;
SQL;
    }

    private function createView(): string
    {
        return <<<SQL
CREATE VIEW `vwnotifikasi` AS
SELECT 
    mn.`IDNotifikasi`,
    mn.`IDUser`,
    mn.`Pesan`,
    mn.`Aksi`,
    mn.`Dibaca`,
    CASE WHEN TIMESTAMPDIFF(DAY,mn.`created_at`,NOW()) != 0 THEN CONCAT(TIMESTAMPDIFF(DAY,mn.`created_at`,NOW()), " hari lalu")
         WHEN TIMESTAMPDIFF(HOUR,mn.`created_at`,NOW()) != 0 THEN CONCAT(TIMESTAMPDIFF(HOUR,mn.`created_at`,NOW()), " jam lalu")
         ELSE CONCAT(TIMESTAMPDIFF(MINUTE,mn.`created_at`,NOW()), " menit lalu") END AS `WaktuKirim`
    FROM `mstnotifikasi` as mn
SQL;
    }
}
