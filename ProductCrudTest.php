<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductCrudTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate');
        $this->seed();
    }

    public function test_product_index_requires_auth(): void
    {
        $this->get(route('products.index'))->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_create_product(): void
    {
        $user = User::first();
        $response = $this->actingAs($user)->post(route('products.store'), [
            'name' => 'Teszt Termék',
            'price' => 12345,
            'description' => 'Leírás'
        ]);
        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseHas('products', ['name' => 'Teszt Termék']);
    }

    public function test_order_creation(): void
    {
        $user = User::first();
        $product = Product::factory()->create(['price' => 1000]);
        $response = $this->actingAs($user)->post(route('orders.store'), [
            'product_id' => $product->id,
            'quantity' => 2,
        ]);
        $response->assertRedirect(route('products.show', $product));
        $this->assertDatabaseHas('orders', ['product_id' => $product->id, 'quantity' => 2, 'total' => 2000]);
    }
}
