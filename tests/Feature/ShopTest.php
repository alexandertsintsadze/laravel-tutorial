<?php

use App\Http\Interfaces\PhotoServiceInterface;
use App\Http\Services\FakePhotoService;
use App\Http\Services\PhotoService;
use App\Models\Product;
use App\Models\User;
use Mockery\MockInterface;

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('it_should_create_product', function () {
    $account = User::factory()->create();
    $this->actingAs($account);

    $response = $this->post('/products', [
        'title' => 'test',
        'description' => 'test',
        'price' => 10,
    ]);

    $response->assertStatus(200);

    $this->assertDatabaseHas('products', ['title' => 'test']);
    $this->assertDatabaseCount('products', 1);
});

test('it_should_show_products', function () {
    $account = User::factory()->create();
    $this->actingAs($account);

    $products = Product::factory()->count(10)->create();
    
    $response = $this->get('/products');
    
    $response->assertStatus(200);

    // $this->assertDatabaseHas('products', ['title' => 'test']);
    $this->assertDatabaseCount('products', 10);
});

test('it_should_show_products1', function () {
    $account = User::factory()->create();
    $this->actingAs($account);

    $this->instance(
        PhotoServiceInterface::class,
        Mockery::mock(PhotoService::class)
    );

    $products = Product::factory()->count(10)->create();
    
    $response = $this->get('/products');
    dump($response);
    
    $response->assertStatus(200);

    // $this->assertDatabaseHas('products', ['title' => 'test']);
    $this->assertDatabaseCount('products', 10);
});
