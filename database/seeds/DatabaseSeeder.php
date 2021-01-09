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
                'role'=> 'Super Admin'
            ],
            
            [
                'role'=> 'Bus Admin'
            ],
            
            [
                'role'=> 'Bus Counter'
            ],
            
            [
                'role'=> 'Train Admin'
            ],
            
            [
                'role'=> 'Train Counter'
            ],
            
            [
                'role'=> 'Launch Admin'
            ],
            
            [
                'role'=> 'Launch Counter'
            ],
            
            [
                'role'=> 'Plane Admin'
            ],
            
            [
                'role'=> 'Plane Counter'
            ],
            
            [
                'role'=> 'Passenger'
            ],
            
        ]);


        DB::table('company_types')->insert([

              [
                'name'=> 'Bus',
                'description' => 'Bus Description'
              ],
              [
                'name'=> 'Train',
                'description' => 'Train Description'
              ],
              [
                'name'=> 'launch',
                'description' => 'launch Description'
              ],
              [
                'name'=> 'plane',
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
              'name'=> 'Ena',
              'description' => 'Ena Description',
              'company_type_id' => 1,
            ],
            [
              'name'=> 'hanif',
              'description' => 'hanif Description',
              'company_type_id' => 1,
            ]
        ]);
        
        DB::table('destinations')->insert([

            [
              'name'=> 'habiganj',
              'description' => 'habiganj bus Stand'
            ],
            [
                'name'=> 'Dhaka',
                'description' => 'Dhaka bus Stand'
            ],
        ]);

        DB::table('buses')->insert([

            [
              'name'=> '4400 ph',
              'total_seat' => '40',
              'company_id' => 1
            ],
            [
                'name'=> '3400 ph',
                'total_seat' => '40',
                'company_id' => 1
            ],
              [
                'name'=> '2400 ph',
                'total_seat' => '40',
                'company_id' => 1
              ],
        ]);


        
        DB::table('users')->insert([

            [
              'name'=> 'Super Admin',
              'role_id' => 1,
              'company_id' => 1,
              'counter_id' => 1,
              'email' => 'superadmin@gmail.com',
              'password' => Hash::make('1234'),
            ],
            [
                'name'=> 'Bus Admin',
                'role_id' => 2,
                'company_id' => 1,
                'counter_id' => 1,
                'email' => 'busadmin@gmail.com',
                'password' => Hash::make('1234'),
              ],
              [
                'name'=> 'Bus  Counter',
                'role_id' => 3,
                'company_id' => 1,
                'counter_id' => 1,
                'email' => 'buscounter@gmail.com',
                'password' => Hash::make('1234'),
              ],
        ]);

    }


}
