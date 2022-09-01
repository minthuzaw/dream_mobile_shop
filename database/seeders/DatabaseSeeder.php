<?php

namespace Database\Seeders;

use App\Models\User;
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
            $this->call([
                AdminSeeder::class,
                UserSeeder::class,
                CategorySeeder::class,
                BrandSeeder::class,
                PhoneSeeder::class,
            ]);
        }

        //User::factory(10)->create();
    }
}
