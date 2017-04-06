<?php

namespace App\Controller;

use light\Routing\Controller;

/**
 * Class HomeController
 *
 * @package App\Controller
 */
class HomeController extends Controller
{
    /**
     * cache test
     *
     * @return array
     */
    public function cache()
    {
        $key = 'cache_test';
        $set = app('cache')->set($key, time(), 10);
        $get = app('cache')->get($key);

        return [$key, $set, $get];
    }
}
