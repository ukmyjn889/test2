<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/11/3
 * Time: 22:58
 */
$con=mysql_connect("localhost:3306","root","5656123ljx");
if(!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("capstone",$con);
function getListByListID($listID){
    $sql="select * from course_list where listid='".$listID."'";
    $result=mysql_query($sql);
    return $result;
}
?>