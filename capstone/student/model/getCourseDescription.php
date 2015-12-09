<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/12/8
 * Time: 18:23
 */
include_once "getCourse.php";
$cid=$_GET['cid'];
$response="xxx";
$row=mysql_fetch_array(getCourseById($cid));
$response="<p style='font-weight: bolder'>".$row['title']."</p>".$row['description']."<br> Offered ".$row['offerTime'];
echo $response;
?>