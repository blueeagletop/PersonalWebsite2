<?php  
$keywords = $_GET['keywords'];
?>
<!doctype html>
<html lang="zh">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html">
        <title>蓝鹰飞翔的个人博客</title>
        <link rel="stylesheet" href="css/indexStyle.css">
        <link rel="stylesheet" type="text/css" href="css/search-form.css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/menu.js"></script>
        <script type="text/javascript" src="js/iframeHeight.js"></script><!-- 自动获取更新iframe高度 -->
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/toTop.js"></script><!-- 回到顶部 -->
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="js/search.js"></script><!-- 动态搜索按钮 -->
    </head>
    <body>
        <div id="pgcontainer">
            <header>
                <div id="navbar">
                    <form onsubmit="submitFn(this, event);" method="get">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="请输入你要搜索的内容" />
                            <button class="search-icon" onclick="searchToggle(this, event);"><span></span></button>
                        </div>
                        <span type="submit" class="close" target="mainFrame" onclick="searchToggle(this, event);"></span>
                        <div class="result-container">
                        </div>
                    </div>
                </form>
                    <a href="#" class="menubtn" style="left: -52px">导航</a>
                    <!-- use captain icon for toggle menu -->
                    <div id="hamburgermenu">
                        <ul>
                            <li><a href="http://www.blueeaglefly.com">首页</a></li>
                            <li><a href="./"><img src="../images/boke.png" style="width: 30px;"><br/>博客</a></li>
                            <li><a href="../project/"><img src="../images/project.png" style="width: 30px"><br/>项目</a></li>
                            <li><a href="../message/"><img src="../images/message.png" style="width: 30px"><br/>留言</a></li>
                        </ul>
                    </div>
                </div>
                <div class="overlay"></div>
            </header>
            
            <div id="share">    
                <a id="totop" title="">返回顶部</a>
            </div>
            <div class="bokeHeader">
                <img src="./img/portrait.png" style="width: 150px;right: 0px"><br/><a style="font-weight: bold;color: #fff">蓝鹰飞翔_BlueEagleFly</a>
                <p style="font-size: large;">目前，我正在努力成为一名PHP全栈工程师。如果一定要在这地方写一句宣言，那我会说：生命不息，追梦不止。</p>
            </div>
            <br />
            <div id="content">
                <iframe src="./titleSearch.php?keywords=<?php echo $keywords;?>" name="mainFrame" style="width: 100%;border: 0px;" scrolling="no" id="iframeId" onload="this.height = 100"></iframe>
            </div>
        </div>
    </body>
</html>