<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/11/18
 * Time: 21:48
 */
include "getPlanner.php";
$con=mysql_connect("localhost:3306","root","5656123ljx");
if(!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("capstone",$con);
function saveOnePlannerCourse($value,$sid,$term,$plannerId){
    $sql="insert into planner (sid,cid,term,plannerId) VALUES ('".$sid."','".$value."','".$term."','".$plannerId."')";
    //echo $sql;
    mysql_query($sql);
}
$option=$_GET['option'];
echo $option;
if($option==0) {
    $plannerId = $_GET['plannerId'];
    session_start();
    $sid = $_SESSION['sid'];
    $value = $_GET['cid'];
    $term1 = $_GET['term1'];
    $term2 = $_GET['term2'];
    $term = $term1 . " " . $term2;
    saveOnePlannerCourse($value, $sid, $term, $plannerId);
    header("location:../view/displayPlanner.php?plannerId=" . $plannerId);
}else{
   // echo 111;
    session_start();
    $sid=$_SESSION['sid'];
    $option=$_GET['option'];
    $plannerId=$_GET['plannerId'];
    $cid=$_GET['cid'];
    $term1=$_GET['term1'];
    $term2=$_GET['term2'];
    $term=$term1." ".$term2;
    deleteCourseFromPlanner($sid,$cid,$plannerId);
    if($option==1){
        saveOnePlannerCourse($cid,$sid,$term,$plannerId);
    }
    header("location:../view/displayPlanner.php?plannerId=".$plannerId);
}
?>