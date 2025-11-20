<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // will create later

class ProductController extends Controller
{
    public function index()
    {
        $products = class_exists(Product::class) ? Product::paginate(12) : collect();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:150',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image_url' => 'nullable|string|max:255', // lehet relatív path vagy teljes URL
        ]);
        if (class_exists(Product::class)) {
            Product::create($data);
        }
        return redirect()->route('products.index')->with('status', 'Termék létrehozva');
    }

    public function show($id)
    {
        $product = class_exists(Product::class) ? Product::findOrFail($id) : null;
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = class_exists(Product::class) ? Product::findOrFail($id) : null;
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:150',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image_url' => 'nullable|string|max:255',
        ]);
        if (class_exists(Product::class)) {
            $product = Product::findOrFail($id);
            $product->update($data);
        }
        return redirect()->route('products.index')->with('status', 'Termék frissítve');
    }

    public function destroy($id)
    {
        if (class_exists(Product::class)) {
            Product::findOrFail($id)->delete();
        }
        return redirect()->route('products.index')->with('status', 'Termék törölve');
    }
}
