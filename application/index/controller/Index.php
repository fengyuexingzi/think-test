<?php

namespace app\index\controller;

use app\common\controller\Base;

class Index extends Base
{
    public function index()
    {
        $this->assign('__LIST__', [1, 2, 3]);
        $this->assign('demo_time', $this->request->time());
        $this->assign('demo_name', 'king');
        $this->assign('key', 'demo');
        return $this->fetch();
    }
}
