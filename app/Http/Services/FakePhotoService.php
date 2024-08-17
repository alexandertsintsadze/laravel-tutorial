<?php

namespace App\Http\Services;

use App\Http\Interfaces\PhotoServiceInterface;

class FakePhotoService implements PhotoServiceInterface {
    public function index() {
    }
    public function createPhoto($product) {
        return '/photo/ararsebobsss.webp';
    }

    public function compressPhoto($photoPath) {
        return true;
    }
}