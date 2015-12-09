<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/11/19
 * Time: 0:16
 */
include_once "getPlanner.php";
include_once "getStu_Plan.php";
$con=mysql_connect("localhost:3306","root","5656123ljx");
if(!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("capstone",$con);
function save($cid,$sid,$term,$plannerId){
    $sql="insert into planner (sid,cid,term,plannerId) VALUES ('".$sid."','".$cid."','".$term."','".$plannerId."')";
    //echo $sql;
    mysql_query($sql);
}
$plannerId=$_GET['plannerId'];
session_start();
$sid=$_SESSION['sid'];
$result=getPlannerBySid($sid,$plannerId);
$newPlannerId=mysql_fetch_array(getMaxPlannerIdBySid($sid))[0]+1;
insertNewPlan($sid,$newPlannerId,"Planner".$newPlannerId);
while($row=mysql_fetch_array($result)){
    save($row['cid'],$row['sid'],$row['term'],$newPlannerId);
}
header("location:../view/displayPlanner.php?plannerId=".$newPlannerId);
?>