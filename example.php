<?php
require ('./vendor/autoload.php');
use \Wibesoft\CacheSystem\Cache\Cache;
if (Cache::store('file')->get('aa.912') == null){
    $value =  [
        'key' => 'value',
        'key2' => 'key3'
    ];
    $cache = Cache::store('file')->put('ipid.182.234.123',$value,42);
}

