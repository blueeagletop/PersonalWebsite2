<?php
header("Content-Type: text/html; charset=UTF-8");  
if (isset($_POST["username"]))  
{  
    echo "留言用户：" . $_POST["username"] . "<br/><br/>";  
}   
if (isset($_POST["products"]))  
{  
    if (is_array($_POST["products"]) && !empty($_POST["products"]))  
    {  
        echo "内容类别：" . "";  
        foreach ($_POST["products"] as  $value ) {  
            echo  "$value <br /><br />";  
        }  
    }  
}  
if (isset($_POST["message"]))  
{  
    echo "留言内容：" . $_POST["message"] . "<br>";  
}  
//表单如果以POST提交，那么获取内容是就用$_POST["control_name"];  
//表单如果以GET提交，那么获取内容就用$_GET["control_name"];  
 ?>   
