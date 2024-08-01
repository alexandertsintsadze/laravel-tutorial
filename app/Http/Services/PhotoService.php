<?php

namespace App\Http\Services;

use App\Http\Interfaces\PhotoServiceInterface;

class PhotoService implements PhotoServiceInterface {
    public function index() {
        $jobs = [];

        return view('jobs.index', []);
    }



    public function createPhoto($product) {
        return '|_| ' . $product;
    }

    public function compressPhoto($photoPath) {


        return true;
    }
}