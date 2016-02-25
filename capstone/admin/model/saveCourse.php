<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 9/10/2015
 * Time: 10:19 PM
 */

function isCidDuplicated($cid){
    $con=mysql_connect("localhost:3306","root","5656123ljx");
    if(!$con){
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("capstone",$con);
    $sql="select * from Course WHERE cid='".$cid."'";
    //echo $sql;
    $result=mysql_query($sql);
    $row = mysql_fetch_array($result);
    if($row!=null){
       // echo "x";
        mysql_close($con);
        return true;
    }else{
       // echo 11;
        mysql_close($con);
        return false;
    }
}
function addCourse($cidL,$titleL,$creditsL,$prerequisitesL,$labL,$restrictions,$crosslist,$major,$offerTime,$description){
    $con=mysql_connect("localhost:3306","root","5656123ljx");
    if(!$con){
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("capstone",$con);
    $sql="insert into course VALUES ('$cidL','$titleL','$creditsL','$prerequisitesL','$labL','$restrictions','$crosslist','$major','$offerTime','$description')";
   // echo $sql;
    mysql_query($sql);
    mysql_close($con);

}
$cid=$_POST["cid"];
$title=$_POST["title"];
$credits=$_POST["credits"];
$prerequisites=$_POST["prerequisites"];
$lab=$_POST["lab"];
$restrictions=$_POST["restrictions"];
$crosslist=$_POST["crosslist"];
$major=$_POST['major'];
$offerTime=$_POST['offerTime'];
$description=$_POST['description'];
if($cid!=null&&$title!=null&&$credits!=null&&$lab!=null){
    //echo 111;
   if(!is_numeric($credits)){
       header("location:addCourse.php?error=credit is not integer");
       return;
   }
    if(!isCidDuplicated($cid)){

        if($lab=="yes"){
            $cidL=$cid."L";
            $titleL=$title;
            $creditsL=0;
            $prerequisitesL="";
            $labL="no";
            $lab="$cidL";
            if($cidL==null){
              //  echo 1;
                header("location:addCourse.php?error=lab id is null");
                return;
            }
            if(!is_numeric($creditsL)){
                header("location:addCourse.php?error=lab credit is not integer");
                return;
            }
            if(!isCidDuplicated($cidL)) {
                addCourse($cid,$title,$credits,$prerequisites,$lab,$restrictions,$crosslist,$major,$offerTime,$description);
                addCourse($cidL, $titleL, $creditsL, $prerequisitesL, $labL,"","",$major,$offerTime,$description);
                header("location:../view/showCourse.php?pageNow=1");
                echo 1;
               // echo $cid." ".$title;
                    return;

            }else{
                header("location:../view/addCourse.php?error=lab cid is null");
                return;
            }
        }else{
            addCourse($cid,$title,$credits,$prerequisites,$lab,$restrictions,$crosslist,$major,$offerTime,$description);
            header("location:../view/showCourse.php?pageNow=1");

            return;
        }
    }else{
        header("location:addCourse.php?error=cid is duplicated");
        return;
    }
}else{
    echo "fail";
}
?>
