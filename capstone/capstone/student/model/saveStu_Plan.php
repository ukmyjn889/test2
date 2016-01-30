<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/11/18
 * Time: 23:21
 */
include_once "getStu_Plan.php";
$con=mysql_connect("localhost:3306","root","5656123ljx");
if(!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("capstone",$con);
function insertPlan($sid,$plannerId,$nickName){
    $sql="insert into stu_plan(sid,plannerId,nickName) VALUES ('".$sid."','".$plannerId."','".$nickName."')";
    mysql_query($sql);
}
function deletePlan($sid,$plannerId){
    $sql="delete from stu_plan where sid='".$sid."' and plannerId='".$plannerId."'";
    echo $sql;
    mysql_query($sql);
}
$deleteId=$_GET['deleteId'];
if($deleteId==null) {
    session_start();
    $sid = $_SESSION['sid'];
    $nickName = $_GET['nickName'];
    $plannerId = mysql_fetch_array(getMaxPlannerIdBySid($sid))[0];
    $plannerId++;
    insertPlan($sid, $plannerId, $nickName);
    header("location:../view/displayPlanner.php?plannerId=" . $plannerId);
}else{
    session_start();
    $sid = $_SESSION['sid'];
    deletePlan($sid,$deleteId);
    header("location:../view/selectTermToSetPlanner.php");
}
?>