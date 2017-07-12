<?php
require_once('../web_include.php');
//分页
$page = $_REQUEST['page'] ? (int) $_REQUEST['page'] : 1;
$sql = "select * from boke_log";
$totalRows = getResultNum($sql);
$pageSize = 20;
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
<!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<title>蓝鹰飞翔的博客</title>
<link href="css/nav_sytle.css" rel="stylesheet">
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/nav.js"></script>
</head>
<body>
<div class="con">
    <button class="allClass">博客>全部文章</button>
    <button class="search">搜  索 <img src="imgs/search.png" style="height: 20px"></button>
</div>
    
<div class="bgDiv"></div>

<div class="downNav">
    <?php foreach ($cates as $cate): ?>
    <span class="bokeClass"><a href="bokeClass.php?key=<?php echo $cate['id']; ?>"><?php echo $cate['cName'] ?></a></span>
    <?php endforeach; ?>
</div>
<div><input type="text" class="searchInput" value="" /></div>
<div class="bokePage">
            <?php
            if (empty($data)) {
                echo "当前没有文章";
            } else {
                foreach ($data as $value) {
                    ?>
                    <br /><h4><a href="bokeDetail.show.php?id=<?php echo $value['id'] ?>" class="aTitle"><?php echo $value['jName'] ?></a><span style="color:#878787;font-size:12px;letter-spacing:1px;">　　
                            <!--时间|分类--><br />&nbsp;&nbsp;<?php echo floor($value['jTime2'] / 10000) . '年' . floor($value['jTime2'] / 100 % 100) . '月' . ($value['jTime2'] % 100) . '日' . '&nbsp;&nbsp;|' ?><?php echo '&nbsp;&nbsp;' . $value['cName'] ?></span></h4>
                    <br /><hr style="height:1px;border:none;border-top:1px dashed #434343;" />
                    <?php
                }
            }
            ?>
                    <div style="position: relative;bottom:0px;width: 100%;margin:0 auto;text-align: center;font-size: large"><br />
                        <input class="pageM" type=button onclick="window.location.href='./index.php?page=1'" value="首 页"> 
    <?php     
    $prevPage = ($page >= 1) ? $page - 1 : 1;
    $nextPage = ($Page > $totalPage-1) ? $totalPage : $page + 1;
    ?>
    <input class="pageM" type=button onclick="window.location.href='./index.php?page=<?php echo $prevPage;?>'" value="上一页"> 
    <?php echo $page."/".$totalPage;?> 
    <input class="pageM" type=button onclick="window.location.href='./index.php?page=<?php echo $nextPage;?>'" value="下一页"> 
    <input class="pageM" type=button onclick="window.location.href='./index.php?page=<?php echo $totalPage;?>'" value="尾 页"> 
    <br/>
    <br/>
        </div>
</div>

</body>
</html>
