<?php
/**
 * Created by PhpStorm.
 * User: Wind
 * Date: 2017/11/1
 * Time: 17:29
 */

namespace king;
class Tools
{
    public static function aes($data, $method = 'encrypt', $key = '', $iv = '')
    {
        $key = $key ?: 'cTFbUKEMWHzP4yeRWpaXZf98NLY902IkxJ4XOuQIq1c=';
        $iv = $iv ?: 'Bqa1wCAKcFwFMsYF';
        if (strcasecmp($method, 'encrypt') === 0) {
            return base64_encode(openssl_encrypt($data, 'aes-128-cbc', $key, OPENSSL_RAW_DATA, $iv));
        } elseif (strcasecmp($method, 'decrypt') === 0) {
            return openssl_decrypt(base64_decode($data), 'aes-128-cbc', $key, OPENSSL_RAW_DATA, $iv);
        } else
            return false;
    }

    public static function uuid()
    {
        return bin2hex(openssl_random_pseudo_bytes(32));
    }
}