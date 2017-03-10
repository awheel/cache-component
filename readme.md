Cache Component
====

Cache Component for light

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

## 提示

1. Yac 无法获取 key 剩余时间, 也没有提供自增自减接口
2. YacDriver 采取手动方式自增自建可能导致 key 不过期, 和值不精确(无锁)
 
