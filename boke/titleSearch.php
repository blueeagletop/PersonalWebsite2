<?php
require_once('../web_include.php');

$order = $_REQUEST['order'] ? $_REQUEST['order'] : null;
$orderBy = $order ? "order by p." . $order : null;
$keywords = $_REQUEST['keywords'] ? $_REQUEST['keywords'] : null;
$where = $keywords ? "where p.jName like '%{$keywords}%'" : null;
//得到数据库中所有文章
$sql = "select p.id,p.jName,p.jCase,p.jNote,p.jDetail,p.jTime,p.jTime2,p.cId,c.cName from boke_log as p join boke_class c on p.cId=c.id {$where}";
$totalRows = getResultNum($sql);
$pageSize = 5;
$totalPage = ceil($totalRows / $pageSize);
$page = $_REQUEST['page'] ? (int) $_REQUEST['page'] : 1;
if ($page < 1 || $page == null || !is_numeric($page))
    $page = 1;
if ($page > $totalPage)
    $page = $totalPage;
$offset = ($page - 1) * $pageSize;
$sql = "select p.id,p.jName,p.jCase,p.jNote,p.jDetail,p.jTime,p.jTime2,p.cId,c.cName from boke_log as p join boke_class c on p.cId=c.id {$where} {$orderBy} order by jTime2 desc limit {$offset},{$pageSize}";
$rows = fetchAll($sql);

$cates = getAllcate();//得到所有的分类
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
            if (empty($rows)) {
                echo "<h3>没有搜到相关文章，请换个关键词试试<br/><br/><br/><br/><br/></h3>";
            } else {
     foreach ($rows as $row){ ?>
                    <h1><a href="bokeDetail.show.php?id=<?php echo $row['id'] ?>" class="aTitle"><?php echo $row['jName'] ?></a><span style="color:#878787;font-size:12px;letter-spacing:1px;">　　
                            <!--时间|分类--><br />&nbsp;&nbsp;&nbsp;&nbsp;<?php echo floor($row['jTime2'] / 10000) . '年' . floor($row['jTime2'] / 100 % 100) . '月' . ($row['jTime2'] % 100) . '日' . '&nbsp;&nbsp;|' ?><?php echo '&nbsp;&nbsp;' . $row['cName'] ?></span></h1>
                    <p class="links"><a href="bokeDetail.show.php?id=<?php echo $row['id'] ?>" class="more">阅读全文</a>&nbsp;&nbsp;&raquo;&nbsp;&nbsp;</p>
                    <hr style="height:1px;border:none;border-top:1px dashed #434343;" />
                    <?php
                }
            }
            ?>
        </div>
        <div>
<?php if ($totalRows > $pageSize): ?>
                        <tr>
                            <td><?php echo showPage($page, $totalPage, "keywords={$keywords}&order={$order}"); ?></td>
                        </tr>
<?php endif; ?>
        </div>
    </body>
</html>