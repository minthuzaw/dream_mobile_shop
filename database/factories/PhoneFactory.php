<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Phone>
 */
class PhoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'model' => $this->faker->regexify('[A-Z]{1}[a-z]{4}[0-9]{4}'),
            'name' => $this->faker->word(),
            'stock' => $this->faker->randomDigitNotNull(),
            'brand_id' => Brand::all()->random()->id,
            'image' => Str::random(10),
            'unit_price' => $this->faker->randomFloat(2, 0, 100),
            'user_id' => User::all()->random()->id,
            'description' => $this->faker->text(),
        ];
    }
}
