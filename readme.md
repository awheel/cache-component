Cache Component
====

Cache Component for Awheel

## configure


## usage

````

app('cache')->add($cacheKey, $value, $ttl);
app('cache')->set($cacheKey, $value, $ttl);
app('cache')->get($cacheKey, $default);
app('cache')->destory($cacheKey, $default);
app('cache')->forever($cacheKey, $default);

....

````
