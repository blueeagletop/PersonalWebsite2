<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<center>
    <div class="head" style="position: absolute;background: #096DBA;width: 100%;height: 60px;top: 0px;left: 0px;text-align: center;line-height: 60px;font-size: x-large;">
        蓝鹰飞翔_博客后台管理系统
        </div>
    <br/><br/><br/><br/>
	<h3>系统信息</h3>
	<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
		<tr>
			<th>操作系统</th>
			<td><?php echo PHP_OS;?></td>
		</tr>
		<tr>
			<th>Apache版本</th>
			<td><?php echo apache_get_version();?></td>
		</tr>
		<tr>
			<th>PHP版本</th>
			<td><?php echo PHP_VERSION;?></td>
		</tr>
		<tr>
			<th>运行方式</th>
			<td><?php echo PHP_SAPI;?></td>
		</tr>
	</table>
	<h3>软件信息</h3>
	<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
		<tr>
			<th>系统名称</th>
			<td>个人博客站</td>
		</tr>
		<tr>
			<th>开发团队</th>
			<td>蓝鹰飞翔</td>
		</tr>
		<tr>
			<th>开发员邮箱</th>
			<td>dengzhaoyv@163.com</td>
		</tr>
		<tr>
			<th>附加说明</th>
			<td>无</td>
		</tr>
	</table>
</center>

</body>
</html>