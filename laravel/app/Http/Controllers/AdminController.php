<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Message;
use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => User::count(),
            'products' => Product::count(),
            'categories' => Category::count(),
            'messages' => Message::count(),
            'orders' => Order::count(),
            'orders_today' => Order::whereDate('created_at', now())->count(),
            'income_total' => Order::sum('total'),
        ];
        $recentMessages = Message::latest()->take(5)->get();
        $recentOrders = Order::latest()->with(['product','user'])->take(5)->get();
        $recentProducts = Product::latest()->take(5)->get();
        $topProducts = Product::withCount('orders')->orderByDesc('orders_count')->take(5)->get();
        $topCategories = Category::withCount('products')->orderByDesc('products_count')->take(5)->get();

        return view('admin.index', compact(
            'stats',
            'recentMessages',
            'recentOrders',
            'recentProducts',
            'topProducts',
            'topCategories'
        ));
    }
}
