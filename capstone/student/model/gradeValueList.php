<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2016/2/19
 * Time: 23:37
 */
function getGradeValueList(){
    $list=array();
    array_push($list,"F");
    array_push($list,"0");
    array_push($list,"EF");
    array_push($list,"1");
    array_push($list,"E");
    array_push($list,"2");
    array_push($list,"DE");
    array_push($list,"3");
    array_push($list,"D");
    array_push($list,"4");
    array_push($list,"CD");
    array_push($list,"5");
    array_push($list,"C");
    array_push($list,"6");
    array_push($list,"BC");
    array_push($list,"7");
    array_push($list,"B");
    array_push($list,"8");
    array_push($list,"AB");
    array_push($list,"9");
    array_push($list,"A");
    array_push($list,"10");
    return $list;
}
function compareGrade($list,$grade1,$grade2){
    if(getValue($list,$grade1)>getValue($list,$grade2)){
        return 1;
    }else if(getValue($list,$grade1)<getValue($list,$grade2)){
        return -1;
    }else{
        return 0;
    }
}
function getValue($list,$grade){
    foreach($list as $key=>$value){
        if($value==$grade){
            return $list[$key+1];
        }
    }
    return -1;
}
?>