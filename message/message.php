<?php
require_once('../web_include.php');
//分页
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
$sql="select * from message";
$totalRows=getResultNum($sql);
$pageSize=5;
$totalPage=ceil($totalRows/$pageSize);
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;

$sql = "select * from message order by id desc limit {$offset},{$pageSize}";
$query = mysql_query($sql);
if ($query && mysql_num_rows($query)) {
    while ($row = mysql_fetch_assoc($query)) {
        $data[] = $row;
    }
}
$cates = getAllcate();

$rows=fetchAll($sql);
//if(!$rows){
//	alertMes("啊程序出bug了，（错误信息：留言板块的分页模块传来空数据）","../index.php");
//	exit;
//}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>留言信息</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="message.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="wrapper" class="wrapper">
            <!-- start header -->
            <div id="header" class="header">
                <div id="logo" class="logo">
                    <div class="log_class" >

                    </div>
                </div>
            </div>
            <!-- end header -->
        </div>

        <!-- start page -->
        <div id="page" class="page">
            <!-- start content -->
            <div id="content" class="content">
                <?php
                if (empty($data)) {
                    echo "当前没有留言";
                } else {
                    foreach ($data as $value) {
                        ?>
                        <div class="post">
                            <h1 class="title"><?php echo '&nbsp;&nbsp;'.$value['title'] ?><span style="color:#878787;font-size:12px;letter-spacing:1px;">　　
                                    <!--作者|联系方式--><br />&nbsp;&nbsp;&nbsp;&nbsp;name:<?php echo $value['name'].'&nbsp;&nbsp;' ?>|<?php echo '&nbsp;&nbsp;email:'.substr($value['email'],0,5).'***@***.com' ?></span></h1>
                            <div class="entry">
                                <?php echo $value['info'] ?>
                                
                            </div>
       <br /><br />
                        </div>
                
                        <hr style="height:1px;border:none;border-top:1px dashed #434343;" />
                        <br />
                        <?php
                    }
                }
                ?>
            </div>
            <!-- end content -->
            <div style="clear: both; left: 50px;">
                            <?php if($totalRows>$pageSize):?>
                            <tr>
                            	<td><?php echo showPage($page, $totalPage);?></td>
                            </tr>
                            <?php endif;?>
            </div>
        </div>
        <!-- end page -->
    </body>
</html>