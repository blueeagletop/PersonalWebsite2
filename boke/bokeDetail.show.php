<?php
require_once('../web_include.php');
$id = intval($_GET['id']);
$sql = "select p.id,p.jName,p.jCase,p.jNote,p.jDetail,p.jTime,p.jTime2,p.cId,c.cName,c.id from boke_log as p join boke_class c on p.cId=c.id where p.id=$id";
$query = mysql_query($sql);
if ($query && mysql_num_rows($query)) {
    $row = mysql_fetch_assoc($query);
} else {
    echo "这篇文章不存在";
    exit;
}
$cates = getAllcate();
?>
<!doctype html>
<html lang="zh">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>文章详情</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <header class="header">
            <nav class="navigation">
                <div class="wrapper">
                    <ul class="navigation-list ul-reset">
                        <li class="navigation-item ib">
                            <a href="bokeTitle.php" class="navigation-link" style="ext-decoration: none;">
                                全部文章
                            </a>
                        </li>
                                <?php foreach ($cates as $cate): ?>
                            <li class="navigation-item ib">
                                <a href="bokeClassTitle.php?key=<?php echo $cate['cName'] ?>" class="navigation-link">
                            <?php echo $cate['cName'] ?>
                                </a>
                            </li>
<?php endforeach; ?>
                    </ul>
                </div>
                <hr /><br />
            </nav>
        </header>
        <!-- /.header -->
        <div class="bokePage">

                    <h1><?php echo $row['jName'] ?><span style="color: #878787;font-size:12px;letter-spacing:1px;">
                            <!--时间|分类--><br />&nbsp;&nbsp;&nbsp;&nbsp;<?php echo floor($row['jTime2'] / 10000) . '年' . floor($row['jTime2'] / 100 % 100) . '月' . ($row['jTime2'] % 100) . '日'.'&nbsp;&nbsp;|' ?><?php echo '&nbsp;&nbsp;'.$row['cName'] ?></span></h1>
                    <!--文章内容放置到这里-->
                        <?php if($row['jCase'])
                            { ?>
                    <input type="button" onclick="window.open('../example/<?php echo $row['jCase'];?>')" value=" <?php if($row['jCase']){echo '查看实例演示';}else {echo '无演示实例';}?> " style="height: 38px;font-size: 20px"/>
                            <?php }else{
     echo '本文章纯属笔记，无演示实例';
                            }?>
                        <br /><br />
                        <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;'.$row['jNote'] ?><br /><br />
                        <?php echo $row['jDetail'] ?>
                    <br />
        </div>
    </body>
</html>