<?php
namespace app\admin\controller;

class Index
{
    public function index()
    {
    }

    public function _empty($name)
    {
        $auth =  new \tp5auth\auth\Auth();
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
        //return abort(404,'页面不存在');
    }
}
