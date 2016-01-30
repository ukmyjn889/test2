<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/11/21
 * Time: 14:42
 */
include_once "getCourseList.php";
include_once "getRequired.php";
include_once "getStudent.php";
include_once "checkPrerequisites.php";
include_once "getStu_offering.php";
include_once "getCourse.php";
function checkPrerequisites($cid,$selectedCourse){
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
                if(!isInSelectedCourse($orArray,$selectedCourse)) {
                    $error[$count] = $array[$i];
                    $count++;
                }
            }

        }

    }
    if($count!=0){
        return false;
    }else{
        return true;
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
function getKasiPlan($semesters,$sid)
{
    //$plannerId = 1;
    //echo $semesters;
    //echo $sid;
    $AllCourse = array();
    $selectedCourse = array();
    $creditsList = array();
//$result=getPlannerBySid($sid,$plannerId);
//while($row=mysql_fetch_array($result)){
//    array_push($AllCourse,$row);
//}
    $major = mysql_fetch_array(getStudentById($sid))['major'];
    $result = getAllSubjectsByMajor($major);
    while ($row = mysql_fetch_array($result)) {
        array_push($creditsList, $row);
        $listid = $row['listid'];
        $subResult = getListByListID($listid);
        while ($subRow = mysql_fetch_array($subResult)) {
            array_push($AllCourse, $subRow);
        }
    }
   // return $AllCourse;
    session_start();
    $_SESSION['creditsList']=$creditsList;
    $returnResult = array();
    for ($i = 0; $i < $semesters; $i++) {
        $eachLevel = array();
      //  echo "xx<br>";
        foreach ($AllCourse as $key => $value) {
           $row=mysql_fetch_array(getCourseById($value['cid']));
            $value['offerTime']=$row['offerTime'];
            if (checkPrerequisites($value['cid'], $selectedCourse)) {
                if($i==0){
                    $value[5]="true";
                    $value['available']="true";

                }else{
                    $value[5]="false";
                    $value['available']="false";
                }

                array_push($eachLevel, $value);
                //array_push($selectedCourse, $value['cid']);
                unset($AllCourse[$key]);
            }
        }
        foreach ($eachLevel as $value) {
            array_push($selectedCourse, $value['cid']);
            for($ii=0;$ii<count($creditsList);$ii++){
                if($creditsList[$ii]['listid']==$value['listid']){
                    $creditsList[$ii]['credits']-=$value['credits'];
                    break;
                }
            }
        }
       // print_r($eachLevel);
        array_push($returnResult, $eachLevel);

        // echo "<br>";

    }
    $flag=true;
    for($i=0;$i<count($creditsList);$i++){
      //  echo $creditsList[$i]['credits']."<br>";
        if($creditsList[$i]['credits']>0){
            $flag=false;
        }
    }

    if($flag==true) {
        session_start();
        $_SESSION['semesters']=$returnResult;
       // $_SESSION['creditsList']=$creditsList;
        return $returnResult;
    }
    else{
        session_start();
        $_SESSION['semesters']="error";
       // $_SESSION['creditsList']=$creditsList;
        return "error";
    }
}
?>