<?php

use App\Http\Services\ProductService;

test('example', function () {
    $text = 'satesto teqsti';
    $value = app(ProductService::class)->itShouldRemoveCharacterAFromText($text);

    $this->assertEquals($value, 'stesto teqsti');
});
