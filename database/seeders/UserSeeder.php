<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'cashier',
                'email' => 'cashier@gmail.com',
                'password' => Hash::make('password'),
                'phone_number' => '09123456789',
                'role' => 'cashier',
            ],
            [
                'name' => 'cashier1',
                'email' => 'cashier1@gmail.com',
                'password' => Hash::make('password'),
                'phone_number' => '09123456789',
                'role' => 'cashier',
            ],
            [
                'name' => 'stocker',
                'email' => 'stocker@gmail.com',
                'password' => Hash::make('password'),
                'phone_number' => '09123456789',
                'role' => 'stocker',
            ],

        ];
        DB::table('users')->insert($users);
    }
}
