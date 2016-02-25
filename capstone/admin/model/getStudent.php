<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2016/2/2
 * Time: 19:19
 */
$con=mysql_connect("localhost:3306","root","5656123ljx");
if(!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("capstone",$con);
function create_password($pw_length){
    $randpwd ="";
for ($i = 0; $i < $pw_length; $i++){
        $randpwd .= chr(mt_rand(33, 126));
}
return $randpwd;
}

function addStudent($sid,$nameL,$major,$grade,$nameF,$semester){
$dynamicSalt=create_password(8);
$staticSalt="uwl";
    $password= hash("sha256",$staticSalt."888888".$dynamicSalt);
    $sql="insert into student(sid,nameL,major,grade,password,nameF,salt,semester) VALUES ('".$sid."','".$nameL."','".$major."','".$grade."','".$password."','".$nameF."','".$dynamicSalt."','".$semester."')";
mysql_query($sql);
}


?>