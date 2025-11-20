<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

class PizzaReseed extends Command
{
    protected $signature = 'pizza:reseed {--force : Run even if pizza categories exist}';
    protected $description = 'Truncate pizza related tables and reseed the pizza dataset (Categories, Products, sample Orders)';

    public function handle(): int
    {
        $already = Category::where('name','Pizza Alapok')->exists();
        if ($already && !$this->option('force')) {
            $this->info('Pizza dataset already present. Use --force to reseed.');
            return Command::SUCCESS;
        }

        $this->comment('Disabling foreign key constraints...');
        Schema::disableForeignKeyConstraints();

        $this->comment('Truncating orders, products, categories...');
        Order::truncate();
        Product::truncate();
        Category::truncate();

        Schema::enableForeignKeyConstraints();

        $this->comment('Running PizzaSeeder...');
        $this->call('db:seed', ['--class' => 'Database\\Seeders\\PizzaSeeder']);

        $count = Product::count();
        $this->info("Reseed complete. Products: {$count}");
        return Command::SUCCESS;
    }
}
