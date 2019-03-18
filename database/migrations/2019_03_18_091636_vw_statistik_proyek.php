    <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VwStatistikProyek extends Migration
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
DROP VIEW IF EXISTS `vwStatistikProyek`;
SQL;
    }

    private function createView(): string
    {
        return <<<SQL
CREATE VIEW `vwStatistikProyek` AS
SELECT 
    MONTH(vp.`TanggalMulai`) as `Bulan`,
    YEAR(vp.`TanggalMulai`) as `Tahun`,
    COUNT(vp.`IDProyek`) as `TotalProyek`,
    (SELECT COUNT(vp.`IDProyek`) FROM `vwproyek` as vp WHERE vp.`RealitaSelesai` IS NOT NULL AND (MONTH(vp.`TanggalMulai`) = `Bulan` AND YEAR(vp.`TanggalMulai`) = `Tahun`)) AS `TotalSelesai`,
    (SELECT COUNT(vp.`IDProyek`) FROM `vwproyek` as vp WHERE vp.`RealitaSelesai` IS NULL AND (MONTH(vp.`TanggalMulai`) = `Bulan` AND YEAR(vp.`TanggalMulai`) = `Tahun`)) AS `TotalBerlangsung`
    FROM `vwproyek` as vp
    GROUP BY MONTH(vp.`TanggalMulai`), YEAR(vp.`TanggalMulai`)
SQL;
    }
}
