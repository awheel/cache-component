<?php

namespace awheel\CacheComponent;

use awheel\Component;

class CacheComponent implements Component
{
    /**
     * 组件访问器
     *
     * @return mixed
     */
    public function getAccessor()
    {
        return 'cache';
    }

    /**
     * 组件注册方法
     *
     * @return mixed
     */
    public function register()
    {
        return function () {
            $config = app()->configGet('cache');
            if (!$config) return null;

            return new Cache($config);
        };
    }
}
