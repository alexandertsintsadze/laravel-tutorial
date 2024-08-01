<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Animal;

class Cat extends Animal {
    public $name;

    public function __construct($name123)
    {
        $this->name = $name123;
    }

    public static function meow() {
        dump('Meooooooooooooow');
    }

    public function moyeviShenze() {
        dump('saxeli: ' . $this->name);
    }
}