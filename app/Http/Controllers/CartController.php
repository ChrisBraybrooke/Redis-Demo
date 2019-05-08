<?php

namespace App\Http\Controllers;

use Faker\Generator as Faker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CartController extends Controller
{
    /**
     * Create the cart controller view and retrieve any items from the session.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sessionId = session()->getId();
        $cartItems = Redis::smembers("{$sessionId}.cart");

        return view('cart.create', ['cartItems' => $cartItems]);
    }

    /**
     * Update cart data in the session.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Faker $faker)
    {
        $sessionId = session()->getId();
        $product = [
            'id' => $faker->uuid,
            'name' => $faker->words(3, true),
            'qty' => mt_rand(1, 4),
            'unit_price' => mt_rand(100, 50000)
        ];

        Redis::sadd("{$sessionId}.cart", json_encode($product));

        return redirect()->back();
    }

    /**
     * Delete a cart line.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $sessionId = session()->getId();
        $foo = Redis::srem("{$sessionId}.cart", -1, $request->item);

        return redirect()->back();
    }
}
