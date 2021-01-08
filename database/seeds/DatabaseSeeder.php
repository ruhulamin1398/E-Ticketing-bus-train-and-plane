<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

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
    }


}
