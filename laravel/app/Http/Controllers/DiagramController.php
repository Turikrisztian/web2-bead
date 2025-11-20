<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

class DiagramController extends Controller
{
    public function index()
    {
        // Aggregate: products per category
        $categoryData = Category::withCount('products')->get();
        $labels = $categoryData->pluck('name')->toArray();
        $values = $categoryData->pluck('products_count')->toArray();

        // Fallback if empty
        if (empty($labels)) {
            $labels = ['Nincs'];
            $values = [0];
        }

        $stats = [
            'labels' => $labels,
            'values' => $values,
            'orders' => [
                'count' => Order::count(),
                'total' => Order::sum('total'),
            ],
        ];
        return view('diagram.index', compact('stats'));
    }
}
