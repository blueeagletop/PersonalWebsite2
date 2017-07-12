<!doctype html>
<html lang="zh">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>蓝鹰飞翔的个人博客</title>
  <link rel="stylesheet" href="../boke/css/indexStyle.css">
  <script type="text/javascript" src="../boke/js/jquery.min.js"></script>
  <script type="text/javascript" src="../boke/js/menu.js"></script>
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
  <div id="content" style="top: -52px">
                        <form method="get" action="index.php" style="position: absolute;margin:0px;display:inline;left: 65px;">
                            <input type="submit" id="11" name="allKey" style="font-size:20px;height: 38px;" value=" 查看留言 ";/>
                        </form>
                        <form method="get" action="addMessage.php" style="position: absolute;margin:0px;display:inline;left: 190px;">
                            <input type="submit" id="11" name="allKey" style="font-size:20px;height: 38px;" value=" 刷 新 ";/>
                        </form>
          <h1 style="font-size: xx-large;font-weight: bold;">留言及建议</h1>
          <p>请勿恶意刷屏，谢谢！</p>
          <br /><hr /><br /><br />

                    <form action="doAction.php?act=addMessage" method="post" >
                        <table width="100%" border="1" cellpadding="15" cellspacing="0" bgcolor="#cccccc">
                            <tr>
                                <td>
                                    <p style="left: 120px;width: 900px;font-size: large">留言标题：<input type="text" name="title" placeholder=" 给你的留言起个合适的标题吧" style="width:70%;font-size: large"/></p>
                                    <hr>
                                    <p style="left: 120px;top:230px;width: 266px;font-size: large">留言内容：</p>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="info" id="editor_id" style="width:66%;height:150px;font-size: large;" placeholder=" 请勿灌水或恶意刷屏 ♪(^∇^*)世界这么美好，快出去逛逛吧"></textarea></p>
                                    <p></p>
                                    <p style="font-size:large;">你的名字：<input type="text" name="name" style="font-size:large;" placeholder="请输入你的名字"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;你的邮箱：<input type="text" name="email"  placeholder="留下联系方式说不定博主会联系你哟" style="width:320px;font-size:large;"/></p>
                                    <p style="font-size: medium">(留言页不会显示完整的邮箱信息，请不用担心被除博主以外的人骚扰 ← v ←手动滑稽)</p>
                                    <!--                    <form id="form5" name="form5" method="post" action="doLogin.php">-->
                                    <hr><br />
                                    <!--                                    <label for="verify"></label>-->
                                    <p> <input type="text" name="ip" size="30" style="width:100px; height: 25px;"placeholder="请输入验证码"/>
                                        <img src="../manager/getVerify.php" style="vertical-align:middle"/></p>
                 <!--                      <input type="submit" name="login" id="login" value="提交验证码" style="width:225px; height: 30px;font-size:18px;font-weight:bold;" />-->
                                    <!--                                            </form>-->
                                    <p><input type="submit"  value="提交留言" style="width:125px; height: 35px;font-size:18px;font-weight:bold;"/></p>
                                </td>
                            </tr>
                        </table>
                    </form>
	  </div>
</div><!-- @end #pgcontainer -->
</body>
</html>