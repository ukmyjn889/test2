<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2016/2/26
 * Time: 3:09
 */
include_once "../model/getCourse.php";
$searchMajor=$_POST['searchMajor'];
$searchWay=$_POST['searchWay'];
$searchValue=$_POST['searchValue'];
$result="";
$list=array();
if($searchWay=="equals"){
    $result=getCoursesByMajorAndConditions($searchMajor,"=",$searchValue);
}else if($searchWay=="contains"){
    $result=getCoursesByMajorAndConditions($searchMajor,"contains",$searchValue);
}else if($searchWay=="great"){
    $result=getCoursesByMajorAndConditions($searchMajor,">=",$searchValue);
}else if($searchWay=="less"){
    $result=getCoursesByMajorAndConditions($searchMajor,"<=",$searchValue);
}
//echo $result;
while($row=mysql_fetch_array($result)){
    array_push($list,$row);
}
echo json_encode($list);
?>