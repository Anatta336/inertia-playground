<?php

namespace Database\Factories\Orders\Models;

use App\Orders\Models\Order;
use App\Orders\Models\OrderLine;
use App\Products\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderLineFactory extends Factory
{
    protected $model = OrderLine::class;

    public function definition(): array
    {
        return [
            'order_id' => Order::inRandomOrder()->first()->getKey(),
            'product_id' => Product::inRandomOrder()->first()->getKey(),
            'quantity' => $this->faker->boolean(50)
                ? $this->faker->numberBetween(1, 10)
                : 1,
            'net_pence' => function (array $attributes) {
                $isMatchingProduct = $this->faker->boolean(75);
                $product = Product::find($attributes['product_id']);

                if ($isMatchingProduct && $product) {
                    return $product->net_pence * ($attributes['quantity'] ?? 1);
                }

                return $this->faker->numberBetween(100, 50000);
            },
            'name' => function (array $attributes) {
                return Product::find($attributes['product_id'])?->name
                    ?? $this->faker->word;
            },
        ];
    }
}
