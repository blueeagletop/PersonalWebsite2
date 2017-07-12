<?php
require_once '../manager_include.php';

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>蓝鹰飞翔_博客后台</title>
        <link rel="stylesheet" href="styles/backstage.css">
    </head>

    <body>
        <div class="operation_user clearfix">
            <div class="link fr">
                <b>欢迎您
                    <?php
                    if (isset($_SESSION['adminName'])) {
                        echo $_SESSION['adminName'];
                    } elseif (isset($_COOKIE['adminName'])) {
                        echo $_COOKIE['adminName'];
                    }
                    ?>
                </b>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../index.php" class="icon icon_i" target="_blank">首页</a><span></span><a href="#" class="icon icon_j">前进</a><span></span><a href="#" class="icon icon_t">后退</a><span></span><a href="./" class="icon icon_n">刷新</a><span></span><a href="doAdminAction.php?act=logout" class="icon icon_e">退出</a>
            </div>
        </div>
        <div class="content clearfix">
            <div class="main">
                <!--右侧内容-->
                <div class="cont">
                    <!-- 嵌套网页开始 -->         
                    <iframe src="main.php"  frameborder="0" name="mainFrame" width="100%" height="581" ></iframe>
                    <!-- 嵌套网页结束 -->   
                </div>
            </div>
            <!--左侧列表-->
            <div class="menu">
                <div class="cont">
                    <div class="title" style="font-size: 22px;line-height:50px">管理员操作</div>
                    <ul class="mList">
                        <li>
                            <br/>
                            <h3 style="font-size: 26px;line-height:46px"><span onclick="show('menu1', 'change1')" id="change1" style="font-size: 25x;line-height: 30px">+</span>日志管理</h3>
                            <dl id="menu1" style="display:none;">
                                <dd><a href="addLog.php" target="mainFrame" style="font-size: 16px;line-height:26px">添加文章</a></dd>
                                <dd><a href="listLog.php" target="mainFrame" style="font-size: 16px;line-height:26px">日志列表</a></dd>
                            </dl>
                        </li>
                        <li>
                            <h3 style="font-size: 26px;line-height:46px"><span onclick="show('menu2', 'change2')" id="change2" style="font-size: 25px;line-height:30px">+</span>日志分类</h3>
                            <dl id="menu2" style="display:none;">
                                <dd><a href="addCate.php" target="mainFrame" style="font-size: 16px;line-height:26px">添加分类</a></dd>
                                <dd><a href="listCate.php" target="mainFrame" style="font-size: 16px;line-height:26px">分类列表</a></dd>
                            </dl>
                        </li>
                        <li>
                            <h3 style="font-size: 26px;line-height:46px"><span onclick="show('menu4', 'change4')" id="change4" style="font-size: 25px;line-height:30px">+</span>用户管理</h3>
                            <dl id="menu4" style="display:none;">
                                <dd><a href="addAdmin.php" target="mainFrame" style="font-size: 16px;line-height:26px">添加用户</a></dd>
                                <dd><a href="listAdmin.php" target="mainFrame" style="font-size: 16px;line-height:26px">用户列表</a></dd>
                            </dl>
                        </li>
                        <li>
                            <h3 style="font-size: 26px;line-height:46px"><span onclick="show('menu5', 'change5')" id="change5">+</span>留言管理</h3>
                            <dl id="menu5" style="display:none;">
                                <dd><a href="listMessage.php" target="mainFrame" style="font-size: 16px;line-height:26px">留言列表</a></dd>
                            </dl>
                        </li>
                        <li>
                            <h3 style="font-size: 26px;line-height:46px"><span onclick="show('menu6', 'change6')" id="change6">+</span>图片管理</h3>
                            <dl id="menu6" style="display:none;">
                                <dd><a href="listProImages.php" target="mainFrame" style="font-size: 16px;line-height:26px">图片列表</a></dd>
                            </dl>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <script type="text/javascript">
            function show(num, change) {
                var menu = document.getElementById(num);
                var change = document.getElementById(change);
                if (change.innerHTML == "+") {
                    change.innerHTML = "-";
                } else {
                    change.innerHTML = "+";
                }
                if (menu.style.display == 'none') {
                    menu.style.display = '';
                } else {
                    menu.style.display = 'none';
                }
            }
        </script>
    </body>
</html>