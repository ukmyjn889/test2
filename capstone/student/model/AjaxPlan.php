<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/12/1
 * Time: 15:38
 */
include_once "getCourseList.php";
include_once "getRequired.php";
include_once "getStudent.php";
include_once "checkPrerequisites.php";
include_once "getStu_offering.php";
include_once "getStu_Plan.php";

$con=mysql_connect("localhost:3306","root","5656123ljx");
if(!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("capstone",$con);
function saveOnePlannerCourse($value,$sid,$term,$plannerId){
    $sql="insert into planner (sid,cid,term,plannerId) VALUES ('".$sid."','".$value."','".$term."','".$plannerId."')";
    //echo $sql;
    mysql_query($sql);
}
function insertPlan($sid,$plannerId,$nickName){
    $sql="insert into stu_plan(sid,plannerId,nickName) VALUES ('".$sid."','".$plannerId."','".$nickName."')";
    mysql_query($sql);
}
function echoOrString($orArray){
    $str="";
    for($i=0;$i<count($orArray)-1;$i++){
        $str.=$orArray[$i]." or ";
    }
    $str.=$orArray[count($orArray)-1];
    return $str;
}
function checkPrerequisites($cid,$selectedCourse){
    $prerequisites=getPrerequisitesStringByCid($cid);
//echo $prerequisites;
    $array=transPreToCNF($prerequisites);
//print_r($array);
   // $error=array();
    $count=0;
    $error="";
    if($prerequisites!=null) {
        for ($i = 0; $i < count($array); $i++) {
            //1.将array[$i]中的or 解析出来，放在新数组中
            $orArray = divOrStringIntoArray($array[$i]);
            //2.将这个数组放入profile里面进行查询，返回T or F
            //print_r($orArray);
            //3. 返回F就给$error赋值，否则继续
            if (!isInStu_offering($orArray)) {
                if(!isInSelectedCourse($orArray,$selectedCourse)) {
                    $error.=echoOrString($orArray)."\n";
                    $count++;
                }
            }

        }

    }
    if($count!=0){
        return $error;
    }else{
        return "true";
    }
}
function isInSelectedCourse($orArray,$selectedCourse){
    foreach($orArray as $value){
        if(in_array($value,$selectedCourse)){
            return true;
        }
    }
    return false;
}
$method=$_POST['method'];
$checkedCourse = $_POST['cids'];
$array = explode(",", $checkedCourse);
if ($method==1) {
    $currentSemester = $_POST['currentSemester'];
    //$array = explode(",", $checkedCourse);
    $flag ="true";
    foreach ($array as $key => $value) {
        if (checkPrerequisites($value, $array)!="true") {
            $flag = $value;
            break;
        }
    }
    echo $flag;
//    if ($flag != true) {
//        echo $flag;
//    } else {
//        echo "true";
//    }
}else if($method==2){
    $unselectedCourse=array();
    $currentSemester = $_POST['currentSemester'];
    session_start();
    $semesterCourses=$_SESSION['semesters'];
    for($i=0;$i<$currentSemester;$i++){
        foreach($semesterCourses[$i] as $key=>$value){
            if(!in_array($value['cid'],$array)){
               // $value['available']="true";
                if($value['cid']!="true") {
                    $m = checkPrerequisites($value['cid'], $array);
                    if ($m == "true") {
                       // $semesterCourses[$currentSemester][$key]['available'] = "true";
                        $value['available'] = "true";
                    } else {
                       // $semesterCourses[$currentSemester][$key]['available'] = "required:\n" . $m;
                        $value['available'] = "required:\n" . $m;
                    }
                }
                //$_SESSION['semesters']=$semesterCourses;
                array_push($unselectedCourse,$value);
            }
        }
    }

    foreach($semesterCourses[$currentSemester] as $key=>$value){
        $m=checkPrerequisites($value['cid'],$array);
       if($m=="true") {
           $semesterCourses[$currentSemester][$key]['available']="true";
           $value['available'] = "true";
       }else{
           $semesterCourses[$currentSemester][$key]['available']="required:\n".$m;
           $value['available'] = "required:\n".$m;
       }

            array_push($unselectedCourse,$value);

    }
   // $_SESSION['semesters']=$semesterCourses;
    echo json_encode($unselectedCourse);
}
else if($method="generate"){
    session_start();
    $sid=$_SESSION['sid'];
    $plannerId= mysql_fetch_array(getMaxPlannerIdBySid($sid))[0];
    $plannerId++;
    for($i=0;$i<count($array);$i=$i+2){
        $cid=$array[$i];
        $term=$array[$i+1];
        saveOnePlannerCourse($cid,$sid,$term,$plannerId);
    }
    insertPlan($sid,$plannerId,"Planner".$plannerId);
    echo "Congratulations! Your plan has saved in the system";
}
?>