<?php

namespace App\Http\Interfaces;

interface PhotoServiceInterface {
    public function createPhoto($product);

    public function compressPhoto(string $photoPath);

    public function index();
}