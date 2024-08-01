<?php

namespace App\Http\Services2;

use App\Http\Interfaces\TestServiceInterface;

class TestService2 implements TestServiceInterface {
    public function __construct(protected TestSecondService $testSecondService) {
        dump('construct');
    }

    public function test() {
        $this->testSecondService->test();
    }
}