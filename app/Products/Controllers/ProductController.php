<?php

namespace App\Products\Controllers;

use App\Base\Controllers\Controller;
use App\Products\Models\Product;
use App\Products\Requests\ProductListRequest;
use Inertia\Inertia;

/**
 * Controller for working with products.
 */
class ProductController extends Controller
{
    /**
     * List products in a datatable with support for pagination, sorting, and searching.
     */
    public function index(ProductListRequest $request)
    {
        $productQuery = Product::query();

        $productQuery->orderBy($request->sort(), 'asc');

        if (!empty($request->search())) {
            $productQuery->where('name', 'like', '%' . $request->search() . '%');
        }

        $totalCount = $productQuery->count();

        $productQuery->offset(($request->page() - 1) * $request->perPage());
        $productQuery->limit($request->perPage());

        $products = $productQuery->get();

        return Inertia::render('Products/List', [
            'products'   => $products,
            'totalCount' => $totalCount,
            'page'       => (int) $request->page(),
        ]);
    }
}