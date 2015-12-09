<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/11/12
 * Time: 4:23
 */
$con=mysql_connect("localhost:3306","root","5656123ljx");

if(!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("capstone",$con);
function getPlannerBySidAndTerm($sid,$term,$plannerId){
    $sql="select * from planner where sid='".$sid."' and term='".$term."'and plannerId='".$plannerId."'";
    return mysql_query($sql);
}
function getPlannerBySid($sid,$plannerId){
    $sql="select * from planner where sid='".$sid."' and plannerId='".$plannerId."'";
   // echo $sql;
    $result=mysql_query($sql);
    return $result;
}
function deleteCourseFromPlanner($sid,$cid,$plannerId){
    $sql="delete from planner where sid='".$sid."' and cid='".$cid."'and plannerId='".$plannerId."'";
    mysql_query($sql);
}
function isInPlanner($array,$plannerId){
    $sql="select * from planner where plannerId='".$plannerId."'and ( cid='".$array[0]."'";
    for($i=1;$i<count($array);$i++){
        $sql.=" or cid='".$array[$i]."'";
    }
    $sql.=" )";
    // echo $sql."\n";
    $result=mysql_query($sql);
    $row=mysql_fetch_array($result);
    if($row[0]!=null){
        return true;
    }else{
        return false;
    }
}
?>