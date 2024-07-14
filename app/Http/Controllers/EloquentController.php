<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class EloquentController extends Controller
{
    public function index() {
        $user = User::find(1);

        return view();
    }
}
