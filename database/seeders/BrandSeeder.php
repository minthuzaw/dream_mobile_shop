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
                'name' => 'samsung',
                'image' => 'https://picsum.photos/200/300',
            ],
            [
                'name' => 'apple',
                'image' => 'https://picsum.photos/200/300',
            ],

        ];
        DB::table('brands')->insert($brands);
    }
}
