<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/11/3
 * Time: 22:59
 */
include_once "getRequired.php";
include_once "getCourseList.php";
function getMajorProfileByMajor($major){
    $result=getAllSubjectsByMajor($major);
    $returnValue=array();
    $i=1;
    while($row=mysql_fetch_array($result)){
       // print_r($row);
        $returnSubValue=array();
            $returnSubValue[0]=$row;
            $j=1;
            $listID=$row['listid'];
        //
            $r=getListByListID($listID);
            while($tempRow=mysql_fetch_array($r)){
                $returnSubValue[$j]=$tempRow;
                $j++;
            }
        if($row['component']=="required"){
            $returnValue[0]=$returnSubValue;
        }else{
            $returnValue[$i]=$returnSubValue;
            $i++;
        }

    }
    return $returnValue;
}
?>