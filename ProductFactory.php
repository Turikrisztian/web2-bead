<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Category;

/** @extends Factory<Product> */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'category_id' => Category::query()->inRandomOrder()->value('id') ?? Category::factory()->create()->id,
            'name' => $this->faker->unique()->words(2, true),
            'price' => $this->faker->numberBetween(1000, 50000),
            'description' => $this->faker->sentence(),
        ];
    }
}
