<?php
$item = "BlueEagleFly's boke";
$escaped_item = mysql_escape_string($item);
$addskasges_item=addslashes($item);
echo "不加转义字符:".$item."<br />加转义字符：<br />";
echo "mysql_escape_string:".$escaped_item."<br />";
echo "addskasges:".$addskasges_item;
?>


