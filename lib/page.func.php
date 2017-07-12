<?php

function showPage($page, $totalPage, $where = null, $sep = "&nbsp;") {
    $where = ($where == null) ? null : "&" . $where;
    $url = $_SERVER ['PHP_SELF'];
    $index = ($page == 1) ? "首页" : "<a href='{$url}?page=1{$where}'>首页</a>";
    $last = ($page == $totalPage) ? "尾页" : "<a href='{$url}?page={$totalPage}{$where}'>尾页</a>";
    $prevPage = ($page >= 1) ? $page - 1 : 1;
    $nextPage = ($Page >= $totalPage) ? $totalPage : $page + 1;
    $prev = ($page == 1) ? "上一页" : "<a href='{$url}?page={$prevPage}{$where}'>上一页</a>";
    $next = ($page == $totalPage) ? "下一页" : "<a href='{$url}?page={$nextPage}{$where}'>下一页</a>";
    $str = "<br />当前第{$page}页/总共{$totalPage}页";
    for ($i = 1; $i <= $totalPage; $i ++) {
        //当前页无连接
        if ($page == $i) {
            $p .= "[{$i}]";
        } else {
            $p .= "<a href='{$url}?page={$i}{$where}'>[{$i}]</a>";
        }
    }
    $pageStr = $index . $sep . $prev . $sep . $p . $sep . $next . $sep . $last . $str;
    return $pageStr;
}

function showPageM($page, $totalPage, $where = null, $sep = "&nbsp;") {
    $where = ($where == null) ? null : "&" . $where;
    $url = $_SERVER ['PHP_SELF'];
    $index = ($page == 1) ? "首页" : "<a href='{$url}?page=1{$where}'>首页</a>";
    $last = ($page == $totalPage) ? "尾页" : "<a href='{$url}?page={$totalPage}{$where}'>尾页</a>";
    $prevPage = ($page >= 1) ? $page - 1 : 1;
    $nextPage = ($Page >= $totalPage) ? $totalPage : $page + 1;
    $prev = ($page == 1) ? "上一页" : "<a href='{$url}?page={$prevPage}{$where}'>上一页</a>";
    $next = ($page == $totalPage) ? "下一页" : "<a href='{$url}?page={$nextPage}{$where}'>下一页</a>";
    $str = "{$page}/{$totalPage}";
//    for ($i = 1; $i <= $totalPage; $i ++) {
//        //当前页无连接
//        if ($page == $i) {
//            $p .= "[{$i}]";
//        } else {
//            $p .= "<a href='{$url}?page={$i}{$where}'>[{$i}]</a>";
//        }
//    }
    $pageStr = $index . $sep . $prev . $sep . $str . $sep . $next . $sep . $last;
    return $pageStr;
}

