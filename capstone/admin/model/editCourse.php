<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 10/6/2015
 * Time: 12:29 AM
 */
function updateCourse($cid,$title,$credits,$prerequisites,$lab,$restrictions,$crosslist)
{
    $con = mysql_connect("localhost:3306", "root", "5656123ljx");
    if (!$con) {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("capstone", $con);
    $sql="update Course set title='".$title."',credits='".$credits."',prerequisites='".$prerequisites."',lab='".$lab."',restrictions='".$restrictions."',crosslist='".$crosslist."' where cid='".$cid."'";
    mysql_query($sql);
}

?>]