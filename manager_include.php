<?php
header("content-type:text/html;charset=utf-8");
session_start();
date_default_timezone_set("PRC");//设置时区，不设置的话在关于时间的函数会报错

//设置环境变量可以少写文件路径，这块有bug不起作用，所以还是要写路径名
define("ROOT", dirname(_FILE_));
set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.get_include_path());

require_once 'lib/mysql.func.php';
require_once 'lib/image.func.php';
require_once 'lib/common.func.php';
require_once 'lib/string.func.php';
require_once 'lib/page.func.php';
require_once 'configs/configs.php';
require_once 'core/manager.inc.php';
require_once 'core/cate.inc.php';
require_once 'core/log.inc.php';
require_once 'core/album.inc.php';
require_once 'lib/upload.func.php';
require_once 'core/message.inc.php';
checkLogined();
connect();