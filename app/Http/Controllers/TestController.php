<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function show(): View
    {
        $products = [
            [
                'name' => 'product 1',
                'price' => 100
            ],
            [
                'name' => 'product 2',
                'price' => 200
            ],
        ];

        return view('about', [
            'satestoTeqsti' => 'asdasd',
            'produqtebi' => $products
        ]);
    }

    public function collectionSatesto() {

        // $array = ['elem 1', 'elem 2'];

        // $koleqcia = collect($array);

        // $koleqcia->push('elem 3');

        // dump($koleqcia->count());

        // $koleqcia->dump();

        // $ricxvebi = collect([1, 20, 2, 3, 10]);

        // $ricxvebi = $ricxvebi->sort();

        // dump($ricxvebi);

        // dump($ricxvebi);

        // for ($i = 0; $i < 3; $i++) {
        //     dump($ricxvebi[$i] * 2);
        // }

        // $axaliMasivi = $ricxvebi->each(function ($ricxvi) {
        //     return $ricxvi * 2;
        // });

        // $ricxvebiAkvadratebuli = $ricxvebi->take(3)->map(function ($value) {
        //     return 'ხაჭაპური' . $value;
        // });

        // $ricxvebi->dump();
        // $ricxvebiAkvadratebuli->dump();
        
        // $ricxvebi->transform(function ($value) {
        //     return 'ხაჭაპური' . $value;
        // });

        // $ricxvebi->dump();


        // $axaliMasivi = [];
        // foreach ($ricxvebi as $key=>$value) {
        //     if ($key > 3) {
        //     array_push($axaliMasivi, 'ხაჭაპური'.$value);
        // }
        // }

        // $ricxvebiAkvadratebuli[0];

        // $ricxvebiAkvadratebuli->first();

        $products = [
            [
                'id' => 1,
                'title' => [
                    'ka' => 'სათაური',
                    'en' => 'title'
                ],
                'description' => '',
                'price' => 100,
            ],
            [
                'id' => 2,
                'title' => [
                    'ka' => 'სათაური 2',
                    'en' => 'title 2'
                ],
                'description' => 'description',
                'price' => 200,
            ],
            [
                'id' => 3,
                'title' => [
                    'ka' => 'სათაური 3',
                    'en' => 'title 3'
                ],
                'description' => 'description',
                'price' => 300,
            ],
            [
                'id' => 3,
                'title' => [
                    'ka' => 'სათაური 4',
                    'en' => 'title 4'
                ],
                'description' => 'description',
                'price' => 400,
            ],
        ];

        $products = collect($products);

        // $ids = $products->pluck('title.ka');
        // dump($ids);

        // dump($products->toJson());

        $dzvirianiProducti = $products->firstWhere(function ($product) {
            return $product['price'] === 200;
        });

        dump($dzvirianiProducti);


        $expensiveProducts = $products->filter(fn ($product) => $product['price'] >= 200);

        dump($expensiveProducts);
    }
    
    public function sheinaxeBazashiProductebi(array $products) {

    }
}
