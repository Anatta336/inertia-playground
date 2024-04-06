<?php

namespace Database\Factories\Products\Models;

use App\Products\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->words(
                $this->faker->numberBetween(1, 3),
                true,
            ),
            'net_pence' => $this->faker->numberBetween(100, 10000),
        ];
    }
}
