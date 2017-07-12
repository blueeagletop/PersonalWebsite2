<?php
require_once '../manager_include.php';
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <title>蓝鹰飞翔_网站后台</title>
        <link href="css/common.css" rel="stylesheet" type="text/css" />
    </head>
    <body id="bg">

        <div class="container">
            <!--右侧内容-->
            <div class="cont">
                <!-- 嵌套网页开始 -->         
                <iframe src="main.php"  frameborder="0" name="mainFrame" style="width: 100%;height: 100%"></iframe>
                <!-- 嵌套网页结束 -->   
            </div>
          
            <div class="menus_area" id="menus_area">
                <div style="width: 100%;height: 64px;text-align: center;font-size: 14px;line-height: 30px;background-color: #5690D2;color: #fff;">
                    欢迎您
                    <?php
                    if (isset($_SESSION['adminName'])) {
                        echo $_SESSION['adminName'];
                    } elseif (isset($_COOKIE['adminName'])) {
                        echo $_COOKIE['adminName'];
                    }
                    ?>
                    <br>
                        <a href="../index.php" class="icon icon_i" target="_blank"><img src="./images/icon/i.png">首页</a>&nbsp;&nbsp;<a href="./"><img src="./images/icon/n.png">刷新</a>&nbsp;&nbsp;<a href="doAdminAction.php?act=logout"><img src="./images/icon/e.png">退出</a>
                </div>
                <div class="line"></div>
                <dl class="system_log">
                    <dt>日志管理</dt>
                    <dd class="first_dd"><a href="addLog.php" target="mainFrame">添加文章</a></dd>
                    <dd><a href="listLog.php" target="mainFrame">文章列表</a></dd>
                </dl>
                <dl class="custom">
                    <dt>日志分类</dt>
                    <dd class="first_dd"><a href="addCate.php" target="mainFrame">添加分类</a></dd>
                    <dd><a href="listCate.php" target="mainFrame">分类列表</a></dd>
                </dl>
                <dl class="custom">
                    <dt>留言管理</dt>
                    <dd class="first_dd"><a href="listMessage.php" target="mainFrame">留言列表</a></dd>
                </dl>
                <dl class="custom">
                    <dt>用户管理</dt>
                    <dd class="first_dd"><a href="addAdmin.php" target="mainFrame">添加用户</a></dd>
                    <dd><a href="listAdmin.php" target="mainFrame">用户列表</a></dd>
                </dl>
            </div>

        </div>


        <script type="text/javascript" src="js/jquery.js"></script> 
        <script type="text/javascript">

            $(function () {
                $("#menus_area").find("dt").click(function () { //一级菜单点击
                    if (!$(this).hasClass("on")) { //当前一级菜单不选中状态才切换
                        $("#menus_area").find("dt").removeClass("on");//所有的一级菜单去除选中样式
                        $(this).addClass("on");//当前一级菜单去除选中样式
                        $('dd').slideUp();//所有二级菜单隐藏
                        $(this).nextAll('dd').slideToggle();//当前所有二级菜单切换
                    }
                });
            })
        </script>
        <div style="text-align:center;">
        </div>
    </body>
</html>