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
}
