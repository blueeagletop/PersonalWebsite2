<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>管理员登陆</title>
        <style type="text/css">
            body {
                background-color: #FFFFFF;
                margin-left: 0px;
                margin-top: 0px;
                margin-right: 0px;
                margin-bottom: 0px;
            }
            li{list-style:none;}
            .login{padding:15px 76px;}
            .l_tit{color:#666; line-height:21px;}
            .login_btn{font-size:20px; }
        </style>
    </head>

    <body>
        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td height="80" bgcolor="#6495ED">
                    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="70%" align="center" valign="middle"><h1>蓝鹰飞翔_BlueEagleFly</h1></td>
                            <td width="1%" align="center" valign="middle"></td>
                            <td width="29%" align="center" valign="middle"><h4>博客后台登陆</h4></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td height="20px">&nbsp;</td>
            </tr>
            <tr>
                <td align="center" valign="middle" bgcolor="#FFFFFF">
                    <table width="350px" height="100px" style="border:1px #CCC solid;" cellpadding="0" cellspacing="0">
                        <tr>
                            <td>
                                <form action="doLogin.php" method="post">
                                    <ul class="login">
                                        <li class="l_tit">管理员帐号</li>
                                        <li class="mb_10"><input type="text"  name="username" placeholder="请输入管理员帐号"class="login_input user_icon" style="width:220px; height: 25px;"/></li>
                                        <li class="l_tit"><br />密码</li>
                                        <li class="mb_10"><input type="password"  name="password" class="login_input password_icon" style="width:220px; height: 25px;"/></li>
                                        <li class="l_tit"><br />验证码</li>
                                        <li class="mb_10"><input type="text"  name="verify" class="login_input password_icon" style="width:220px; height: 25px;"/></li>
                                        <br /><img src="getVerify.php" alt="" />
                                        <li class="autoLogin"><br /><input type="checkbox" id="a1" class="checked" name="autoFlag" value="1"><label for="a1">自动登陆(30天内自动登陆)</label></li>
                                        <li><br /><input type="submit" value="登 录" class="login_btn" style="width:220px; height: 35px;"/></li>
                                    </ul>
                                </form>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td height="20px">&nbsp;</td>
            </tr>
            <tr>
                <td height="0px" bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            <tr align="center" valign="middle" bgcolor="#CCCCCC">
                <td height="80">
                    <table width="380" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>蓝鹰飞翔</td>
                            <td>丨</td>
                            <td>BlueEagleFly</td>
                            <td>丨</td>
                            <td>邮箱：869546851@qq.com</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>