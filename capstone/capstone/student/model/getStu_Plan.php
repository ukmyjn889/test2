<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/11/18
 * Time: 22:16
 */
$con=mysql_connect("localhost:3306","root","5656123ljx");
if(!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("capstone",$con);
function getPlannerIdsBySid($sid){
    $sql="select * from stu_plan where sid='".$sid."'";
    $result=mysql_query($sql);
    return $result;
}
function getMaxPlannerIdBySid($sid){
    $sql="select max(plannerId) from stu_plan where sid='".$sid."'";
    $result=mysql_query($sql);
    return $result;
}
function getPlannerNickNameBySidAndPlannerId($sid,$plannerId){
    $sql="select nickName from stu_plan where sid='".$sid."' and plannerId='".$plannerId."'";
    return mysql_fetch_array(mysql_query($sql))[0];
}
function insertNewPlan($sid,$plannerId,$nickName){
    $sql="insert into stu_plan(sid,plannerId,nickName) VALUES ('".$sid."','".$plannerId."','".$nickName."')";
    mysql_query($sql);
}
?>