<?php
/**
 * Created by PhpStorm.
 * User: Wind
 * Date: 2017/11/25
 * Time: 13:33
 */

namespace app\admin\controller;

use think\Controller;
use tp5auth\Auth as TAuth;

class Auth extends Controller
{
    public function _empty($name)
    {
        $auth =  new TAuth();
        $auth = $auth->autoload($name);
        if($auth){
            if(isset($auth['code'])){
                return json($auth);
            }elseif(isset($auth['file'])){
                return $auth['file'];
            }
            $this->view->engine->layout(false);
            return $this->fetch($auth[0],$auth[1]);
        }
        return abort(404,'页面不存在');
    }
}