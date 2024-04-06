<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $products) {
            $products->id();
            $products->string('name');
            $products->integer('net_pence');
            $products->timestamps();
            $products->softDeletes();
        });

        Schema::create('orders', function (Blueprint $orders) {
            $orders->id();
            $orders->string('order_number');
            $orders->integer('net_pence');
            $orders->timestamps();
            $orders->softDeletes();
        });

        Schema::create('order_lines', function (Blueprint $orderLines) {
            $orderLines->id();
            $orderLines->foreignId('product_id')->constrained()->cascadeOnDelete();
            $orderLines->foreignId('order_id')->constrained()->cascadeOnDelete();
            $orderLines->integer('net_pence');
            $orderLines->integer('quantity');
            $orderLines->string('name');
            $orderLines->timestamps();
            $orderLines->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_lines');
    }
};
