<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/11/5
 * Time: 7:59
 */
include_once "getRequired.php";
$con=mysql_connect("localhost:3306","root","5656123ljx");
if(!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("capstone",$con);
function getMajorCreditByMajorName($majorName){
    $sql="select * from major where majorName='".$majorName."'";
    $result=mysql_query($sql);
    $credit=mysql_fetch_array($result)['credits'];
    return $credit;
}
function addMajor($mid,$majorName,$credits,$majorFullName,$department){
    $sql="insert into major(mid,majorName,credits,majorFullName,Department) values('".$mid."','".$majorName."','".$credits."','".$majorFullName."','".$department."')";
    mysql_query($sql);
}
function getAllMajor(){
    $sql="select * from major";
    return mysql_query($sql);
}
function deleteMajorByMid($mid){
    $sql="delete from major where mid='".$mid."'";
    mysql_query($sql);
    deleteRequiredByMajorName($mid);
}
?>