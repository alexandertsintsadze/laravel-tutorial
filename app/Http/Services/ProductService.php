<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProductService {
    public function fetchProductsFromMainDatabase() {
        dump('fetching...');
        $response = Http::get('https://dummyjson.com/product?limit=2');
        if ($response->failed()) {
            Log::info('Failed to obtain data from main database');
            return false;
        }
        $data = $response->json();
        $products = collect($data['products']);
        $products = $products->map(fn ($product) => $product['title'] );
        dump($products);
        return true;
    }

    
    public function sendProductSoldEventToAccountingSoftware() {
        $response = Http::acceptJson()
            ->withToken('123123')
            ->post('localhost:8000/test', [
            'product_id' => 1,
            'quantity' => 2
        ]);
    }

    public function itShouldRemoveCharacterAFromText($text) {
        return str_replace('a', '', $text);
    }
}