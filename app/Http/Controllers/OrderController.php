<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $user = User::with('order', 'order.orderProducts', 'order.orderProducts.product')->find(1);

        return view('orders.index', ['account' => $user]);
    }
}
