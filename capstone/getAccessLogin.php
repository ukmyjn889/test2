<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 10/6/2015
 * Time: 1:23 AM
 */
$username=$_POST["username"];
$password=$_POST["password"];
if($username=="admin"){
    $username="0";
}
$password=passport_encrypt($password,$username);
$flag=isValid($username,$password);
//echo 1;
//echo $username;

if($flag==true){
    //echo 1;
    session_start();
    if($username!="0") {
        $_SESSION["sid"] = $username;
        //header
        header("location:student/view/displayStudentProfile.php");
    }else{
        header("location:admin/view/showCourse.php");
    }
}else{
    echo "error";
}
function isValid($username,$password){
    $con=mysql_connect("localhost:3306","root","5656123ljx");
    if(!$con){
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("capstone",$con);
    $sql="";
        $sql = "select * from student where sid='" . $username . "' and password='" . $password . "'";
        //echo $sql;
    $result=mysql_query($sql);
    $row=mysql_fetch_array($result);
    if($row[0]!=null){
        return true;
    }else{
        return false;
    }

}
//2015/10/16 update
function passport_encrypt($str,$username){
    $con=mysql_connect("localhost:3306","root","5656123ljx");
    if(!$con){
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("capstone",$con);
    $sql="select salt from student where sid='".$username."'";
   $staticSalt="uwl";
    $dynamicSalt=mysql_fetch_array(mysql_query($sql))[0];
    return hash("sha256",$staticSalt.$str.$dynamicSalt);
}

?>