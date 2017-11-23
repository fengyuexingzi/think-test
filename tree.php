<?php
/**
 * Created by PhpStorm.
 * User: Wind
 * Date: 2017/10/25
 * Time: 13:46
 */

$arr = [
    ['id'=>1,'title'=>'first','pid'=>0,'level'=>1],
    ['id'=>2,'title'=>'second','pid'=>0,'level'=>1],
    ['id'=>3,'title'=>'third','pid'=>1,'level'=>2],
    ['id'=>4,'title'=>'fourth','pid'=>1,'level'=>2],
    ['id'=>5,'title'=>'fifth','pid'=>2,'level'=>2],
    ['id'=>6,'title'=>'sixth','pid'=>3,'level'=>3],
    ['id'=>7,'title'=>'seventh','pid'=>6,'level'=>4],
    ['id'=>8,'title'=>'seventh','pid'=>7,'level'=>5],
    ['id'=>9,'title'=>'seventh','pid'=>8,'level'=>6],
    ['id'=>10,'title'=>'seventh','pid'=>8,'level'=>6],
    ['id'=>11,'title'=>'seventh','pid'=>8,'level'=>6],
];

function tree($arr, $pid = 0, $level = 1){
    $child = [];
    foreach($arr as $v){
        // $child:孩子 $v:孩子的孩子 $childNodes:孩子的孩子的孩子，也就是说，在这个函数里，要处理子孙三代
        if($v['pid'] == $pid){ 	// 得到子节点后递归得到子节点的子节点
            $childNodes = tree($arr, $v['id'], $level + 1);  // get childNodes's childNodes
            if($childNodes){
                $v['child'] = $childNodes;
                $v['level'] = $level;
            }
            $child[] = $v;	// $v is $child's child
        }
    }
    return $child;
}

$tree = tree($arr,0);

function html($tree, $level = 0){
    $str = '<ul>';
    foreach($tree as $v){
        if(isset($v['child'])){
            $str .= "<li level=\"{$v['level']}\">{$v['title']}<ul>";
            $str .= html($v['child']);
            $str .= "</ul></li>";
        }else{
            $str .= "<li level=\"{$v['level']}\">{$v['title']}</li>";
        }
    }
    return $str .= '</ul>';
}

html($tree);

die;
function file_tree($directory)
{
    $mydir = dir($directory);
    echo "<ul>\n";
    while ($file = $mydir->read()) {
        if ($directory == '/') {
            $child = $directory . $file;
        } else {
            $child = "$directory/$file";
        }
        if ((is_dir($child)) AND ($file != ".") AND ($file != "..") AND ($file != '$RECYCLE.BIN') AND ($file != 'System Volume Information')) {
            var_dump("directory: " . $child);
            echo "<li><font color=\"#ff00cc\"><b>$file</b></font></li>\n";
            file_tree($child);
        } else
            echo "<li>$file</li>\n";
    }
    echo "</ul>\n";
    $mydir->close();
}

function getChmod($filepath)
{
    return substr(base_convert(@fileperms($filepath), 10, 8), -4);
}

$dirs = file_tree('/');

var_dump($dirs);

var_dump(is_writable('/test'));

$perms = getChmod('/test/');
var_dump(fileperms('/test'));

var_dump(scandir('/'));
var_dump($_SERVER['DOCUMENT_ROOT']);
chdir('d:/www');
var_dump(scandir('/'));
echo getcwd();



