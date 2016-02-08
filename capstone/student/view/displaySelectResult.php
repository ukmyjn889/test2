<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 10/10/2015
 * Time: 4:36 AM
 */
include_once "studentView.php";
include_once "../model/checkPrerequisites.php";
include_once "../model/getStu_offering.php";
include_once "../model/getOffering.php";
session_start();
$sid=$_SESSION['sid'];
$cid=$_POST['cid'];
$lecOid=$_POST['lec'];
$labOid=$_POST['lab'];
$prerequisites=getPrerequisitesStringByCid($cid);
//echo $prerequisites;
$array=transPreToCNF($prerequisites);
//print_r($array);
$error=array();
$count=0;
$error[$count]=null;
if($prerequisites!=null) {
    for ($i = 0; $i < count($array); $i++) {
        //1.将array[$i]中的or 解析出来，放在新数组中
        $orArray = divOrStringIntoArray($array[$i]);
        //2.将这个数组放入profile里面进行查询，返回T or F
        //print_r($orArray);
        //3. 返回F就给$error赋值，否则继续
        if (!isInStu_offering($orArray)) {
            $error[$count] = $array[$i];
            $count++;
        }

    }
}

//@如果发现error里面有值，返回select 界面（可异步） #否则check offering 是否与本人已选课程冲突
if($error[0]!=null){
    //echo "xx";
   // print_r($error);
    ?>
<p align="center">
    <img src="../../images/wrong.png">
    <br>






    <?php
    for($i=0;$i<count($error);$i++){
        echo ($i+1);
        echo ".";
        echo $error[$i];
        echo "<br/>";

    }
    ?>

    <a href="javascript:history.back()">back</a>&nbsp;&nbsp;&nbsp;
    <a href="displayCourse.php">home page</a>
    <!--</div>-->
</p>
<?php }else{
    //echo "xx";
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
   // print_r($timeTable);
    if(isOccupied($lecOid,$timeTable)==true){
       // echo 1;
        if($labOid!=null){
            if(isOccupied($labOid,$timeTable)==true){
               // echo 1;
                    saveStu_offering($sid,$cid,$lecOid,2015);
                    $cidL=$cid."L";
                    saveStu_offering($sid,$cidL,$labOid,2015);
            }else{
                $error[$count]=$cid." lab offering time is occupied";
                $count++;
            }
        }else{
                saveStu_offering($sid,$cid,$lecOid,2015);
        }
    }else{
        $error[$count]=$cid." lecture offering time is occupied";
        $count++;
    }
echo "<br>";
    echo "<br>";
    echo "<br>";
    if($count==0){

        ?>
        <p align="center">
            <img src="../../images/Correct.png">
            <br>
            select successful!<br>


    <?php

    }else{

        ?>
<!--        <div >-->
        <p align="center">
            <img src="../../images/wrong.png">
            <br>






        <?php
      for($i=0;$i<count($error);$i++){
          echo ($i+1);
          echo ".";
          echo $error[$i];
          echo "<br/>";

      }

    }
    ?>

<a href="javascript:history.back()">back</a>&nbsp;&nbsp;&nbsp;
            <a href="displayCourse.php">home page</a>
<!--</div>-->
            </p>
<?php
//print_r($error);
   // saveStu_offering($sid,$cid,$lecOid,2015);
   // if($labOid!=null){
       // $cidL=$cid."L";
       // saveStu_offering($sid,$cidL,$labOid,2015);
    //}
   // echo "yes";

}
//#0.首先查找stu_offering表，看是否已经选择了该课程

//#2.将传进来的offering的时间与临时表的时间进行比对，一旦被占用就返回F
//#3.如果被占用，给$error赋值，否则选课成功，跳转到成功页面
include_once "studentViewEnd.php";
?>
