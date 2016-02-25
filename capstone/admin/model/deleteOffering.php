<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2016/1/30
 * Time: 6:58
 */$con=mysql_connect("localhost:3306","root","5656123ljx");
if(!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("capstone",$con);
function deleteByOid($oid){
    $sql="delete from offering where oid='".$oid."'";
    mysql_query($sql);
}
?>