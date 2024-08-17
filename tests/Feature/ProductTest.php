<?php

use App\Models\Product;
use App\Models\User;
use Database\Factories\UserFactory;

test('it_should_create_product', function () {
    $response = $this->post('/products', [
        'title' => 'test',
        'description' => 'test',
        'price' => 10.20
    ]);

    $this->assertDatabaseCount('products', 1);
    $this->assertDatabaseHas('products', [
        'title' => 'test',
        'price' => 1020
    ]);

    $response->assertStatus(200);
});

test('it_should_not_create_product_if_price_is_text', function () {
    $response = $this->post('/products', [
        'title' => 'test',
        'description' => 'test',
        'price' => "ae"
    ]);

    $this->assertDatabaseCount('products', 0);

    $response->assertStatus(302);
});


test('it_should_delete_product', function () {
    Product::factory()->create();
    $product = Product::factory()->create();

    $response = $this->delete('products/' . $product->id);

    $this->assertDatabaseCount('products', 2);

    // $this->assertDatabaseMissing('products', [
    //     'id' => $product->id
    // ]);

    // $this->assertModelMissing($product);

    $this->assertSoftDeleted($product);
});


test('it_should_edit_product', function () {
    $product = Product::factory()->create();

    $response = $this->put('products/' . $product->id, [
        'title' => 'aeeee',
        'price' => 10
    ]);

    // $response->assertStatus(302);
    $response->assertRedirectToRoute('products.index');

    $this->assertDatabaseHas('products', [
        'title' => 'aeeee',
        'price' => 1000
    ]);
});

test('it_shows_products', function () {

    $account = User::factory()->create();
    $this->actingAs($account);

    $products = Product::factory()->count(10)->create();
    $products->first()->delete();

    $response = $this->get('/products-test');

    $response->assertJsonIsObject();

    $response->assertJsonStructure([
        'products' => [
            '*' => [
                'title',
                'price'
            ]
        ]
    ]);

    $response->assertStatus(200);

    $response->assertJsonCount(9, 'products');
});