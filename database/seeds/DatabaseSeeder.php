<?php

use Illuminate\Database\Seeder;
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
        // $this->call(UsersTableSeeder::class);




        DB::table('roles')->insert([
            [
                'role' => 'counter',
                'description' => 'counter'
            ],
            [
                'role' => 'passenger',
                'description' => 'passenger'
            ],

        ]);



        DB::table('users')->insert([
            [
                'name' => 'sourov',
                'role_id' => 1,
                'email' => 'sourov@gmail.com',
                'phone' => '01840000408',
                'password' => Hash::make(1234)
            ],

            [
                'name' => 'passenger',
                'role_id' => 1,
                'email' => 'passenger@gmail.com',
                'phone' => '01840000401',
                'password' => Hash::make(1234)
            ],
            [
                'name' => 'ruhul',
                'role_id' => 1,
                'email' => 'ruhul.ok@gmail.com',
                'phone' => '01840000405',
                'password' => Hash::make(1116430725)
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


        ]);

        
        DB::table('statuses')->insert([
            [
                'name' => 'Available',
                'description' => 'Not Buy Yet'
            ],
            [
                'name' => 'pending',
                'description' => 'Requested but not payment yet'
            ],
            [
                'name' => 'Booked',
                'description' => 'Some already one buy this ticket'
            ],

        ]);
        
        DB::table('counters')->insert([
            [
                'name' => 'Sylhet',
                'description' => 'kodomtali Bus Stand'
            ],
            [
                'name' => 'Sayedabad',
                'description' => 'Sayedabad Bus Stand, Dhaka '
            ],
            [
                'name' => 'Mohakai',
                'description' => 'Sayedabad Bus Stand, Dhaka '
            ],


        ]);


        
        DB::table('roads')->insert([

            [
                'from_counter_id' => 1,
                'to_counter_id' => 2,
                'distance' => '300',
                'cost' => 475
            ],



        ]);











    }
}
