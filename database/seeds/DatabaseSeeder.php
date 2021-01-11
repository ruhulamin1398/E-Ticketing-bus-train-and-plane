<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SettingSeeder::class);

        DB::table('roles')->insert([
            [
                'role' => 'Super Admin'
            ],

            [
                'role' => 'Bus Admin'
            ],

            [
                'role' => 'Bus Counter'
            ],

            [
                'role' => 'Train Admin'
            ],

            [
                'role' => 'Train Counter'
            ],

            [
                'role' => 'Launch Admin'
            ],

            [
                'role' => 'Launch Counter'
            ],

            [
                'role' => 'Plane Admin'
            ],

            [
                'role' => 'Plane Counter'
            ],

            [
                'role' => 'Passenger'
            ],

        ]);


        DB::table('company_types')->insert([

            [
                'name' => 'Bus',
                'description' => 'Bus Description'
            ],
            [
                'name' => 'Train',
                'description' => 'Train Description'
            ],
            [
                'name' => 'launch',
                'description' => 'launch Description'
            ],
            [
                'name' => 'plane',
                'description' => 'plane Description'
            ],
        ]);
        DB::table('statuses')->insert([
            [
                'name' => 'Available',
            ],
            [
                'name' => 'pending',
            ],
            [
                'name' => 'Booked',
            ],

        ]);

        DB::table('seats')->insert([
            [
                'name' => 'A1'
            ],
            [
                'name' => 'A2'
            ],
            [
                'name' => 'A3'
            ],
            [
                'name' => 'A4'
            ],
            [
                'name' => 'B1'
            ],
            [
                'name' => 'B2'
            ],
            [
                'name' => 'B3'
            ],
            [
                'name' => 'B4'
            ],
            [
                'name' => 'C1'
            ],
            [
                'name' => 'C2'
            ],
            [
                'name' => 'C3'
            ],
            [
                'name' => 'C4'
            ],
            [
                'name' => 'D1'
            ],
            [
                'name' => 'D2'
            ],
            [
                'name' => 'D3'
            ],
            [
                'name' => 'D4'
            ],
            [
                'name' => 'E1'
            ],
            [
                'name' => 'E2'
            ],
            [
                'name' => 'E3'
            ],
            [
                'name' => 'E4'
            ],
            [
                'name' => 'F1'
            ],
            [
                'name' => 'F2'
            ],
            [
                'name' => 'F3'
            ],
            [
                'name' => 'F4'
            ],
            [
                'name' => 'G1'
            ],
            [
                'name' => 'G2'
            ],
            [
                'name' => 'G3'
            ],
            [
                'name' => 'G4'
            ],
            [
                'name' => 'H1'
            ],
            [
                'name' => 'H2'
            ],
            [
                'name' => 'H3'
            ],
            [
                'name' => 'H4'
            ],
            [
                'name' => 'I1'
            ],
            [
                'name' => 'I2'
            ],
            [
                'name' => 'I3'
            ],
            [
                'name' => 'I4'
            ],
            [
                'name' => 'J1'
            ],
            [
                'name' => 'J2'
            ],
            [
                'name' => 'J3'
            ],
            [
                'name' => 'J4'
            ],
            [
                'name' => 'K1'
            ],
            [
                'name' => 'K2'
            ],
            [
                'name' => 'K3'
            ],
            [
                'name' => 'K4'
            ],
            [
                'name' => 'L1'
            ],
            [
                'name' => 'L2'
            ],
            [
                'name' => 'L3'
            ],
            [
                'name' => 'L4'
            ],


        ]);



        DB::table('companies')->insert([

            [
                'name' => 'Ena Company',
                'description' => 'Ena Description',
                'company_type_id' => 1,
            ],
            [
                'name' => 'hanif Company',
                'description' => 'hanif Description',
                'company_type_id' => 1,
            ],
            [
                'name' => 'Train Company',
                'description' => ' Description',
                'company_type_id' => 2,
            ],
            
            [
                'name' => 'Launch Company',
                'description' => ' Description of lauch',
                'company_type_id' => 3,
            ],
            
            [
                'name' => 'Plane Company',
                'description' => ' Description of train',
                'company_type_id' => 4,
            ]
        ]);

        DB::table('destinations')->insert([

            [
                'name' => 'Sylhet',
                'description' => 'Sylhet Stand'
            ],
            [
                'name' => 'Rangpur',
                'description' => 'Rangpur Stand'
            ],
            [
                'name' => 'Rajshahi ',
                'description' => 'Rajshahi Stand'
            ],
            [
                'name' => 'Khulna ',
                'description' => 'Khulna  Stand'
            ],
            [
                'name' => 'Mymensingh',
                'description' => 'Mymensingh Stand'
            ],
            [
                'name' => 'Dhaka',
                'description' => 'Dhaka Stand'
            ],
            [
                'name' => 'Chittagong ',
                'description' => 'Chittagong Stand'
            ],
            [
                'name' => 'Barishal ',
                'description' => 'Barishal  Stand'
            ],

        ]);

        DB::table('buses')->insert([

            [
                'name' => '4400 ph',
                'total_seat' => '40',
                'company_id' => 1
            ],
            [
                'name' => '3400 ph',
                'total_seat' => '40',
                'company_id' => 1
            ],
            [
                'name' => '2400 ph',
                'total_seat' => '40',
                'company_id' => 1
            ],
        ]);



        DB::table('users')->insert([

            [
                'name' => 'Super Admin',
                'role_id' => 1,
                'company_id' => 1,
                'counter_id' => 1,
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('1234'),
            ],
            [
                'name' => 'Bus Admin',
                'role_id' => 2,
                'company_id' => 1,
                'counter_id' => 1,
                'email' => 'busadmin@gmail.com',
                'password' => Hash::make('1234'),
            ],
            [
                'name' => 'Bus  Counter',
                'role_id' => 3,
                'company_id' => 1,
                'counter_id' => 1,
                'email' => 'buscounter@gmail.com',
                'password' => Hash::make('1234'),
            ],
            [
                'name' => 'train  admin',
                'role_id' => 4,
                'company_id' => 3,
                'counter_id' => 1,
                'email' => 'trainadmin@gmail.com',
                'password' => Hash::make('1234'),
            ],
            [
                'name' => 'train  Counter',
                'role_id' => 5,
                'company_id' => 3,
                'counter_id' => 1,
                'email' => 'traincounter@gmail.com',
                'password' => Hash::make('1234'),
            ],
            [
                'name' => 'launch  Admin',
                'role_id' => 6,
                'company_id' => 4,
                'counter_id' => 1,
                'email' => 'launchadmin@gmail.com',
                'password' => Hash::make('1234'),
            ],
            [
                'name' => 'launch  Counter',
                'role_id' => 7,
                'company_id' => 4,
                'counter_id' => 1,
                'email' => 'launchcounter@gmail.com',
                'password' => Hash::make('1234'),
            ],
            [
                'name' => 'Plane Admin',
                'role_id' => 8,
                'company_id' => 5,
                'counter_id' => 1,
                'email' => 'planeadmin@gmail.com',
                'password' => Hash::make('1234'),
            ],
            [
                'name' => 'Plane counter',
                'role_id' => 9,
                'company_id' => 5,
                'counter_id' => 1,
                'email' => 'planecounter@gmail.com',
                'password' => Hash::make('1234'),
            ],
            
            [
                'name' => 'Passenger',
                'role_id' => 10,
                'company_id' => 5,
                'counter_id' => 1,
                'email' => 'passenger@gmail.com',
                'password' => Hash::make('1234'),
            ],
        ]);

        DB::table('bus_counters')->insert([

            [
                'name' => 'Sylhet',
                'company_id' => 1,
                'destination_id' => 1,

            ],
            [
                'name' => 'Rangpur',
                'company_id' => 1,
                'destination_id' => 2,

            ],
            [
                'name' => 'Rajshahi',
                'company_id' => 1,
                'destination_id' => 3,

            ],
            [
                'name' => 'Khulna',
                'company_id' => 1,
                'destination_id' => 4,

            ],


            [
                'name' => 'Mymensingh',
                'company_id' => 1,
                'destination_id' => 5,

            ],
            [
                'name' => 'Dhaka',
                'company_id' => 1,
                'destination_id' => 6,

            ],
            [
                'name' => 'Chittagong',
                'company_id' => 1,
                'destination_id' => 7,

            ],
            [
                'name' => 'Barishal',
                'company_id' => 1,
                'destination_id' => 8,

            ],

        ]);



        DB::table('tpls')->insert([

            [
                'name' => 'Train (kaloni)',
                'from_destination_id' => 1,
                'to_destination_id' => 4,
                'distance' => 320,
                'time' => 7,
                'company_id' => 3,
            ],
            [
                'name' => 'Launch (Sikdar)',
                'from_destination_id' => 1,
                'to_destination_id' => 4,
                'distance' => 320,
                'time' => 7,
                'company_id' => 4,
            ],
            [
                'name' => 'Plane (BD Biman)',
                'from_destination_id' => 1,
                'to_destination_id' => 4,
                'distance' => 320,
                'time' => 7,
                'company_id' => 5,
            ],

        ]);



        DB::table('tpl_seats')->insert([

            [
                'tpl_id' => 1,
                'seat_type' => 'Ac',
                'total_seat' => 10,
                'cost' => 700,
            ],

            [
                'tpl_id' => 1,
                'seat_type' => 'Non AC',
                'total_seat' => 10,
                'cost' => 500,
            ],

            [
                'tpl_id' => 1,
                'seat_type' => 'Shubon Chair',
                'total_seat' => 10,
                'cost' => 300,
            ],
            
            [
                'tpl_id' => 2,
                'seat_type' => 'Ac',
                'total_seat' => 10,
                'cost' => 700,
            ],

            [
                'tpl_id' => 2,
                'seat_type' => 'Non AC',
                'total_seat' => 10,
                'cost' => 500,
            ],

            [
                'tpl_id' => 2,
                'seat_type' => 'Shubon Chair',
                'total_seat' => 10,
                'cost' => 300,
            ],
            
            [
                'tpl_id' => 3,
                'seat_type' => 'Ac',
                'total_seat' => 10,
                'cost' => 700,
            ],

            [
                'tpl_id' => 3,
                'seat_type' => 'Non AC',
                'total_seat' => 10,
                'cost' => 500,
            ],

            [
                'tpl_id' => 3,
                'seat_type' => 'Shubon Chair',
                'total_seat' => 10,
                'cost' => 300,
            ],


        ]);

    }
}
