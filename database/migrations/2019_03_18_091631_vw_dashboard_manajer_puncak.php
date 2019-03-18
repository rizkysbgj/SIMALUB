    <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VwDashboardManajerPuncak extends Migration
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
DROP VIEW IF EXISTS `vwdashboardmanajerpuncak`;
SQL;
    }

    private function createView(): string
    {
        return <<<SQL
CREATE VIEW `vwdashboardmanajerpuncak` AS
SELECT 
    MONTH(vp.`TanggalMulai`) as `Bulan`,
    YEAR(vp.`TanggalMulai`) as `Tahun`,
    COUNT(vp.`IDProyek`) as `TotalProyek`,
    (SELECT COUNT(`IDProyek`) FROM `mstproyek` as mp WHERE mp.`TanggalSelesai` <> NULL) as `TotalProyekSelesai`,
    (SELECT COUNT(`IDProyek`) FROM `mstproyek` as mp WHERE mp.`TanggalSelesai` = NULL) as `TotalProyekBerlangsung`,
    FROM `vwproyek` as vp
    GROUP BY MONTH(vp.`TanggalMulai`), YEAR(vp.`TanggalMulai`)
SQL;
    }
}
