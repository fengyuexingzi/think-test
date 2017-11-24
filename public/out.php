<?php
/**
 * Created by PhpStorm.
 * User: Wind
 * Date: 2017/11/24
 * Time: 9:18
 */
if (isset($_REQUEST['id']) && $_REQUEST['id'] == 3)
{
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=abc.txt");
    header("X-Sendfile: d:/file/file1.txt");
    exit;
}
?>
<h1>Permission denied</h1>
<p>Login first!</p>