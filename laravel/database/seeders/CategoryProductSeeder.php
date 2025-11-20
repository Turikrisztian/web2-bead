<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class CategoryProductSeeder extends Seeder
{
    public function run(): void
    {
        if (Category::count() > 0) {
            return; // already seeded
        }
        $categories = ['Laptop', 'Telefon', 'Kiegészítő'];
        foreach ($categories as $cName) {
            $cat = Category::create(['name' => $cName]);
            // Simple sample products
            for ($i=1; $i<=3; $i++) {
                Product::create([
                    'category_id' => $cat->id,
                    'name' => $cName.' '.$i,
                    'price' => rand(50, 500) * 1000,
                    'description' => 'Minta termék '.$i.' a(z) '.$cName.' kategóriában.'
                ]);
            }
        }
    }
}