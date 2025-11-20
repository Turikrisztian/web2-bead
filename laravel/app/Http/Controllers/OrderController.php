<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);
        $product = Product::findOrFail($data['product_id']);
        $total = $product->price * $data['quantity'];
        Order::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => $data['quantity'],
            'total' => $total,
        ]);
        return redirect()->route('products.show', $product)->with('status', 'Rendelés létrehozva');
    }
}
