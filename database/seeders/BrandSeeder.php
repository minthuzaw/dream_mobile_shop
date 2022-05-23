<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands =[
            [
                'name' => 'Apple',
            ],
            [
                'name' => 'Samsung',
            ],
            [
                'name' => 'Xiaomi',
            ],
            [
                'name' => 'Asus',
            ],
            [
                'name' => 'Oneplus',
            ],
            [
                'name' => 'Sony',
            ],


        ];
        DB::table('brands')->insert($brands);
    }
}
