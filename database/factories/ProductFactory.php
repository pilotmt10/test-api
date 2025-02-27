<?php

namespace Database\Factories;

use App\Domain\Product\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => fake()->text(20),
            'price' => fake()->numberBetween(1000, 10000),
            'active' => true,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
