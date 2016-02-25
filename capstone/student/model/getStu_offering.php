<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 10/10/2015
 * Time: 1:40 AM
 */
$con=mysql_connect("localhost:3306","root","5656123ljx");
if(!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("capstone",$con);

function getStu_offeringBySid($sid){
    $sql="select * from stu_offering where sid='".$sid."'";
    $result=mysql_query($sql);
    return $result;
}
function getStu_offeringByOid($oid){
    $sql="select * from stu_offering where oid='".$oid."'";
    $result=mysql_query($sql);
    return $result;
}
function getStu_offeringBySidAndCid($sid,$cid){
    $sql="select * from stu_offering where cid='".$cid."' and sid='".$sid."'";
   // echo $sql;
    return mysql_fetch_array(mysql_query($sql));
}
function isInStu_offering($array,$sid){
    $sql="select * from stu_offering where sid='".$sid."' and (cid='".$array[0]."'";
    for($i=1;$i<count($array);$i++){
        $sql.=" or cid='".$array[$i]."'";
    }
    $sql.=")";
    //echo $sql."\n";
    $result=mysql_query($sql);
    $row=mysql_fetch_array($result);
    if($row[0]!=null){
    return true;
    }else{
    return false;
    }
}
function saveStu_offering($sid,$cid,$oid,$takenTime){
    $sql="insert into stu_offering (sid,cid,oid,term) VALUES ('".$sid."','".$cid."','".$oid."','".$takenTime."')";
    //echo $sql;
    mysql_query($sql);
}

?>