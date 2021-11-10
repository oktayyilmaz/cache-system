<?php
/**
 * cache-system - File.php
 * Initial version by: yilmazoktay124@gmail.com
 * Initial version created on: 10.11.2021
 */

namespace Wibesoft\CacheSystem\System\Storage;


use Wibesoft\CacheSystem\Cache\CacheAbstract;
use Wibesoft\CacheSystem\Cache\CacheSystem;
use Wibesoft\CacheSystem\System\Storage\Abstract\Storage;

class File extends CacheAbstract implements Storage
{
    protected $CACHE_DIR = '/opt/lampp/htdocs/cache-system/cache';

    public function put($fileName, $fileContent, $time)
    {

        file_put_contents($this->CACHE_DIR . '/' . $fileName, $fileContent, LOCK_EX);
    }

    public function get($keyName)
    {

        if (file_exists($this->CACHE_DIR . '/' . $keyName)) {
            $get = file_get_contents($this->CACHE_DIR . '/' . $keyName);
            return $get;
        }
        return null;
    }

    public function forget($keyName)
    {
        unlink($this->CACHE_DIR . '/' . $keyName);
    }

    public function flush()
    {
        foreach ($this->fileList($this->CACHE_DIR) as $file) {
            unlink($file);
        }
    }


}