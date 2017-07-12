<!doctype html>
<html lang="zh">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>蓝鹰飞翔的个人博客</title>
  <link rel="stylesheet" href="../boke/css/indexStyle.css">
  <script type="text/javascript" src="../boke/js/jquery.min.js"></script>
  <script type="text/javascript" src="../boke/js/menu.js"></script>
  <script type="text/javascript" src="../boke/js/iframeHeight.js"></script>
  <script type="text/javascript" src="../boke/js/jquery.js"></script>
  <script type="text/javascript" src="../boke/js/toTop.js"></script><!-- 回到顶部 -->
</head>
<body>
<div id="pgcontainer">
  <header>
    <div id="navbar">
        <a href="#" class="menubtn" style="left: -52px">导航</a>
      <!-- use captain icon for toggle menu -->
      <div id="hamburgermenu">
        <ul>
          <li><a href="http://www.blueeaglefly.com">首页</a></li>
          <li><a href="../boke/"><img src="../images/boke.png" style="width: 30px;"><br/>博客</a></li>
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
    <div id="content" style="top: -52px">
                                  <form method="get" action="addMessage.php" style="position: absolute;margin:0px;display:inline;left: 65px;">
                                      <input type="submit" id="11" name="allKey" style="font-size:20px;height: 38px;" value=" 添加留言 ";/>
                        </form>
          <h1 style="font-size: xx-large;font-weight: bold;">留言及建议</h1>
          <br /><hr /><br /><br />
      <iframe src="./message.php" style="width: 100%;border: 0px;" scrolling="no" id="iframeId" onload="this.height=100"></iframe>
	  </div>
</div><!-- @end #pgcontainer -->
</body>
</html>