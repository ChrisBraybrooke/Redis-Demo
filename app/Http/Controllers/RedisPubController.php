<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedisPubController extends Controller
{
    public function __invoke()
    {
        return 'done';
    }
}
