<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 10/5/2015
 * Time: 11:51 PM
 *///加密函数
    function passport_encrypt($str){ //加密函数
        return md5($str);
    }
function addStudentProfile($sid,$name,$major,$grade,$password){
    $con=mysql_connect("localhost:3306","root","5656123ljx");
    if(!$con){
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("capstone",$con);
    $sql="insert into student VALUES ('$sid','$name','$major','$grade','$password')";
    // echo $sql;
    mysql_query($sql);
    mysql_close($con);

}

$sid=$_POST["sid"];
$name=$_POST["name"];
$major=$_POST["major"];
$grade=$_POST["grade"];
$password="888888";

$password=passport_encrypt($password);
addStudentProfile($sid,$name,$major,$grade,$password);

?>
