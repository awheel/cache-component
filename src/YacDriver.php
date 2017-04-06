<?php

namespace awheel\CacheComponent;

use Yac;

class YacDriver implements InterfaceDriver
{
    /**
     * @var Yac
     */
    public $driver;

    /**
     * 构造函数
     *
     * @param $config
     */
    public function __construct(array $config)
    {
        $this->driver = new Yac();

        return $this;
    }

    /**
     * 添加一个缓存, 只有当 key 对应的 value 没有设置时才进行设置, 否则返回 false
     *
     * @param $key
     * @param $value
     * @param $second
     *
     * @return mixed
     */
    public function add($key, $value, $second)
    {
        if ($this->has($key)) {
            return false;
        }

        return $this->set($key, $value, $second);
    }

    /**
     * 设置一个缓存, 当 key 对应的 value 已经存在时, 会覆盖, 并更新过期时间
     *
     * @param $key
     * @param $value
     * @param $second
     *
     * @return mixed
     */
    public function set($key, $value, $second)
    {
        return $this->driver->set($key, $value, $second);
    }

    /**
     * 获取一个缓存的 value
     *
     * @param $key
     * @param null $default
     *
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return $this->driver->get($key);
    }

    /**
     * 拉取一个缓存 key 对应的 value, 拉取后对应的 value 会消失
     *
     * @param $key
     * @param $default
     *
     * @return mixed
     */
    public function pull($key, $default)
    {
        $value = $this->get($key, $default);

        $this->remove($key);

        return $value;
    }

    /**
     * 一次获取多个 key 对应的缓存 value
     *
     * @param $keys
     *
     * @return mixed
     */
    public function multiGet($keys)
    {
        return $this->get($keys);
    }

    /**
     * 移除一个缓存对应的 value
     *
     * @param $key
     *
     * @return mixed
     */
    public function remove($key)
    {
        return $this->driver->delete($key);
    }

    /**
     * 一次移除多个缓存对应的 value
     *
     * @param $keys
     *
     * @return mixed
     */
    public function multiRemove($keys)
    {
        return $this->remove($keys);
    }

    /**
     * 判断一个缓存 key 是否有对应的 value
     *
     * @param $key
     *
     * @return bool
     */
    public function has($key)
    {
        return (bool) $this->driver->get($key);
    }

    /**
     * 永久的储存一个 key 对应的 value
     *
     * @param $key
     * @param $value
     *
     * @return mixed
     */
    public function forever($key, $value)
    {
        return $this->driver->set($key, $value);
    }

    /**
     * 让缓存 key 对应的 value 数值自增
     *
     * @param $key
     * @param int $value
     *
     * @return mixed
     */
    public function increment($key, $value = 1)
    {
        $value = $this->get($key, 0);

        return $this->set($key, intval($value) + 1, 0);
    }

    /**
     * 让缓存 key 对应的 value 数值自减
     *
     * @param  $key
     * @param  $value
     *
     * @return mixed
     */
    public function decrement($key, $value = 1)
    {
        $value = $this->get($key, 0);

        return $this->set($key, intval($value) - 1, 0);
    }
}
