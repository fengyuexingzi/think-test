<?php
/**
 * Created by PhpStorm.
 * User: Wind
 * Date: 2017/10/28
 * Time: 10:49
 */

//url 必须以 '/' 或 调用的file.suffix结尾，否则curl报301错误
$url = 'http://localhost/think/public/index.php';

$data = [
    'name' => 'king',
    'pwd' => '123456'
];
$data = http_build_query($data);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json;charset=utf-8',
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$result = curl_exec($ch);
if ($result === false) {
    echo 'curlError: ' . curl_error($ch);
} else {
    echo $result;
}
curl_close($ch);