<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/11/11
 * Time: 9:00
 */
include_once "checkPrerequisites.php";
include_once "getCourseList.php";
include_once "getStu_offering.php";
include_once "getRequired.php";
include_once "getStudent.php";
include_once "getPlanner.php";
$con=mysql_connect("localhost:3306","root","5656123ljx");
if(!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("capstone",$con);
function checkPrerequisitesOnPlanner($cid,$plannerId){
    $prerequisites=getPrerequisitesStringByCid($cid);
//echo $prerequisites;
    $array=transPreToCNF($prerequisites);
//print_r($array);
    $error=array();
    $count=0;
    $error[$count]=null;
    if($prerequisites!=null) {
        for ($i = 0; $i < count($array); $i++) {
            //1.将array[$i]中的or 解析出来，放在新数组中
            $orArray = divOrStringIntoArray($array[$i]);
            //2.将这个数组放入profile里面进行查询，返回T or F
            //print_r($orArray);
            //3. 返回F就给$error赋值，否则继续
            if (!isInPlanner($orArray,$plannerId)) {
                $error[$count] = $array[$i];
                $count++;
            }

        }

    }
    if($count!=0){
        return false;
    }else{
        return true;
    }
}
function checkPrerequisites($cid){
    $prerequisites=getPrerequisitesStringByCid($cid);
//echo $prerequisites;
    $array=transPreToCNF($prerequisites);
//print_r($array);
    $error=array();
    $count=0;
    $error[$count]=null;
    if($prerequisites!=null) {
        for ($i = 0; $i < count($array); $i++) {
            //1.将array[$i]中的or 解析出来，放在新数组中
            $orArray = divOrStringIntoArray($array[$i]);
            //2.将这个数组放入profile里面进行查询，返回T or F
            //print_r($orArray);
            //3. 返回F就给$error赋值，否则继续
            if (!isInStu_offering($orArray)) {
                $error[$count] = $array[$i];
                $count++;
            }

        }

    }
    if($count!=0){
        return false;
    }else{
        return true;
    }
}
function getCoursesIncludeTaken($listid){
    $sql="select * from course_list where listid='".$listid."'";
    $result=mysql_query($sql);
    return $result;
}
function getCoursesExceptTaken($sid,$listid){
    $sql="select * from course_list where listid='".$listid."' and cid not in(select cid from stu_offering where sid='".$sid."') and cid not in(select cid from planner where sid='".$sid."')";
    $result=mysql_query($sql);
    return $result;
}
//session_start();

//$result=getStu_offeringBySid($sid);
//$takenList=array();
//while($row=mysql_fetch_array($result)){
//    array_push($takenList,$row['cid']);
//}
function getMajorOverView($sid,$plannerId){
    $result = getStudentById($sid);
    $row = mysql_fetch_array($result);
    $major = $row['major'];
    $courseTakenOrPlanArray=getCidFromPlannerAndStu_OfferingBySid($sid,$plannerId);
   // print_r($courseTakenOrPlanArray);
    $result = getAllSubjectsByMajor($major);
    //echo $major;
    $father = array();
    $son = array();
    while ($row = mysql_fetch_array($result)) {
       // print_r($row['listid']);
        array_push($father, $row);
        $subResult = getListByListID($row['listid']);
        $subSon = array();
        while ($subRow = mysql_fetch_array($subResult)) {
            // print_r($subRow);
            $temp=array();
            $temp['cid']=$subRow['cid'];
            $temp['credits']=$subRow['credits'];
            if(in_array($subRow['cid'],$courseTakenOrPlanArray)){
                $temp['term']=getTermByCid($subRow['cid'],$plannerId);
            }else{
                if(checkPrerequisites($subRow['cid'])){
                    $temp['term']="true";
                }else{
                   if(checkPrerequisitesOnPlanner($subRow['cid'],$plannerId)) {
                       $temp['term'] = "true";
                   }else{
                       $temp['term'] = "false";
                   }
                }
            }
            array_push($subSon, $temp);
        }
        array_push($son, $subSon);
    }
    $returnValue = array();
    array_push($returnValue, $father);
    array_push($returnValue, $son);
    return $returnValue;
}
function getTermByCid($cid,$plannerId){
    $sql="select term from stu_offering where cid='".$cid."'";
    $result=mysql_query($sql);
    $row=mysql_fetch_array($result);
    if($row==null){
        $sql="select term from planner where cid='".$cid."' and plannerId='".$plannerId."'";
        $result=mysql_query($sql);
        $row=mysql_fetch_array($result);
        return $row['term'];
    }else{
        return "Taken";
    }

}
function getCidFromPlannerAndStu_OfferingBySid($sid,$plannerId){
    $cidResult=Array();
    $sql="select cid from planner where sid='".$sid."' and plannerId='".$plannerId."'";
    $result=mysql_query($sql);
    while($row=mysql_fetch_array($result)){
        array_push($cidResult,$row['cid']);
    }
    $sql="select cid from stu_offering where sid='".$sid."'";
    $result=mysql_query($sql);
    while($row=mysql_fetch_array($result)){
        array_push($cidResult,$row['cid']);
    }
    return $cidResult;

}
function getUntakenCourses($sid)
{
    $result = getStudentById($sid);
    $row = mysql_fetch_array($result);
    $major = $row['major'];

    $result = getAllSubjectsByMajor($major);
    $father = array();
    $son = array();
    while ($row = mysql_fetch_array($result)) {
        array_push($father, $row);
        $subResult = getCoursesExceptTaken($sid, $row['listid']);
        $subSon = array();
        while ($subRow = mysql_fetch_array($subResult)) {
            array_push($subSon, $subRow);
        }
        array_push($son, $subSon);

    }
    $returnValue = array();
    array_push($returnValue, $father);
    array_push($returnValue, $son);
    return $returnValue;
}
//print_r(getUntakenCourses($_GET['sid']));
//foreach($listid as $value){
//    $result=getListByListID($value);
//}
?>