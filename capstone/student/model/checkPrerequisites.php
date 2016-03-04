<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 10/10/2015
 * Time: 3:23 AM
 */
include_once "../../AnalysisPrerequisites.php";
include_once "getStu_offering.php";
include_once "gradeValueList.php";
include_once "getStudent.php";
$con=mysql_connect("localhost:3306","root","5656123ljx");
if(!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("capstone",$con);
function getPrerequisitesStringByCid($cid){
    $sql="select prerequisites from Course where cid='".$cid."'";
    $result=mysql_query($sql);
    return mysql_fetch_array($result)[0];
}
function getCrossListByCid($cid){
    $sql="select crosslist from course where cid='".$cid."'";
    $result=mysql_query($sql);
    return mysql_fetch_array($result)[0];
}
function getRestrictionByCid($cid){
    $sql="select restrictions from course where cid='".$cid."'";
    $result=mysql_query($sql);
    return mysql_fetch_array($result)[0];
}
function transPreToCNF($prerequisites){
    $stack=analysis($prerequisites);
    return $stack[0];
}
function analysisEachOrArray($string,$sid){
    $flag=4;

    for($i=0;$i<strlen($string);$i++){
       // echo
        $char=$string{$i};
//echo $char;
        if($char=='^'){
            $flag=0;
            break;
        }else if($char=='@'){
            $flag=1;
            break;
        }else if($char=='#'){
            $flag=2;
            break;
        }else if($char=='$'){
            $flag=3;
            break;
        }
    }
    $array=array();

    switch($flag){
        case 0:
            $array=explode("^",$string);
            //echo $array[0];
            $row=getStu_offeringBySidAndCid($sid,$array[1]);
           // echo $row['sid'];
            $list=getGradeValueList();
            if($row['mark']==null||$row['mark']==""){
                return false;
            }

           // echo $array[0];
            if(compareGrade($list,$row['mark'],$array[0])>=0) {
                // $list=array();
                return true;
            }else{
                return false;
            }
        case 1:
            $array=explode("@",$string);
            return true;
        case 2:
            $array=explode("#",$string);
            //echo $array[1];
            $major=mysql_fetch_array(getStudentById($sid))['major'];
            if($major==$array) {
                return true;
            }else{
                return false;
            }
        case 3:
            $array=explode("$",$string);
            $registerYear=mysql_fetch_array(getStudentById($sid))['grade'];
            $registerSemester=mysql_fetch_array(getStudentById($sid))['semester'];
           // $newArray=explode("-",$array[1]);
            $currentSemesterValue=32;
            $semesterValue=0;
            if($registerSemester=="Fall"||$registerSemester=="fall"){
                $semesterValue=1;
            }
          $registerValue=($registerYear-2000)*2+$semesterValue;
            $stayLengthValue=$currentSemesterValue-$registerValue;
            $requiredLengthValue=0;
            if($array[1]=="Sophomore"||$array[1]=="sophomore"){
                $requiredLengthValue=2;
            }else if($array[1]=="junior"||$array[1]=="Junior"){
                $requiredLengthValue=4;
            }else if($array[1]=="senior"||$array[1]=="Senior"){
                $requiredLengthValue=6;
            }
           // echo $array[1];
           // echo $registerYear."   ".$registerSemester."   ".$registerValue."   ".$stayLengthValue."   ".$requiredLengthValue;
            if($stayLengthValue<$requiredLengthValue){
                return false;
            }else {
                return true;
            }
        default:
            $tempArray=array();
            array_push($tempArray,$string);
            return isInStu_offering($tempArray,$sid);
    }
}
function divOrStringIntoArray($orString){
    $array=explode(" ",$orString);
    $result=array();
    $count=0;
  //  print_r($array);
    for($i=0;$i<count($array);$i++){
        if("∨"!=$array[$i]){
            $result[$count]=$array[$i];
            $count++;
        }
    }
    return $result;
}
function errorMessagesDecode($errorMessage){
    $orArray=divOrStringIntoArray($errorMessage);
    $returnString="";
//    if(count($orArray)>1){
//        $returnString="";
//    }
    foreach($orArray as $key=>$value){
        if($key==0){
            $returnString .=stringDecode($value);
        }else {
            $returnString .= "or ".stringDecode($value);
        }
    }
    return $returnString;
}
function stringDecode($string){
  //  $orArray=divOrStringIntoArray($string);
    $flag=4;
    for($i=0;$i<strlen($string);$i++){
        // echo
        $char=$string{$i};
//echo $char;
        if($char=='^'){
            $flag=0;
            break;
        }else if($char=='@'){
            $flag=1;
            break;
        }else if($char=='#'){
            $flag=2;
            break;
        }else if($char=='$'){
            $flag=3;
            break;
        }
    }
    $array=array();
    switch($flag){
        case 0:
            $array=explode("^",$string);
            return "Your ".$array[1]." course grade need ".$array[0]." or above";
        case 1:
            return "This function are not implement yet";
        case 2:
            $array=explode("#",$string);
            return "Your Major must be ".$array[1]." to select this course";
        case 3:
            $array=explode("$",$string);
            return "This course requires ".$array[1]." or above";
        default:
            return $string;
    }
}
function checkAll($prerequisites,$crossList,$restriction,$sid,$term){
    $count=0;
    $error=array();
    $error[$count]=null;
    if($prerequisites!=null&&$prerequisites!="") {
        $array=transPreToCNF($prerequisites);
        for ($i = 0; $i < count($array); $i++) {
            //1.将array[$i]中的or 解析出来，放在新数组中
            $orArray = divOrStringIntoArray($array[$i]);
            //2.将这个数组放入profile里面进行查询，返回T or F
            //print_r($orArray);
            //3. 返回F就给$error赋值，否则继续
//        if (!isInStu_offering($orArray)) {
//            $error[$count] = $array[$i];
//            $count++;
//        }
            //print_r($orArray);
            $flag=false;
            for($j=0;$j<count($orArray);$j++){
                //echo $orArray[$j];
                if(analysisEachOrArray($orArray[$j],$sid)){
                    // echo $orArray[$j];
                    $flag=true;
                    break;
                }
            }

            if($flag==false){
                $error[$count] = errorMessagesDecode($array[$i]);
                $count++;
            }

        }
    }
    if($crossList!=null&&$crossList!="") {
        $array = transPreToCNF($crossList);
//$restriction=getRestrictionByCid($cid);
        for ($i = 0; $i < count($array); $i++) {
            //1.将array[$i]中的or 解析出来，放在新数组中
            $orArray = divOrStringIntoArray($array[$i]);
            //2.将这个数组放入profile里面进行查询，返回T or F
            //print_r($orArray);
            //3. 返回F就给$error赋值，否则继续
//        if (!isInStu_offering($orArray)) {
//            $error[$count] = $array[$i];
//            $count++;
//        }
            //print_r($orArray);
            $flag = false;
            for ($j = 0; $j < count($orArray); $j++) {
                //echo $orArray[$j];
                if (!analysisEachOrArray($orArray[$j], $sid)) {
                    // echo $orArray[$j];
                    $flag = true;
                    break;
                }
            }
            if ($flag == false) {
                $error[$count] = "You have already taken ".errorMessagesDecode($array[$i]);
                $count++;
            }

        }
    }
    if($restriction!=null&&$restriction!="") {
        $array =transPreToCNF($restriction);
        // print_r($array);
//$restriction=getRestrictionByCid($cid);
        for ($i = 0; $i < count($array); $i++) {
            //1.将array[$i]中的or 解析出来，放在新数组中
            $orArray = divOrStringIntoArray($array[$i]);
            //2.将这个数组放入profile里面进行查询，返回T or F
            //print_r($orArray);
            //3. 返回F就给$error赋值，否则继续
//        if (!isInStu_offering($orArray)) {
//            $error[$count] = $array[$i];
//            $count++;
//        }
            //print_r($orArray);
            $flag = false;
            for ($j = 0; $j < count($orArray); $j++) {
                //echo $orArray[$j];
                if (!analysisEachOrArray($orArray[$j], $sid)) {
                    // echo $orArray[$j];
                    $flag = true;
                    break;
                }
            }
            if ($flag == false) {
                $error[$count] = "You have already taken ".errorMessagesDecode($array[$i]);
                $count++;
            }

        }
    }
    return $error;
}
?>