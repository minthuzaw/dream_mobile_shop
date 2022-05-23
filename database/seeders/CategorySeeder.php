<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Gaming',
            ],
            [
                'name' => 'Flagship',
            ],
            [
                'name' => 'Low-end',
            ],
            [
                'name' => 'High-end',
            ],
            [
                'name' => 'Mid-range',
            ],
            [
                'name' => 'Apple',
            ],
            [
                'name' => 'Fast-charging',
            ],
            [
                'name' => 'Amoled',
            ],
            [
                'name' => 'Type-C',
            ],
            [
                'name' => '64GB',
            ],
            [
                'name' => '128GB',
            ],
            [
                'name' => '256GB',
            ],
            [
                'name' => '512GB',
            ],
            [
                'name' => 'Ram 6GB',
            ],
            [
                'name' => 'Ram 8GB',
            ],
            [
                'name' => 'Ram 12GB',
            ],
            [
                'name' => '6+ Inches',
            ],
            [
                'name' => '5.5 Inches',
            ]
        ];
        DB::table('categories')->insert($categories);

    }
}
