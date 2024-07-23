<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index() {
        session(['name' => 'test']);
    }

    public function testIndex() {
        dump(session('name'));
    }
}
