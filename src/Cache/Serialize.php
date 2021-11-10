<?php
/**
 * cache-system - Serialize.php
 * Initial version by: yilmazoktay124@gmail.com
 * Initial version created on: 10.11.2021
 */

namespace Wibesoft\CacheSystem\Cache;


trait Serialize
{
    protected function serialize($value,$timer)
    {
        if ($timer != null){
            $timer = time()+$timer;
        }
        return serialize(['value' => $value,'timer'=> $timer]);
    }
    protected function keySerialize($key){
        return crc32($key);
    }

    protected function unserialize($value){
        return unserialize($value);
    }

}