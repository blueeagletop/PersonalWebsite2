<?php 
require_once '../manager_include.php';
checkLogined();
$rows=getAllCate();
if(!$rows){
	alertMes("没有相应分类，请先添加分类!!", "addCate.php");
}
$id=$_REQUEST['id'];
$proInfo=getProById($id);
//print_r($proInfo);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link href="./styles/global.css"  rel="stylesheet"  type="text/css" media="all" />
<script type="text/javascript" charset="utf-8" src="../plugins/kindeditor/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8" src="../plugins/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript" src="./scripts/jquery-1.6.4.js"></script>
<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
        });
        $(document).ready(function(){
        	$("#selectFileBtn").click(function(){
        		$fileField = $('<input type="file" name="thumbs[]"/>');
        		$fileField.hide();
        		$("#attachList").append($fileField);
        		$fileField.trigger("click");
        		$fileField.change(function(){
        		$path = $(this).val();
        		$filename = $path.substring($path.lastIndexOf("\\")+1);
        		$attachItem = $('<div class="attachItem"><div class="left">a.gif</div><div class="right"><a href="#" title="删除附件">删除</a></div></div>');
        		$attachItem.find(".left").html($filename);
        		$("#attachList").append($attachItem);		
        		});
        	});
        	$("#attachList>.attachItem").find('a').live('click',function(obj,i){
        		$(this).parents('.attachItem').prev('input').remove();
        		$(this).parents('.attachItem').remove();
        	});
        });
</script>
</head>
<body>
<h3>修改文章</h3>
<form action="doAdminAction.php?act=editPro&id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
<table width="95%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">文章标题</td>
                <td><input type="text" name="jName" style="width: 80%" value="<?php echo $proInfo['jName'];?>"/></td>
	</tr>
	<tr>
		<td align="right">文章分类</td>
		<td>
		<select name="cId">
			<?php foreach($rows as $row):?>
				<option value="<?php echo $row['id'];?>" <?php echo $row['id']==$proInfo['cId']?"selected='selected'":null;?>><?php echo $row['cName'];?></option>
			<?php endforeach;?>
		</select>
		</td>
	</tr>
	<tr>
		<td align="right">实例链接</td>
		<td><input type="text" name="jCase"  value="<?php echo $proInfo['jCase'];?>"  style="width:100%;"/></td>
	</tr>
	<tr>
		<td align="right">文章简述</td>
               <td><textarea name="jNote" rows="3" cols="20"  style="width:100%;height:50px;"><?php echo $proInfo['jNote'];?></textarea></td>
	</tr>
	<tr>
		<td align="right">文章内容</td>
		<td>
			<textarea name="jDetail" id="editor_id" style="width:100%;height:350px;font-size: 30px"><?php echo $proInfo['jDetail'];?></textarea>
		</td>
	</tr>
	<tr>
		<td align="right">文章图片</td>
		<td>
			<a href="javascript:void(0)" id="selectFileBtn">添加附件</a>
			<div id="attachList" class="clear"></div>
		</td>
	</tr>
	<tr>
		<td align="right">发布时间</td>
		<td><input type="text" name="jTime2"  value="<?php echo $proInfo['jTime2'];?>"/></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="编辑文章"/></td>
	</tr>
</table>
</form>
</body>
</html>