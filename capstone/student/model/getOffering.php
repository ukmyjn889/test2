<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 10/9/2015
 * Time: 11:53 PM
 */
//include_once "getCourse.php";
$con=mysql_connect("localhost:3306","root","5656123ljx");
if(!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("capstone",$con);
function getOfferingByCid($cid){
$sql="select * from Offering where cid='".$cid."'";
    $result=mysql_query($sql);
    return $result;
}
function getOfferingById($oid){
    $sql="select * from offering where oid='".$oid."'";
   // echo $sql;
    $result=mysql_query($sql);
    return $result;
}
function transWeekIntoString($row){
    $string="";
    if($row['Mon']=="T"){
        $string.="Mon ";
    }
    if($row['Tue']=="T"){
        $string.="Tue ";
    }
    if($row['Wed']=="T"){
        $string.="Wed ";
    }
    if($row['Thu']=="T"){
        $string.="Thu ";
    }
    if($row['Fri']=="T"){
        $string.="Fri ";
    }
    if($row['Sat']=="T"){
        $string.="Sat ";
    }
    if($row['Sun']=="T"){
        $string.="Sun ";
    }
    return $string;
}
function setOfferingTimeTable($offeringRow,$array){
    //suppose first class start from 7;00am to 21:00:00
    $startArray=explode(":",$offeringRow['TimeStart']);
    $endArray=explode(":",$offeringRow['TimeEnd']);
   // echo $startArray[0];
   // echo $endArray[0];
    $startIndex=((int)$startArray[0]-7)*12+((int)$startArray[1]/5);
    $endIndex=((int)$endArray[0]-7)*12+((int)$endArray[1]/5);
    //echo $startIndex;
    //echo $endIndex;
   // print_r($offeringRow);
    for($i=$startIndex;$i<=$endIndex;$i++) {
        if ($offeringRow['Mon'] == "T") {
            $array[0][$i]="x";
        }
        if ($offeringRow['Tue'] == "T") {
            $array[1][$i]="x";
        }
        if ($offeringRow['Wed'] == "T") {
            $array[2][$i]="x";
        }
        if ($offeringRow['Thu'] == "T") {
            $array[3][$i]="x";
        }
        if ($offeringRow['Fri'] == "T") {
            $array[4][$i]="x";
        }
        if ($offeringRow['Sat'] == "T") {
            $array[5][$i]="x";
        }
        if ($offeringRow['Sun'] == "T") {
            $array[6][$i]="x";
        }
    }
   // print_r($array);
    return $array;

}
function isOccupied($oid,$timeTable){
    //echo $oid;
    $result=getOfferingById($oid);
    $row=mysql_fetch_array($result);
    //print_r($row);
    $startArray=explode(":",$row['TimeStart']);
    $endArray=explode(":",$row['TimeEnd']);
//    echo $startArray[0];
//    echo $endArray[0];
    $startIndex=((int)$startArray[0]-7)*12+((int)$startArray[1]/5);
    $endIndex=((int)$endArray[0]-7)*12+((int)$endArray[1]/5);
   // echo $startIndex;
   // echo $endIndex;
    for($i=$startIndex;$i<=$endIndex;$i++) {
        //echo $i." ";
        if ($row['Mon'] == "T") {
           if( $timeTable[0][$i]=="x") {
               return false;
           }
        }
        if ($row['Tue'] == "T") {
            if( $timeTable[1][$i]=="x") {
                return false;
            }
        }
        if ($row['Wed'] == "T") {
            if( $timeTable[2][$i]=="x") {
                return false;
            }
        }
        if ($row['Thu'] == "T") {
            if( $timeTable[3][$i]=="x") {
                return false;
            }
        }
        if ($row['Fri'] == "T") {
            if( $timeTable[4][$i]=="x") {
                return false;
            }
        }
        if ($row['Sat'] == "T") {
            if( $timeTable[5][$i]=="x") {
                return false;
            }
        }
        if ($row['Sun'] == "T") {
            if( $timeTable[6][$i]=="x") {
                return false;
            }
        }
    }
    return true;
}
?>