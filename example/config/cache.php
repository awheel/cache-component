<?php

return [
    // 驱动
    'driver' => 'redis',

    // 过去时间
    'timeout' => 120,

    // 前缀
    'prefix' => 'awheel_prod_',

    // 配置
    'config' => [
        'redis' => [
            'cluster' => false,
            'host' => '127.0.0.1',
            'port' => 6379,
            'db' => 0,
            'password' => null,
            'timeout' => 3
        ],
        'redis-cluster' => [
            'cluster' => true,
            'nodes' => [
                ['host' => '127.0.0.1', 'port' => 6371, 'timeout' => 3],
                ['host' => '127.0.0.1', 'port' => 6372, 'timeout' => 3],
                ['host' => '127.0.0.1', 'port' => 6373, 'timeout' => 3],
            ]
        ],
        'memcached' => [
            'host' => '127.0.0.1',
            'port' => 11211
        ],
        'yac' => []
    ]
];
