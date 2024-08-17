<?php

namespace App\Http\Services;

use App\Http\Interfaces\PhotoServiceInterface;

class PhotoCloudService implements PhotoServiceInterface {
    public function index() {
    }

    public function createPhoto($product) {
        // upload photo to photocloud./process/image
        return 'CLOUD ' . $product;
    }

    public function compressPhoto($photoPath) {
        // upload photo to photocloud./compress/image


        return true;
    }
}