<?php

/**
 * 添加文章
 * @return string
 */
function addPro() {
    $arr = $_POST;
    $arr['jTime'] = time();
    $arr['jDetail']=addslashes($arr['jDetail']);//转义单引号，不转义则输入单引号会报错
    $path = "./uploads";
    $uploadFiles = uploadFile($path);
    if (is_array($uploadFiles) && $uploadFiles) {
        foreach ($uploadFiles as $key => $uploadFile) {
            thumb($path . "/" . $uploadFile['name'], "../image_50/" . $uploadFile['name'], 50, 50);
            thumb($path . "/" . $uploadFile['name'], "../image_800/" . $uploadFile['name'], 800, 800);
        }
    }
    $res = insert("boke_log", $arr);
    $jid = getInsertId();
    if ($res && $jid) {
        if($uploadFiles!=null){foreach ($uploadFiles as $uploadFile) {
            $arr1['jid'] = $jid;
            $arr1['path'] = $uploadFile['name'];
            addAlbum($arr1);
        }
        }
        $mes = "<p>添加成功!</p><a href='addLog.php' target='mainFrame'>继续添加</a>|<a href='listLog.php' target='mainFrame'>查看文章列表</a>";
    } else {
        foreach ($uploadFiles as $uploadFile) {
            if (file_exists("../image_800/" . $uploadFile['name'])) {
                unlink("../image_800/" . $uploadFile['name']);
            }
            if (file_exists("../image_50/" . $uploadFile['name'])) {
                unlink("../image_50/" . $uploadFile['name']);
            }
        }
        $mes = "<p>添加失败!失败原因之一：添加内容有非法内容，例如单引号。去掉单引号即可</p><a href='addLog.php' target='mainFrame'>重新添加</a>";
    }
    return $mes;
}

/**
 * 编辑文章
 * @param int $id
 * @return string
 */
function editPro($id) {
    $arr = $_POST;
    $arr['jDetail']=addslashes($arr['jDetail']);//转义单引号，不转义则输入单引号会报错
//    $arr['jTime'] = time();
    $path = "./uploads";
    $uploadFiles = uploadFile($path);
    if (is_array($uploadFiles) && $uploadFiles) {
        foreach ($uploadFiles as $key => $uploadFile) {
            thumb($path . "/" . $uploadFile['name'], "../image_50/" . $uploadFile['name'], 50, 50);
            thumb($path . "/" . $uploadFile['name'], "../image_800/" . $uploadFile['name'], 800, 800);
        }
    }
    $where = "id={$id}";
    $res = update("boke_log", $arr, $where);
    $jid = $id;
    if ($res && $jid || $uploadFiles) {
        if ($uploadFiles && is_array($uploadFiles)) {
            foreach ($uploadFiles as $uploadFile) {
                $arr1['jid'] = $jid;
                $arr1['path'] = $uploadFile['name'];
                addAlbum($arr1);
            }
        }
        $mes = "<p>编辑成功!</p><a href='listLog.php' target='mainFrame'>查看文章列表</a>";
    } else {
        if (is_array($uploadFiles) && $uploadFiles) {
            foreach ($uploadFiles as $uploadFile) {
                if (file_exists("../image_800/" . $uploadFile['name'])) {
                    unlink("../image_800/" . $uploadFile['name']);
                }
                if (file_exists("../image_50/" . $uploadFile['name'])) {
                    unlink("../image_50/" . $uploadFile['name']);
                }
            }
        }
        $mes = "<p>编辑失败!</p><a href='listLog.php' target='mainFrame'>重新编辑</a>";
    }
    return $mes;
}

function delPro($id) {
    $where = "id=$id";
    $res = delete("boke_log", $where);
    $proImgs = getAllImgByProId($id);
    if ($proImgs && is_array($proImgs)) {
        foreach ($proImgs as $proImg) {
            if (file_exists("uploads/" . $proImg['path'])) {
                unlink("uploads/" . $proImg['path']);
            }
            if (file_exists("../image_50/" . $proImg['path'])) {
                unlink("../image_50/" . $proImg['path']);
            }
            if (file_exists("../image_800/" . $proImg['path'])) {
                unlink("../image_800/" . $proImg['path']);
            }
        }
    }
    $where1 = "jid={$id}";
    $res1 = delete("boke_album", $where1);
    if ($res || $res1) {
        $mes = "删除成功!<br/><a href='listLog.php' target='mainFrame'>查看文章列表</a>";
    } else {
        $mes = "删除失败!<br/><a href='listLog.php' target='mainFrame'>重新删除</a>";
    }
    return $mes;
}

/**
 * 得到文章的所有信息
 * @return array
 */
function getAllProByAdmin() {
    $sql = "select p.id,p.jName,p.jCase,p.jNote,p.jDetail,p.jTime,p.jTime2,p.cId,c.cName from boke_log as p join boke_class c on p.cId=c.id";
    $rows = fetchAll($sql);
    return $rows;
}

/**
 * 根据文章id得到文章图片
 * @param int $id
 * @return array
 */
function getAllImgByProId($id) {
    $sql = "select a.path from boke_album a where jid={$id}";
    $rows = fetchAll($sql);
    return $rows;
}

/**
 * 根据id得到文章的详细信息
 * @param int $id
 * @return array
 */
function getProById($id) {
    $sql = "select p.id,p.jName,p.jCase,p.jNote,p.jDetail,p.jTime,p.jTime2,p.cId,c.cName from boke_log as p join boke_class c on p.cId=c.id where p.id={$id}";
    $row = fetchOne($sql);
    return $row;
}

/**
 * 检查分类下是否有文章
 * @param int $cid
 * @return array
 */
function checkProExist($cid) {
    $sql = "select * from boke_log where cId={$cid}";
    $rows = fetchAll($sql);
    return $rows;
}

/**
 * 得到所有文章
 * @return array
 */
function getAllPros() {
    $sql = "select p.id,p.jName,p.jCase,p.pNote,p.jDetail,p.jTime,p.Jtime2,c.cName,p.cId from boke_log as p join boke_class c on p.cId=c.id ";
    $rows = fetchAll($sql);
    return $rows;
}

/**
 * 根据cid得到5篇文章
 * @param int $cid
 * @return Array
 */
function getProsByCid($cid) {
    $sql = "select p.id,p.jName,p.jCase,p.pNote,p.jDetail,p.jTime,p.Jtime2,c.cName,p.cId from boke_log as p join boke_class c on p.cId=c.id where p.cId={$cid} limit 5";
    $rows = fetchAll($sql);
    return $rows;
}

/**
 * 得到下5篇文章
 * @param int $cid
 * @return array
 */
function getSmallProsByCid($cid) {
    $sql = "select p.id,p.jName,p.jCase,p.pNote,p.jDetail,p.jTime,p.Jtime2,c.cName,p.cId from boke_log as p join boke_class c on p.cId=c.id where p.cId={$cid} limit 5,5";
    $rows = fetchAll($sql);
    return $rows;
}

/**
 * 得到文章ID和文章名称
 * @return array
 */
function getProInfo() {
    $sql = "select id,jName from boke_log order by id asc";
    $rows = fetchAll($sql);
    return $rows;
}
