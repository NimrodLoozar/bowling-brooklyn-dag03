<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReserveringSeeder extends Seeder
{
    public function run()
    {
        DB::table('reservering')->insert([
            ['id' => 1, 'persoon_id' => 1, 'openingstijd_id' => 2, 'baan_id' => 8, 'pakketoptie_id' => 1, 'reserveringsstatus' => 'Bevestigd', 'reserveringsnummer' => '202212200001', 'datum' => '2022-12-20', 'aantaluren' => 1, 'begintijd' => '15:00', 'eindtijd' => '16:00', 'aantalvolwassenen' => 4, 'aantalkinderen' => 2],
            ['id' => 2, 'persoon_id' => 2, 'openingstijd_id' => 2, 'baan_id' => 2, 'pakketoptie_id' => 3, 'reserveringsstatus' => 'Bevestigd', 'reserveringsnummer' => '202212200002', 'datum' => '2022-12-20', 'aantaluren' => 1, 'begintijd' => '17:00', 'eindtijd' => '18:00', 'aantalvolwassenen' => 4, 'aantalkinderen' => null],
            ['id' => 3, 'persoon_id' => 3, 'openingstijd_id' => 7, 'baan_id' => 3, 'pakketoptie_id' => 1, 'reserveringsstatus' => 'Bevestigd', 'reserveringsnummer' => '202212240003', 'datum' => '2022-12-24', 'aantaluren' => 2, 'begintijd' => '16:00', 'eindtijd' => '18:00', 'aantalvolwassenen' => 4, 'aantalkinderen' => null],
            ['id' => 4, 'persoon_id' => 1, 'openingstijd_id' => 2, 'baan_id' => 6, 'pakketoptie_id' => null, 'reserveringsstatus' => 'Bevestigd', 'reserveringsnummer' => '202212270004', 'datum' => '2022-12-27', 'aantaluren' => 2, 'begintijd' => '17:00', 'eindtijd' => '19:00', 'aantalvolwassenen' => 2, 'aantalkinderen' => null],
            ['id' => 5, 'persoon_id' => 4, 'openingstijd_id' => 3, 'baan_id' => 4, 'pakketoptie_id' => 4, 'reserveringsstatus' => 'Bevestigd', 'reserveringsnummer' => '202212280005', 'datum' => '2022-12-28', 'aantaluren' => 1, 'begintijd' => '14:00', 'eindtijd' => '15:00', 'aantalvolwassenen' => 3, 'aantalkinderen' => null],
            ['id' => 6, 'persoon_id' => 5, 'openingstijd_id' => 10, 'baan_id' => 5, 'pakketoptie_id' => 4, 'reserveringsstatus' => 'Bevestigd', 'reserveringsnummer' => '202212280006', 'datum' => '2022-12-28', 'aantaluren' => 2, 'begintijd' => '19:00', 'eindtijd' => '21:00', 'aantalvolwassenen' => 2, 'aantalkinderen' => null],
        ]);
    }
}
