<?php
header("content-type:text/html;charset=utf-8");
session_start();

//设置环境变量可以少写文件路径，这块有bug不起作用，所以还是要写路径名
//define("ROOT", dirname(_FILE_));
//set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.get_include_path());


require_once 'lib/image.func.php';
require_once 'lib/string.func.php';
