<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DiagramController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    $categories = Category::withCount('products')->orderBy('name')->get();
    $featuredProducts = Product::inRandomOrder()->take(4)->get();
    $productCount = Product::count();
    return view('home', compact('categories','featuredProducts','productCount'));
})->name('home');

// Admin pizza reseed action
Route::post('/admin/pizza-reseed', function(){
    Artisan::call('pizza:reseed', ['--force' => true]);
    return redirect()->route('home')->with('status','Pizza adatkészlet újratöltve.');
})->middleware(['auth', \App\Http\Middleware\RoleMiddleware::class . ':admin'])->name('admin.pizza.reseed');

// Contact form & messages
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/messages', [MessageController::class, 'index'])->middleware(['auth'])->name('messages.index');

// Products CRUD (auth required)
Route::middleware(['auth'])->group(function(){
    Route::resource('products', ProductController::class);
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
});

// Diagram page (public or later restricted)
Route::get('/diagram', [DiagramController::class, 'index'])->name('diagram.index');

// Admin dashboard (role: admin)
Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth', \App\Http\Middleware\RoleMiddleware::class . ':admin'])->name('admin.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
