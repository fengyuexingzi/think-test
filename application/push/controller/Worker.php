<?php
namespace app\push\controller;

use king\worker\Server;

class Worker extends Server
{
    protected $socket = 'websocket://127.0.0.1:7272';

    /**
     * 收到消息
     * @param $connection
     * @param $data
     */
    public function onMessage($connection, $data)
    {
        $connection->send('我收到你的信息了');
    }

    /**
     * 连接时触发的回调函数
     * @param $connection
     */
    public function onConnect($connection)
    {
        file_put_contents('d:/msg','error',FILE_APPEND);
    }

    /**
     * 当客户端的连接发生错误时触发
     * @param $connection
     * @param $code
     * @param $msg
     */
    public function onClose($connection, $code, $msg)
    {
        echo "error $code $msg\n";
    }

    /**
     * 每个进程启动
     * @param $worker
     */
    public function onWorkerStart($worker)
    {

    }
}