<?php

namespace App\Http\Controllers;

use App\Events\CartLineAdded;
use App\Jobs\ProcessCartLineAddition;
use Faker\Generator as Faker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CartLineController extends Controller
{
    /**
     * Store a new line in the cart.
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

        // Add to the set using SADD
        Redis::sadd("{$sessionId}.cart", json_encode($product));

        // Dispatch a job
        // dispatch(new ProcessCartLineAddition($product));

        // Fire an event
        event(new CartLineAdded($product));

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
