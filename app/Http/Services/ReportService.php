<?php

namespace App\Http\Services;

use App\Http\Interfaces\PhotoServiceInterface;

class ReportService {
    public function __construct(protected PhotoServiceInterface $photoService)
    {
    }

    public function createReport() {
        dump($this->photoService->createPhoto('test'));
        dump('REPORT');
    }
}