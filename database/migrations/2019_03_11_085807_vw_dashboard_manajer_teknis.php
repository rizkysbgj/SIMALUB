    <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VwDashboardManajerTeknis extends Migration
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
DROP VIEW IF EXISTS `vwdashboardmanajerteknis`;
SQL;
    }

    private function createView(): string
    {
        return <<<SQL
CREATE VIEW `vwdashboardmanajerteknis` AS
SELECT 
    vp.`IDProyek`,
    vp.`NamaProyek`,
    vp.`InisialProyek`,
    vp.`PenanggungJawab`,
    vp.`TanggalMulai`,
    vp.`RencanaSelesai`,
    vp.`RealitaSelesai`,
    vp.`TotalTugas`,
    (SELECT COUNT(`IDTugas`) FROM `vwTugas` AS vt WHERE vt.`IDProyek` = vp.`IDProyek` AND vt.`IDMilestoneTugas` = 9) AS `TugasSelesai`,
    (SELECT COUNT(`IDTugas`) FROM `vwsubkontrak` AS vsk WHERE vsk.`IDProyek` = vp.`IDProyek`) AS `TotalSubKontrak`
    FROM `vwproyek` as vp
SQL;
    }
}
