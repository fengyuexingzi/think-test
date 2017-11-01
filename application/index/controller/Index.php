<?php

namespace app\index\controller;

use app\common\controller\Base;

class Index extends Base
{
    public function index()
    {
        /**
         * getcwd()
         *
         */

        /*
         var_dump(getcwd());
        var_dump($_SERVER['PHP_SELF']);
        var_dump($_SERVER['DOCUMENT_ROOT']);
        var_dump(__DIR__);
        var_dump($_SERVER['SCRIPT_NAME']);
        */


        $this->assign('__LIST__', [1, 2, 3]);
        $this->assign('demo_time', $this->request->time());
        $this->assign('demo_name', 'king');
        $this->assign('key', 'demo');
        return $this->fetch();
    }

    public function tree()
    {
        $arr = [];
        $arr1 = [];
        $arr2 = [];
        $arr3 = ['king'=>'best'];
        //$arr = array_merge($arr1, $arr2, $arr3);
        var_dump($arr);
    }

    public function hello()
    {
        var_dump(input());
        if ($this->request->isAjax()) {
            var_dump($this->request);
            echo '<br/>';
        }
        return json_encode($this->request->method());
    }
}
