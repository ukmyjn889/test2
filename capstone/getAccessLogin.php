<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 10/6/2015
 * Time: 1:23 AM
 */
$username=$_POST["username"];
$password=$_POST["password"];
//if($username=="admin"){
//    $username="admin";
//}
//echo $username;
$con=mysql_connect("localhost:3306","root","5656123ljx");
if(!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("capstone",$con);
$password=passport_encrypt($password,$username);
$flag=isValid($username,$password);
//echo 1;
//echo $username;

if($flag==true){
    //echo 1;

    if($username!="admin") {
      //  $_SESSION["sid"] = $username;
        //header
        session_start();
        $sql="select sid from student where username='".$username."'";
        $sid=mysql_fetch_array(mysql_query($sql))[0];
        $_SESSION["sid"]=$sid;
        header("location:student/view/displayStudentProfile.php");
    }else{
       // $_SESSION["sid"]=getSidByUsername($username);
        header("location:admin/view/showCourse.php");
    }
}else{
  ?>
<script>
    alert("Username and password are not match!");
    window.location="Login.html";
</script>
<?php
   // header("location:Login.html");
}
function isValid($username,$password){

    $sql="";
        $sql = "select * from student where username='" . $username . "' and password='" . $password . "'";
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
    $sql="select salt from student where username='".$username."'";
   $staticSalt="uwl";
    $dynamicSalt=mysql_fetch_array(mysql_query($sql))[0];
    return hash("sha256",$staticSalt.$str.$dynamicSalt);
}

?>