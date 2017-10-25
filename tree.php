<?php
/**
 * Created by PhpStorm.
 * User: Wind
 * Date: 2017/10/25
 * Time: 13:46
 */


$test_data = [
    ['id' => 0, 'name' => 'A'],
    ['id' => 1, 'name' => 'a', 'pid' => 0],
    ['id' => 2, 'name' => 'b', 'pid' => 1],
    ['id' => 3, 'name' => 'c', 'pid' => 1],
    ['id' => 4, 'name' => 'd', 'pid' => 5],
    ['id' => 5, 'name' => 'e', 'pid' => 0],
    ['id' => 6, 'name' => 'e', 'pid' => 4],
];
function m_tree($arr, $pid = 0)
{
    $tree = [];
    foreach ($arr as $t) {
        if ($t['id'] == $pid) {
            $tree = $t;
        }
    }
    foreach ($arr as $child) {
        if (isset($child['pid']) && $child['pid'] == $tree['id']) {
            $tree['child'][] = $child;
        }
    }
   foreach ($tree as $k1 => $v1) {
        if (is_array($v1)) {
            foreach ($v1 as $k2 => $v2) {
               $tree['child'][$k2] = m_tree($arr, $v2['id']);
            }
        }
    }
    return $tree;
}

echo '<pre>';
print_r(m_tree($test_data));
echo '</pre>';
die;

function tree($directory)
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
            tree($child);
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

$dirs = tree('/');

var_dump($dirs);

var_dump(is_writable('/test'));

$perms = getChmod('/test/');
var_dump(fileperms('/test'));

var_dump(scandir('/'));
var_dump($_SERVER['DOCUMENT_ROOT']);
chdir('d:/www');
var_dump(scandir('/'));
echo getcwd();



