<?php 
require_once '../manager_include.php';
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
$sql="select * from message";
$totalRows=getResultNum($sql);
$pageSize=5;
$totalPage=ceil($totalRows/$pageSize);
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select id,name,title,email,info from message order by id desc limit {$offset},{$pageSize}";
$rows=fetchAll($sql);
if(!$rows){
	alertMes("抱歉,当前无留言，请添加","../message/addMessage.php");
	exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" href="styles/backstage.css">
</head>
<body>
<div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addMessage()">
                        </div>
                            
                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                
                                <th width="25%">标题</th>
                                <th width="50%">内容</th>
                                <th width="12%">留言者</th>
                                <th width="13%">邮箱</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($rows as $row):?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                
                                <td><?php echo $row['title'];?></td>
                                <td><?php echo $row['info'];?></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td align="center"><input type="button" value="修改" class="btn" onclick="editMessage(<?php echo $row['id'];?>)"><input type="button" value="删除" class="btn"  onclick="delMessage(<?php echo $row['id'];?>)"></td>
                            </tr>
                            <?php endforeach;?>
                            <?php if($totalRows>$pageSize):?>
                            <tr>
                            	<td colspan="6"><?php echo showPage($page, $totalPage);?></td>
                            </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
<script type="text/javascript">
	function editMessage(id){
		window.location="editMessage.php?id="+id;
	}
	function delMessage(id){
		if(window.confirm("您确定要删除吗？删除之后不能恢复！！！")){
			window.location="doAdminAction.php?act=delMessage&id="+id;
		}
	}
	function addMessage(){
		window.location="../message/addMessage.php";
	}
</script>
</body>
</html>