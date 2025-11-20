<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Optional test users
        // User::factory(5)->create();

    // Admin user
    $this->call(AdminUserSeeder::class);
    // Eltávolítva az elektronikai minta seeded, hogy a pizza adatkészlet legyen az elsődleges
    // $this->call(CategoryProductSeeder::class);
    $this->call(PizzaSeeder::class); // pizza shop dataset

        // Sample regular user
        User::firstOrCreate([
            'email' => 'user@example.com'
        ], [
            'name' => 'Felhasználó',
            'password' => bcrypt('User12345'),
            'role' => 'user'
        ]);
    }
}
