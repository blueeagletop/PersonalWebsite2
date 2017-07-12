<?php
session_start();
require_once '../manager_include.php';
$username=$_POST['username'];
$password=md5($_POST['password']);
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
if($verify==$verify1){
    echo "<script>alert('验证码正确');</script>";
}else{
    echo "<script>alert('验证码错误，请重新输入');</script>";
    echo "<script>window.location='login.php';</script>";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>验证码实例</title>
        <style type="text/css">
            body {
                background-color: #FFFFFF;
                margin-left: 0px;
                margin-top: 0px;
                margin-right: 0px;
                margin-bottom: 0px;
            }
        </style>
    </head>

    <body>
        <h1><?php echo "验证码正确，你输入的验证码是：$verify"; ?><br/>开不开心，意不意外？手动滑稽</h1>
    </body>
</html>
