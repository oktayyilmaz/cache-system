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

$response =  Cache::store('file')->put('Key','value',200);
$response =  Cache::store('file')->put('aa.912','dasdasdas',2400);
$response =  Cache::store('file')->get('aa.912','sdasd');
Cache::store('file')->forget('aa.912');
Cache::store('file')->flush();
$response = Cache::store('file')->forever('name23','dasdasd');
$response =  Cache::store('file')->get('name23');