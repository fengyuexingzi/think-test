<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

function clearTemp($path)
{
    if (is_null($path)) {
        return;
    }
    $path = realpath($path) . DS;
    $files = scandir($path);
    if ($files) {
        foreach ($files as $file) {
            if ('.' != $file && '..' != $file && is_dir($path . $file)) {
                clearTemp($path . $file);
            } elseif ('.gitignore' != $file && is_file($path . $file)) {
                unlink($path . $file);
            }
        }
    }
}
