<?php
/**
 * Created by PhpStorm.
 * User: Wind
 * Date: 2017/10/27
 * Time: 9:25
 */

namespace app\index\controller;

use app\common\controller\Base;
use think\Url;

class News extends Base
{
    public function read($id)
    {
        $html = "
             <form action= '" . Url::build('/new/5', null, $this->request->ext(), false) . "' method='post'>
             <input type='text' name='name'>
             <input type='text' name='pwd'>
             <input type='submit'>
             </form>
        ";
        echo $html;
        $arr = $this->request->param();
        var_dump($id);
        var_dump($arr);
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            var_dump($_REQUEST);
            die;
        } else {
            echo '无效的请求';
        }
    }
}