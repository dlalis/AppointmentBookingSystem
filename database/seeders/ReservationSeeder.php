<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Seeder;

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
            'res_date' =>  now(),
            'user_id' => random_int(1,2)
        ]);
        Reservation::create([
            'first_name' => 'Thanasis',
            'last_name' => 'Lalis',
            'email' => 'thanasislalis@gmail.com',
            'tel_number' => '6980308311',
            'res_date' =>  now(),
            'user_id' => random_int(1,2)
        ]);
        Reservation::create([
            'first_name' => 'Giwrgos',
            'last_name' => 'Lalis',
            'email' => 'gwirgoslalis@gmail.com',
            'tel_number' => '6980308312',
            'res_date' =>  now(),
            'user_id' => random_int(1,2)
        ]);
        Reservation::create([
            'first_name' => 'Kwstas',
            'last_name' => 'Lalis',
            'email' => 'kwstaslalis@gmail.com',
            'tel_number' => '6980308313',
            'res_date' =>  now(),
            'user_id' => random_int(1,2)
        ]);
        Reservation::create([
            'first_name' => 'Maria',
            'last_name' => 'Lali',
            'email' => 'marialali@gmail.com',
            'tel_number' => '6980308314',
            'res_date' =>  now(),
            'user_id' => random_int(1,2)
        ]);
        Reservation::create([
            'first_name' => 'Dimitra',
            'last_name' => 'Lalis',
            'email' => 'dimitralali@gmail.com',
            'tel_number' => '6980308315',
            'res_date' =>  now(),
            'user_id' => random_int(1,2)
        ]);
        Reservation::create([
            'first_name' => 'Elena',
            'last_name' => 'Lali',
            'email' => 'elenalali@gmail.com',
            'tel_number' => '6980308316',
            'res_date' =>  now(),
            'user_id' => random_int(1,2)
        ]);
        Reservation::create([
            'first_name' => 'Katerina',
            'last_name' => 'Lali',
            'email' => 'katerinalali@gmail.com',
            'tel_number' => '6980308317',
            'res_date' =>  now(),
            'user_id' => random_int(1,2)
        ]);
        Reservation::create([
            'first_name' => 'Athina',
            'last_name' => 'Lali',
            'email' => 'athinalali@gmail.com',
            'tel_number' => '6980308318',
            'res_date' =>  now(),
            'user_id' => random_int(1,2)
        ]);
        Reservation::create([
        'first_name' => 'Xristina',
        'last_name' => 'Lali',
        'email' => 'xristinalali@gmail.com',
        'tel_number' => '6980308319',
        'res_date' =>  now(),
        'user_id' => random_int(1,2)
    ]);
    }
}
