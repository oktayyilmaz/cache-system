<?php
/**
 * cache-system - CacheSystem.php
 * Initial version by: yilmazoktay124@gmail.com
 * Initial version created on: 10.11.2021
 */

namespace Wibesoft\CacheSystem\Cache;


use Wibesoft\CacheSystem\System\Storage\File;

class CacheSystem extends CacheCore
{

    protected $store;

    public function __construct($store = 'file')
    {
        $this->store = (new File());
    }

    /**
     * @param string $key
     * @param mixed $default
     * @return mixed|string
     */
    public function get(string $key, mixed $default = null)
    {
        return  $this->store->getSerialize($key,$default);
    }

    public function put(string $key, mixed $value, $second)
    {
        return $this->store->putSerialize($key,$value,$second);
    }

    public function forget (string $key){
         $this->store->removeCache($key);
    }
    public function flush(){
         $this->store->allRemoveCache();
    }

    public function forever(string $key,mixed $value){
      return  $this->store->forever($key,$value);
    }


}