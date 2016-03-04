<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/11/3
 * Time: 16:57
 */
$con=mysql_connect("localhost:3306","root","5656123ljx");
if(!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("capstone",$con);
function getMaxMajorID(){
    $sql="select Max(mid) from required";
    return mysql_fetch_array(mysql_query($sql))[0];
}
function insertRequired($mid,$majorName,$subject,$credits,$component,$options,$listid,$remark,$listname){
    $sql="insert into requried(mid,majorname,subject,credits,component,options,listid,remark,listname) VALUES
('".$mid."','".$majorName."','".$subject."','".$credits."','".$component."','".$options."','".$listid."','".$remark."','".$listname."')";
    mysql_query($sql);
}
function getAllSubjectsByMajor($major){
    $sql = "select * from required where majorName='" . $major . "'order by options";
    $result = mysql_query($sql);
return $result;
}
function getAllElectiveSubject($major){
    $sql = "select * from required where majorName='" . $major . "' and component<>'required'";
    $result=mysql_query($sql);
    return $result;
}
function addRequired($rid,$mid,$majorName,$subject,$credits,$component,$options,$listid,$remark,$listname){
    $sql="insert into required(rid,mid,majorName,subject,credits,componment,options,listid,remark,listname) VALUES ('".$rid."','".$mid."','".$majorName."','".$subject."','".$credits.
        "','".$component."','".$options."','".$listid."','".$remark."','".$listname."')";
    mysql_query($sql);
}
function deleteRequiredByMajorName($mid){
    $sql="delete from requied where mid='".$mid."'";
    mysql_query($sql);
}
?>