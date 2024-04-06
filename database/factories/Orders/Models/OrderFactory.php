<?php

namespace Database\Factories\Orders\Models;

use App\Orders\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'order_number' => 'TEST-'.$this->faker->unique()->randomNumber(5),
            'net_pence' => $this->faker->numberBetween(100, 10000),
        ];
    }
}
