<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2016/2/22
 * Time: 9:41
 */
include_once "../model/getCourse.php";
$message=$_GET['majorName'];
$list=array();
 $result=getCourseByMajor($message);
    while($row=mysql_fetch_array($result)){
        array_push($list,$row);
    }
echo json_encode($list);
?>