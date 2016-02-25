<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 10/10/2015
 * Time: 3:23 AM
 */
include_once "../../AnalysisPrerequisites.php";
$con=mysql_connect("localhost:3306","root","5656123ljx");
if(!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("capstone",$con);
function getCrosslistStringByCid($cid){
    $sql="select crosslist from Course where cid='".$cid."'";
    $result=mysql_query($sql);
    return mysql_fetch_array($result)[0];
}
function transCrossToCNF($crosslist){
    $stack=analysis($crosslist);
    return $stack[0];
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
?>