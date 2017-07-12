<?php
require_once '../web_include.php';
session_start();
$act = $_REQUEST['act'];
$id = $_REQUEST['id'];

$verify = $_POST['ip'];
$verify1 = $_SESSION['verify'];

if($verify==$verify1){
    $mes = addMessage();
}else{
    echo "<script>alert('验证码错误，请重新输入');</script>";
    echo "<script>window.location='addMessage.php';</script>";
}


function addMessage() {
    $arr = $_POST;
    $arr['time_at'] = time();
if (insert("message", $arr)) {
        $mes = "成功添加留言!<br/><a href='addMessage.php'>继续添加留言</a>&nbsp;|&nbsp;<a href='index.php'>查看留言</a>";
    } else {
        $mes = "留言失败!<br/><a href='addMessage.php'>重新添加&nbsp;|&nbsp;<a href='index.php'>查看留言</a></a>";
    }
    return $mes;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Insert title here</title>
    </head>
    <body>
<?php
if ($mes) {
    echo $mes;
}
?>
    </body>
</html>