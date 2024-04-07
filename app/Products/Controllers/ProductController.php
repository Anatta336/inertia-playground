<?php

namespace App\Products\Controllers;

use App\Base\Controllers\Controller;
use App\Products\Models\Product;
use Inertia\Inertia;

/**
 * Controller for working with products.
 */
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return Inertia::render('Products/List', [
            'products' => $products
        ]);
    }
}