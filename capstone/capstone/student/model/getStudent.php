<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 10/10/2015
 * Time: 1:46 AM
 */
$con=mysql_connect("localhost:3306","root","5656123ljx");
if(!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("capstone",$con);
function getStudentById($sid){
    $sql="select * from student where sid='".$sid."'";
    //echo $sql;
    $result=mysql_query($sql);
    return $result;
}
?>