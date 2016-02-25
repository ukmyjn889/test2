<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2016/1/13
 * Time: 16:53
 */
$con=mysql_connect("localhost:3306","root","5656123ljx");
if(!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("capstone",$con);
function getMajorByMajorNickName($mid){
    $sql="select * from major where majorName='".$mid."'";
    return mysql_query($sql);
}
function getAllMajor(){
    $sql="select * from major";
    return mysql_query($sql);
}
?>