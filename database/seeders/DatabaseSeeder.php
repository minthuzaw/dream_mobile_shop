<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Phone;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment() === 'production') {
            $this->call([AdminSeeder::class]);
        } else {
            Phone::factory(100)->create();
            Brand::factory(10)->create();
            $this->call([
                AdminSeeder::class,
                UserSeeder::class,
            ]);
        }


        //User::factory(10)->create();

    }
}
