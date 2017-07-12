<?php 

function addAlbum($arr){
	insert("boke_album", $arr);
}

/**
 * 根据文章id得到文章图片
 * @param int $id
 * @return array
 */
function getProImgById($id){
	$sql="select path from boke_album where jid={$id} limit 1";
	$row=fetchOne($sql);
	return $row;
}

/**
 * 根据文章id得到所有图片
 * @param int $id
 * @return array
 */
function getProImgsById($id){
	$sql="select path from boke_album where jid={$id} ";
	$rows=fetchAll($sql);
	return $rows;
}
/**
 * 文字水印的效果
 * @param int $id
 * @return string
 */
function doWaterText($id){
	$rows=getProImgsById($id);
	foreach($rows as $row){
		$filename="../image_800/".$row['albumPath'];
		waterText($filename);
	}
	$mes="操作成功";
	return $mes;
}

/**
 *图片水印
 * @param int $id
 * @return string
 */
function doWaterPic($id){
	$rows=getProImgsById($id);
	foreach($rows as $row){
		$filename="../image_800/".$row['albumPath'];
		waterPic($filename);
	}
	$mes="操作成功";
	return $mes;
}




