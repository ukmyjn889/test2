<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2016/2/22
 * Time: 2:34
 */
include_once "../model/getMajor.php";
include_once "../model/getCourse.php";
$list=array();
$message=$_GET['message'];
$corelist=$_GET['corelist'];
if($message=="getMajors") {
    $result = getAllMajor();
    while ($row = mysql_fetch_array($result)) {
        array_push($list, $row);
    }
    echo json_encode($list);
}else{
    $result=getCourseByMajor($message);
    $coreArray=explode(",",$corelist);
    while($row=mysql_fetch_array($result)){
      if(!in_array($row['cid'],$coreArray)) {
          array_push($list, $row);
      }
    }

    echo json_encode($list);
   // $result=getCourseByMajor($message);
//    while($row=mysql_fetch_array($result)){
//        array_push($list,$row['cid']);
//        $count++;
//    }
    //echo "Hello world";
}
?>