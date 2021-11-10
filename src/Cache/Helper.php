<?php
/**
 * cache-system - Helper.php
 * Initial version by: yilmazoktay124@gmail.com
 * Initial version created on: 10.11.2021
 */

namespace Wibesoft\CacheSystem\Cache;


trait Helper
{

    protected function directoryCreate($dirName)
    {
        mkdir($dirName);
    }

    protected function fileList($file){
        return glob($file.'/{.[!.],}*', GLOB_BRACE);
    }

}