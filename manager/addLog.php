<?php 
require_once '../manager_include.php';

$rows=getAllCate();
if(!$rows){
	alertMes("没有相应分类，请先添加分类!!", "addCate.php");
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> </title>
<link href="./styles/global.css"  rel="stylesheet"  type="text/css" media="all" />
<script type="text/javascript" charset="utf-8" src="../plugins/kindeditor/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8" src="../plugins/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript" src="scripts/jquery-1.6.4.js"></script>
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
<h3>添加文章</h3>
<form action="doAdminAction.php?act=addPro" method="post" enctype="multipart/form-data">
<table width="95%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">文章标题</td>
		<td><input type="text" name="jName"  placeholder="请输入文章标题" style="width:99%;font-size: 20px"/></td>
	</tr>
	<tr>
		<td align="right">文章分类</td>
		<td>
		<select name="cId">
			<?php foreach($rows as $row):?>
				<option value="<?php echo $row['id'];?>"><?php echo $row['cName'];?></option>
			<?php endforeach;?>
		</select>
		</td>
	</tr>
	<tr>
		<td align="right">实例链接</td>
		<td><input type="text" name="jCase"  placeholder="已有前缀example/" style="width:50%;"/></td>
	</tr>
	<tr>
		<td align="right">文章简述</td>
                <td><textarea name="jNote" rows="3" cols="20" placeholder="请输入文章简述" style="width:100%;height:50px;"></textarea></td>
	</tr>
	<tr>
		<td align="right">文章详情</td>
		<td>
			<textarea name="jDetail" id="editor_id" style="width:100%;height:350px;font-size: 30px"></textarea>
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
		<td><input type="text" name="jtime2"  placeholder="纯数字年月日" style="width:50%;"/></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="发布文章"/></td>
	</tr>
</table>
</form>
</body>
</html>