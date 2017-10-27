<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;


//Route::rule(['new','new/:id'],'index/News/read');
//Route::rule('/new/:k', 'index/News/read/','GET');
//Route::rule('/new/:k', 'index/News/update/','POST');

return [
    'new/:id' => [
        //'News/read?status=1&app_id=5',
        'News/read',
        ['method' => 'get|post','ext' => 'shtml'],
        ['id' => '\w+'],
    ],
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]' => [
        ':id' => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];

