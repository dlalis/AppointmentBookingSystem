<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reservation::create([
            'first_name' => 'Dimitris',
            'last_name' => 'Lalis',
            'email' => 'dhmhtrhslalhs98@gmail.com',
            'tel_number' => '6980308310',
            'res_date' => Carbon::create(2023, 12, 31, 10, 0, 0),
            'user_id' => random_int(1,2)
        ]);
        Reservation::create([
            'first_name' => 'Thanasis',
            'last_name' => 'Lalis',
            'email' => 'thanasislalis@gmail.com',
            'tel_number' => '6980308311',
            'res_date' =>  Carbon::create(2023, 12, 31, 11, 0, 0),
            'user_id' => random_int(1,2)
        ]);
        Reservation::create([
            'first_name' => 'Giwrgos',
            'last_name' => 'Lalis',
            'email' => 'giwrgoslalis@gmail.com',
            'tel_number' => '6980308312',
            'res_date' =>  Carbon::create(2023, 12, 31, 12, 0, 0),
            'user_id' => random_int(1,2)
        ]);
        Reservation::create([
            'first_name' => 'Kwstas',
            'last_name' => 'Lalis',
            'email' => 'kwstaslalis@gmail.com',
            'tel_number' => '6980308313',
            'res_date' =>  Carbon::create(2023, 12, 31, 13, 0, 0),
            'user_id' => random_int(1,2)
        ]);
        Reservation::create([
            'first_name' => 'Maria',
            'last_name' => 'Lali',
            'email' => 'marialali@gmail.com',
            'tel_number' => '6980308314',
            'res_date' =>  Carbon::create(2023, 12, 31, 14, 0, 0),
            'user_id' => random_int(1,2)
        ]);
        Reservation::create([
            'first_name' => 'Dimitra',
            'last_name' => 'Lalis',
            'email' => 'dimitralali@gmail.com',
            'tel_number' => '6980308315',
            'res_date' => Carbon::create(2023, 12, 31, 15, 0, 0),
            'user_id' => random_int(1,2)
        ]);
        Reservation::create([
            'first_name' => 'Elena',
            'last_name' => 'Lali',
            'email' => 'elenalali@gmail.com',
            'tel_number' => '6980308316',
            'res_date' =>  Carbon::create(2023, 12, 31, 16, 0, 0),
            'user_id' => random_int(1,2)
        ]);
        Reservation::create([
            'first_name' => 'Katerina',
            'last_name' => 'Lali',
            'email' => 'katerinalali@gmail.com',
            'tel_number' => '6980308317',
            'res_date' =>  Carbon::create(2023, 12, 31, 17, 0, 0),
            'user_id' => random_int(1,2)
        ]);
        Reservation::create([
            'first_name' => 'Athina',
            'last_name' => 'Lali',
            'email' => 'athinalali@gmail.com',
            'tel_number' => '6980308318',
            'res_date' =>  Carbon::create(2023, 12, 31, 18, 0, 0),
            'user_id' => random_int(1,2)
        ]);
        Reservation::create([
        'first_name' => 'Xristina',
        'last_name' => 'Lali',
        'email' => 'xristinalali@gmail.com',
        'tel_number' => '6980308319',
        'res_date' =>  Carbon::create(2023, 12, 31, 19, 0, 0),
        'user_id' => random_int(1,2)
    ]);
    }
}
