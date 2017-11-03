<?php
/**
 * Created by PhpStorm.
 * User: Wind
 * Date: 2017/11/2
 * Time: 11:24
 */

function autoLoad($class)
{
    if (file_exists(__DIR__ . '/' . $class . '.php')) {
        include __DIR__ . '/' . $class . '.php';
    }
}

spl_autoload_register("autoLoad");