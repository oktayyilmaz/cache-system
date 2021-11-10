<?php
/**
 * cache-system - CacheAbstract.php
 * Initial version by: yilmazoktay124@gmail.com
 * Initial version created on: 10.11.2021
 */

namespace Wibesoft\CacheSystem\Cache;


abstract class CacheAbstract
{
    use Serialize;
    use Helper;


    public function putSerialize($key, $value, $second)
    {
        $fileName = $this->keySerialize($key);
        if ($this->get($fileName) != null) {
            $this->removeCache($key);
        }

        $time = time() + $second;
        if ($second == null) {
            $time = null;
        }
        $fileContent = $this->serialize($value, $time);
        $this->put($fileName, $fileContent, $time);
        return $value;
    }

    public function getSerialize($key, $default)
    {
        $fileName = $this->keySerialize($key);
        $content = $this->get($fileName);
        if ($content != null) {
            $value = $this->unserialize($content);
            if (isset($value['timer']) && $value['timer'] != null && $value['timer'] < time()) {
                $this->removeCache($key);
            }
            return $value['value'];
        }
        return $default;
    }

    public function removeCache($key)
    {
        $fileName = $this->keySerialize($key);
        $this->forget($fileName);
    }

    public function allRemoveCache()
    {
        $this->flush();
    }

    public function forever($key, $value)
    {
        return $this->putSerialize($key, $value, null);
    }


}