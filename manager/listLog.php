<?php
require_once '../manager_include.php';
checkLogined();
$order = $_REQUEST['order'] ? $_REQUEST['order'] : null;
$orderBy = $order ? "order by p." . $order : "order by p.jTime desc";
$keywords = $_REQUEST['keywords'] ? $_REQUEST['keywords'] : null;
$where = $keywords ? "where p.jName like '%{$keywords}%'" : null;
//得到数据库中所有文章
$sql = "select p.id,p.jName,p.jCase,p.jNote,p.jDetail,p.jTime,p.jTime2,p.cId,c.cName from boke_log as p join boke_class c on p.cId=c.id {$where}";
$totalRows = getResultNum($sql);
$pageSize = 10;
$totalPage = ceil($totalRows / $pageSize);
$page = $_REQUEST['page'] ? (int) $_REQUEST['page'] : 1;
if ($page < 1 || $page == null || !is_numeric($page))
    $page = 1;
if ($page > $totalPage)
    $page = $totalPage;
$offset = ($page - 1) * $pageSize;
$sql = "select p.id,p.jName,p.jCase,p.jNote,p.jDetail,p.jTime,p.jTime2,p.cId,c.cName from boke_log as p join boke_class c on p.cId=c.id {$where} {$orderBy} limit {$offset},{$pageSize}";
$rows = fetchAll($sql);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>-.-</title>
        <link rel="stylesheet" href="styles/backstage.css">
        <link rel="stylesheet" href="scripts/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
        <script src="scripts/jquery-ui/js/jquery-1.10.2.js"></script>
        <script src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
        <script src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
    </head>

    <body>
        <div id="showDetail"  style="display:none;">

        </div>
        <div class="details">
            <div class="details_operation clearfix">
                <div class="bui_select">
                    <input type="button" value="添&nbsp;&nbsp;加" class="add" onclick="addPro()">
                </div>
                <div class="fr">
                    <div class="text">
                        <span>显示顺序：</span><span> 发布时间</span>
                        <div class="bui_select">
                            <select id="" class="select" onchange="change(this.value)">
                                <option>-请选择-</option>
                                <option value="jTime2 desc" >最新发布</option>
                                <option value="jTime2 asc">历史发布</option>
                            </select>
                        </div>
                    </div>
                    <div class="text">
                        <span>修改时间</span>
                        <div class="bui_select">
                            <select id="" class="select" onchange="change(this.value)">
                                <option>-请选择-</option>
                                <option value="jTime desc" >最新发布</option>
                                <option value="jTime asc">历史发布</option>
                            </select>
                        </div>
                    </div>
                    <div class="text">
                        <span>搜索</span>
                        <input type="text" value="" class="search"  id="search" onkeypress="search()" style="width:250px">
                    </div>
                </div>
            </div>
            <!--表格-->
            <table class="table" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th width="25%">文章标题</th>
                        <th width="36%">文章简述</th>
                        <th width="8%">文章分类</th>
                        <th width="12%">发布时间</th>
                        <th width="10%">修改时间</th>
                        <th width="9%">操作</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
            if (empty($rows)) {
                echo "没有搜到相关文章，请换个关键词试试";
            } else {
 foreach ($rows as $row){ ?>     
                        <tr>
                            <!--这里的id和for里面的c1 需要循环出来-->

                            <td><?php echo $row['jName']; ?></td>
                            <td><?php echo $row['jNote']; ?></td>
                            <td><?php echo $row['cName']; ?></td>
                            <td><?php echo floor($row['jTime2'] / 10000) . '年' . floor($row['jTime2'] / 100 % 100) . '月' . ($row['jTime2'] % 100) . '日' ?></td>
                            <td><?php echo date("Y-m-d H:i:s", $row['jTime']); ?></td>
                            <td align="center">
                                <input type="button" value="详情" class="btn" onclick="showDetail(<?php echo $row['id']; ?>, '<?php echo $row['jName']; ?>')"><input type="button" value="修改" class="btn" onclick="editPro(<?php echo $row['id']; ?>)"><input type="button" value="删除" class="btn"onclick="delPro(<?php echo $row['id']; ?>)">
                                <div id="showDetail<?php echo $row['id']; ?>" style="display:none;">
                                    <table class="table" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="20%" align="right">文章标题</td>
                                            <td><?php echo $row['jName']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%"  align="right">文章类别</td>
                                            <td><?php echo $row['cName']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%"  align="right">实例链接</td>
                                            <td><?php echo $row['jCase']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%"  align="right">文章简述</td>
                                            <td><?php echo $row['jNote']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%"  align="right">文章图片</td>
                                            <td>
                                                <?php
                                                $proImgs = getAllImgByProId($row['id']);
                                                if($proImgs!=null) foreach ($proImgs as $img):
                                                    ?>
                                                    <img width="100" height="100" src="uploads/<?php echo $img['path']; ?>" alt=""/> &nbsp;&nbsp;
    <?php endforeach; ?>
                                            </td>
                                        </tr>
                                    </table>
                                    <span style="display:block;width:100%; ">
                                        文章详情：<br/>
                                        <table class="table" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td>
                                                <br/>
    <?php $row['jDetail']=addslashes($row['jDetail']);echo $row['jDetail']; ?>
                                                <br />
                                            </td>
                                        </tr>
                                        </table>
                                    </span>
                                </div>

                            </td>
                        </tr>
            <?php 
            }
            } ?>
<?php if ($totalRows > $pageSize): ?>
                        <tr>
                            <td colspan="7"><?php echo showPage($page, $totalPage, "keywords={$keywords}&order={$order}"); ?></td>
                        </tr>
<?php endif; ?>
                </tbody>
            </table>
        </div>
        <script type="text/javascript">
            function showDetail(id, t) {
                $("#showDetail" + id).dialog({
                    height: "auto",
                    width: "auto",
                    position: {my: "center", at: "center", collision: "fit"},
                    modal: false, //是否模式对话框
                    draggable: true, //是否允许拖拽
                    resizable: true, //是否允许拖动
                    title: "文章标题：" + t, //对话框标题
                    show: "slide",
                    hide: "explode"
                });
            }
            function addPro() {
                window.location = 'addLog.php';
            }
            function editPro(id) {
                window.location = 'editLog.php?id=' + id;
            }
            function delPro(id) {
                if (window.confirm("您确认要删除嘛？删除后不可恢复！！！")) {
                    window.location = "doAdminAction.php?act=delPro&id=" + id;
                }
            }
            function search() {
                if (event.keyCode == 13) {
                    var val = document.getElementById("search").value;
                    window.location = "listLog.php?keywords=" + val;
                }
            }
            function change(val) {
                window.location = "listLog.php?order=" + val;
            }
        </script>
    </body>
</html>