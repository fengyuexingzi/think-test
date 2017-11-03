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
    'login'
);

$posts = array(
    'login'
);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (in_array($action, $gets)) {
        echo 'get';
        a_login('15612341234', '123456');
    } else {
        die('40001');
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo 'post';
} else {
    'ajax';
}

function a_login($username, $password)
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