<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class PizzaSeeder extends Seeder
{
    /**
     * Seed the database with a pizza shop themed external dataset.
     * Categories map to product groupings, products represent pizzas.
     * Adds a few random sample orders for demonstration.
     */
    public function run(): void
    {
        // Don't reseed if already converted to pizza data
        // Újra futtatható: ha már léteznek a pizza kategóriák, előbb nem törlünk semmit (idempotens hozzáadás elkerülésére)
        $pizzaAlreadySeeded = Category::where('name','Pizza Alapok')->exists();

        // Overwrite existing sample data (optional simple cleanup)
        // NOTE: In a real migration you might truncate tables; keep it non-destructive here.

        $categories = [
            'Pizza Alapok',        // base sauce styles
            'Húsos',               // meat pizzas
            'Vegetáriánus',        // veggie pizzas
            'Extra Sajtos',        // cheese focused
        ];

        $pizzaSets = [
            'Pizza Alapok' => [
                ['Margherita', 2990, 'Paradicsom szósz, mozzarella, bazsalikom'],
                ['Marinara', 2590, 'Paradicsom, fokhagyma, oregánó, olíva']
            ],
            'Húsos' => [
                ['Pepperoni', 3490, 'Paradicsom szósz, mozzarella, pepperoni kolbász'],
                ['Hawaii', 3690, 'Paradicsom szósz, sonka, ananász, sajt'],
                ['BBQ Csirke', 3990, 'BBQ szósz, csirke, hagyma, sajt']
            ],
            'Vegetáriánus' => [
                ['Veggie Delight', 3590, 'Paprika, hagyma, kukorica, olívabogyó, paradicsom'],
                ['Mediterrán', 3890, 'Feta, olíva, szárított paradicsom, rukkola']
            ],
            'Extra Sajtos' => [
                ['Quattro Formaggi', 4290, 'Mozzarella, gorgonzola, parmezán, kecskesajt'],
                ['Cheddar Burst', 4190, 'Cheddar, mozzarella, sajtkrém, oregano']
            ],
        ];

        // Elsődleges kép mapping lokális fájlokra. Ha egy fájl hiányzik, megtartjuk a korábbi image_url-t (lehet data URI).
        // A BBQ Csirke képet tekintjük „jó” referenciának – ha létezik, hiányzó képekhez duplikálható manuálisan.
        $imageMap = [
            'Margherita' => 'images/pizzas/margherita.jpg',
            'Marinara' => 'images/pizzas/marinara.jpg',
            'Pepperoni' => 'images/pizzas/pepperoni.jpg',
            'Hawaii' => 'images/pizzas/hawaii.jpg',
            // Négy korábban duplikált képhez külön SVG placeholder (egyedi vizuális megkülönböztetés)
            'BBQ Csirke' => 'images/pizzas/bbqcsirke.svg',
            'Veggie Delight' => 'images/pizzas/veggie.jpg',
            'Mediterrán' => 'images/pizzas/mediterran.svg',
            'Quattro Formaggi' => 'images/pizzas/quattro.svg',
            'Cheddar Burst' => 'images/pizzas/cheddar.svg',
        ];

        if (!$pizzaAlreadySeeded) {
            foreach ($categories as $catName) {
                $cat = Category::create(['name' => $catName]);
                foreach ($pizzaSets[$catName] as [$name, $price, $desc]) {
                    Product::create([
                        'category_id' => $cat->id,
                        'name' => $name,
                        'price' => $price,
                        'description' => $desc,
                        'image_url' => $imageMap[$name] ?? null,
                    ]);
                }
            }
        }

        // Mindig próbáljuk egységesíteni / frissíteni az image_url mezőt a képlista alapján
        Product::all()->each(function($p) use ($imageMap){
            if (!isset($imageMap[$p->name])) { return; }
            $target = $imageMap[$p->name];
            $fullPath = public_path($target);
            // Ha létezik a lokális fájl és eltér a jelenlegi mező, frissítjük.
            if (file_exists($fullPath) && $p->image_url !== $target) {
                $p->image_url = $target;
                $p->save();
            }
        });

        // Create a couple of sample orders for demonstration (if users exist)
        $user = User::where('email','user@example.com')->first() ?? User::first();
        if ($user) {
            $sampleProducts = Product::inRandomOrder()->take(3)->get();
            foreach ($sampleProducts as $p) {
                $qty = rand(1,3);
                Order::create([
                    'user_id' => $user->id,
                    'product_id' => $p->id,
                    'quantity' => $qty,
                    'total' => $p->price * $qty,
                ]);
            }
        }
    }
}
