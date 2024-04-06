<?php

namespace Database\Seeders;

use App\Orders\Models\Order;
use App\Orders\Models\OrderLine;
use App\Orders\Services\TotalCalculator;
use App\Products\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed some products and orders.
     */
    public function run(): void
    {
        $this->withoutModelEvents(function () {
            $this->seed();
        })();
    }

    protected function seed(): void
    {
        Product::factory()->count(15)->create();

        for ($i = 0; $i < 500; $i++) {
            $order = Order::factory()->create();

            OrderLine::factory()->count(
                random_int(1, 10),
            )->create([
                'order_id' => $order->getKey(),
            ]);

            $order->net_pence = TotalCalculator::calculate($order->orderLines);

            $order->save();
        }
    }
}
