<?php
/**
 * Created by PhpStorm.
 * User: Wind
 * Date: 2017/10/31
 * Time: 10:24
 */

require_once './extend/autoload.php';

require '/common.inc.php';
require DT_ROOT . '/include/post.func.php';


$gets = array(
    'sell'
);

$posts = array(
    'login'
);

init($gets, $posts);

function init($gets, $posts)
{
    //无方法名拒绝请求
    if (!isset($_GET['action'])) {
        die('无效的请求');
    }
    //为防止方法冲突，所有方法追加前缀: k_
    $k_action = 'k_' . $_GET['action'];
    // get 请求
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (in_array($_GET['action'], $gets)) {
            $k_action();
        } else {
            die("没有该方法");
        }
    }
    // post 请求
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (in_array($_GET['action'], $posts)) {
            $k_action();
        } else {
            die("没有该方法");
        }
    }
}

function k_login($username, $password)
{
    $username = trim($username);
    $password = trim($password);
    if (strlen($username) < 3) {
        message('login_msg_username');
    }
    if (strlen($password) < 5) {
        message('login_msg_password');
    }
    if (is_email($username)) {
        die('email');
    }
    error_reporting(E_ALL);
    $resultUser = $GLOBALS['db']->query("SELECT `username`,`passport`,`password`,`passsalt` FROM {$GLOBALS['DT_PRE']}member WHERE '$username' IN (`username`,`mobile`,`email`)");
    if (mysql_num_rows($resultUser) > 0) {
        while ($user = mysql_fetch_assoc($resultUser)) {
            if ($user['password'] == dpassword($password, $user['passsalt'])) {
                var_dump($user['password']);
                echo 'find';
            } else {
                continue;
            }
        }
    }
    $GLOBALS['db']->query("UPDATE {$GLOBALS['DT_PRE']}_memeber SET loginip='{$GLOBALS['DT_IP']}',logintime={$GLOBALS['DT_TIME']},logintimes=logintimes+1 WHERE userid={$user['userid']}");
    return $user;
}

function k_sell()
{
    $categories = $GLOBALS['db']->query("SELECT * FROM {$GLOBALS['DT_PRE']}category where moduleid=5 ");
    if (!$categories) {
        var_dump(mysql_error());
    }
    $data = [];
    if (mysql_num_rows($categories) > 0) {
        while ($category = mysql_fetch_assoc($categories)) {
            $data[] = $category;
        }
    }
    var_dump($data);
}