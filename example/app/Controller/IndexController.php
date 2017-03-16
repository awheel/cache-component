<?php

namespace App\Controller;

use light\Routing\Controller;

class TestController extends Controller
{
    public function index()
    {
        return __CLASS__;
    }

    public function cache()
    {
        $key = 'cache_test';
        $set = app('cache')->set($key, time(), 10);
        $get = app('cache')->get($key);

        return [$key, $set, $get];
    }
}
