<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/10/21
 * Time: 23:28
 */
require_once "getStu_offering.php";
include "getOffering.php";
function getOfferingTimeTable($sid){
    $temp=getStu_offeringBySid($sid);
    $timeTable=array();
    //#1.遍历该学生所选的offering，将该学生的课程时间放入一个临时的表里
    while($row=mysql_fetch_array($temp)){
        //print_r($row);
        $offeringResult=getOfferingById($row['oid']);
        $offeringRow=mysql_fetch_array($offeringResult);
        // print_r($offeringRow);
        $timeTable=setOfferingTimeTable($offeringRow,$timeTable);

    }
    return $timeTable;
}
function getOfferingArratOrderbyTimeStart($sid){

}
function getOfferingBySidOrderByAscent($sid){
    $result=getStu_offeringBySid($sid);
    $oidArray=array();
    $timeTable=array();
    while($row=mysql_fetch_array($result)){
        $oid=$row['oid'];
       array_push($oidArray,$oid);
    }
    $timeTable=array();
    array_push($timeTable,getOfferingByOidArray($oidArray,"Mon"));
    array_push($timeTable,getOfferingByOidArray($oidArray,"Tue"));
    array_push($timeTable,getOfferingByOidArray($oidArray,"Wed"));
    array_push($timeTable,getOfferingByOidArray($oidArray,"Thu"));
    array_push($timeTable,getOfferingByOidArray($oidArray,"Fri"));
    array_push($timeTable,getOfferingByOidArray($oidArray,"Sat"));
    array_push($timeTable,getOfferingByOidArray($oidArray,"Sun"));

    //print_r($timeTable);
    return $timeTable;
}
function calculateOfferingPeriod($offeringRow){
    $startArray=explode(":",$offeringRow['TimeStart']);
    $endArray=explode(":",$offeringRow['TimeEnd']);
    $startIndex=((int)$startArray[0]-7)*12+((int)$startArray[1]/5);
    $endIndex=((int)$endArray[0]-7)*12+((int)$endArray[1]/5);
    return ceil(($endIndex-$startIndex)/2);
}
?>