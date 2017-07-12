<?php
session_start();
require_once '../web_include.php';
$username=$_POST['username'];
$username=addslashes($username);
$password=md5($_POST['password']);
$verify=$_POST['verify'];//接收输入的验证码
$verify1=$_SESSION['verify'];//网站产生的验证码
$autoFlag=$_POST['autoFlag'];
if($verify==$verify1){
    $sql="select * from boke_admin where username='{$username}' and password='{$password}'";
    $row=checkAdmin($sql);
    if($row){
        //如果选了30天内自动登录
        if($autoFlag){
            setcookie("adminId",$row['id'],time()+30*24*3600);
            setcookie("adminName",$row['username'],time()+30*24*3600);
        }
        $_SESSION['adminName']=$row['username'];
        $_SESSION['adminId']=$row['id'];
        alertMes("管理员，你好！","index.php");
    }else{
        alertMes("账号或密码错误，请重新登陆","login.php");
    }
}else{
    alertMes("验证码错误，请重新输入","login.php");
}
