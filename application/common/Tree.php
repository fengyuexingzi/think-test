<?php
/**
 * Created by PhpStorm.
 * User: Wind
 * Date: 2017/10/23
 * Time: 8:42
 */

namespace app\common;


use think\template\TagLib;

class Tree extends TagLib
{
    /**
     * 定义标签列表
     */
    protected $tags = [
        'close' => ['attr' => 'time,format', 'close' => 0],
        'open' => ['attr' => 'name,type', 'close' => 1],
    ];

    /**
     * 闭合标签
     * @param $tag
     * @return string
     */
    public function tagClose($tag)
    {
        $format = empty($tag['format']) ? 'Y-m-d H:i:s' : $tag['format'];
        $time = empty($tag['time']) ? time() : $tag['time'];
        $parse = '<?php ';
        $parse .= 'echo date("' . $format . '",' . $time . ');';
        $parse .= ' ?>';
        return $parse;
    }

    /**
     * 非闭合标签
     * @param $tag
     * @param $content
     */
    public function tagOpen($tag, $content)
    {
        $type = empty($tag['type']) ? 0 : 1;
        $name = $tag['name'];
        $parse = '<?php ';
        $parse .= '$test_arr=[[1,3,5,7,9],[2,4,6,8,10]];';
        $parse .= ' ?>';
        $parse .= '{volist name="__LIST__" id="' . $name . '"}';
        $parse .= $content;
        $parse .= '{/volist}';
        return $parse;
    }
}