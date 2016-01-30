<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2016/1/30
 * Time: 6:57
 */
$con=mysql_connect("localhost:3306","root","5656123ljx");
if(!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("capstone",$con);
function deleteByCid($cid){
    $sql="delete from course where cid='".$cid."'";
    mysql_query($sql);
    $sql="delete from planner where  cid='".$cid."'";
    mysql_query($sql);
    $sql="delete from course_list where  cid='".$cid."'";
    mysql_query($sql);
}
?>