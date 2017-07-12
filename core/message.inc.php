<?php

/**
 * 得到所有信息
 * @return array
 */
function getAllMessage(){
	$sql="select * from message";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 * 修改留言的操作
 * @param string $where
 * @return string
 */
function editMessage($id){
	$arr=$_POST;
	if(update("message", $arr,"id={$id}")){
		$mes="编辑成功!<br/><a href='listMessage.php'>查看留言列表</a>";
	}else{
		$mes="修改失败!<br/><a href='listMessage.php'>重新修改</a>";
	}
	return $mes;
}

/**
 *删除留言
 * @param string $where
 * @return string
 */
function delMessage($id){
	if(delete("message","id={$id}")){
		$mes="删除成功!<br/><a href='listMessage.php'>查看留言列表</a>";
	}else{
		$mes="删除失败!<br/><a href='listMessage.php'>请重新删除</a>";
	}
	return $mes;
}

/**
 * 根据id得到留言的详细信息
 * @param int $id
 * @return array
 */
function getMessageById($id) {
    $sql = "select * from message  where id={$id}";
    $row = fetchOne($sql);
    return $row;
}