<?php
/**
 * cache-system - Cache.php
 * Initial version by: yilmazoktay124@gmail.com
 * Initial version created on: 10.11.2021
 */

namespace Wibesoft\CacheSystem\Cache;
/**
 * @method static mixed get(string $key, mixed $default = null)
 * @method static mixed put(string $key, mixed $value, $second)
 * @method static void forget(string $key)
 * @method static void flush()
 * @method static void forever(string $key, mixed $value)
 */
class Cache
{

    public static function store($store)
    {
        return new CacheSystem($store);
    }

    public static function __callStatic(string $name, array $arguments)
    {
        return (new CacheSystem())->{$name}($arguments);
    }

}