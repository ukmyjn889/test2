<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 10/9/2015
 * Time: 9:58 PM
 */
$con=mysql_connect("localhost:3306","root","5656123ljx");

if(!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("capstone",$con);
function getCurrentStudentMajorPageNow($major){
    $pageSize=12;
    $sql="SELECT count(*) FROM course where cid not like '%L' and major<'".$major."' order by major";
    $result=mysql_query($sql);
    $row=mysql_fetch_array($result);

    return (($row[0]/$pageSize)+1);
}
function getAllLecCourse($pageNow){
    $pageSize=12;
    $pageCount=($pageNow-1)*$pageSize;
    $result=mysql_query("select * from Course where cid not like '%L' limit ".$pageCount.",".$pageSize);
    return $result;

}
function getCourseById($cid){
    $result=mysql_query("select * from Course where cid='".$cid."'");
    return $result;
}
function getCourseByConditions($condition,$cid){

}
?>