<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2016/2/25
 * Time: 0:51
 */
$con=mysql_connect("localhost:3306","root","5656123ljx");
if(!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("capstone",$con);
function getCreditByCid($cid){
    $sql="select credits from course where cid='".$cid."'";
    return mysql_fetch_array(mysql_query($sql))[0];
}
?>