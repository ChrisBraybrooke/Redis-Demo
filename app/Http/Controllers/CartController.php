<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CartController extends Controller
{
    /**
     * Create the cart controller view and retrieve any items from the session.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $sessionId = session()->getId();
        $cartItems = Redis::smembers("{$sessionId}.cart");

        return view('cart.create', ['cartItems' => $cartItems]);
    }
}
