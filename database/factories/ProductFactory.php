<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => rand(1, 10),
            'name' => fake()->text(maxNbChars: 20),
            'sku' => strtoupper(Str::random(8)),
            'image' => fake()->imageUrl(),
            'overview' => fake()->text(),
            'description' => fake()->text(),
            'price' => fake()->randomNumber(8)
        ];
    }
}
