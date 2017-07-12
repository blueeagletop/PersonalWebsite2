<?php
require_once('../web_include.php');

//分页
$page = $_REQUEST['page'] ? (int) $_REQUEST['page'] : 1;
$sql = "select * from boke_log";
$totalRows = getResultNum($sql);
$pageSize = 5;
$totalPage = ceil($totalRows / $pageSize);
if ($page < 1 || $page == null || !is_numeric($page))
    $page = 1;
if ($page >= $totalPage)
    $page = $totalPage;
$offset = ($page - 1) * $pageSize;

$sql = "select p.id,p.jName,p.jCase,p.jNote,p.jDetail,p.jTime,p.jTime2,p.cId,c.cName from boke_log as p join boke_class c on p.cId=c.id order by jTime2 desc limit {$offset},{$pageSize}";
$query = mysql_query($sql);
if ($query && mysql_num_rows($query)) {
    while ($row = mysql_fetch_assoc($query)) {
        $data[] = $row;
    }
}
$cates = getAllcate();


$rows = fetchAll($sql);
if (!$rows) {
//    alertMes("很抱歉当前没有文章，请访问其他版块吧", "../");
//    exit;
}
?>
<!doctype html>
<html lang="zh">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>博客</title>
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
            <?php
            if (empty($data)) {
                echo "当前没有文章";
            } else {
                foreach ($data as $value) {
                    ?>
                    <h1><a href="bokeDetail.show.php?id=<?php echo $value['id'] ?>" class="aTitle"><?php echo $value['jName'] ?></a><span style="color:#878787;font-size:12px;letter-spacing:1px;">　　
                            <!--时间|分类--><br />&nbsp;&nbsp;&nbsp;&nbsp;<?php echo floor($value['jTime2'] / 10000) . '年' . floor($value['jTime2'] / 100 % 100) . '月' . ($value['jTime2'] % 100) . '日' . '&nbsp;&nbsp;|' ?><?php echo '&nbsp;&nbsp;' . $value['cName'] ?></span></h1>
                    <p class="links"><a href="bokeDetail.show.php?id=<?php echo $value['id'] ?>" class="more">阅读全文</a>&nbsp;&nbsp;&raquo;&nbsp;&nbsp;</p>
                    <hr style="height:1px;border:none;border-top:1px dashed #434343;" />
                    <?php
                }
            }
            ?>
        </div>
        <div>
<?php if ($totalRows > $pageSize): ?>
                <tr>
                    <td><?php echo showPage($page, $totalPage); ?></td>
                </tr>
<?php endif; ?>
        </div>
    </body>
</html>