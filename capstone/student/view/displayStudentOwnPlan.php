<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/11/12
 * Time: 4:15
 */
include_once "../model/getCourseList.php";
include_once "../model/getPlanner.php";
include_once "studentView.php";
$term1=$_GET['term1'];
$term2=$_GET['term2'];
$term=$term1." ".$term2;
$plannerId=$_GET['plannerId'];
session_start();
$sid=$_SESSION['sid'];
$delete=$_GET['delete'];
if($delete!=null){
    deleteCourseFromPlanner($sid,$delete,$plannerId);
}
if($term==null){
    echo "Did not set a planner in this term";
}else {
    $result = getPlannerBySidAndTerm($sid, $term,$plannerId);
    echo "<div  style='position: absolute;left: 100px;top:100px'>";
    echo "These are the courses you plan to take in this term";
    echo "<table border='1' width='500' >";
    while($row=mysql_fetch_array($result)){
        $cid=$row['cid'];
        $subResult=getListByCid($cid);
        $temp=mysql_fetch_array($subResult);
        $credits=$temp['credits'];
        echo "<tr><td>";
        echo $cid;
        echo "</td><td >";
        echo $credits;
        echo "</td><td width='10'>";
        echo "<a href='displayStudentOwnPlan.php?delete=".$cid."&term1=".$term1."&term2=".$term2."&plannerId=".$plannerId."'>Delete<a>";

        echo "</td></tr>";
    }
    echo "</table>";
    echo "</div>";
}
include_once "studentViewEnd.php";
?>