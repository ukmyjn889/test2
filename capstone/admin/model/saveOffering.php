<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 9/19/2015
 * Time: 10:12 PM
 */
//include_once 'Offering.php';
function saveOffering($offering){
    $con=mysql_connect("localhost:3306","root","5656123ljx");
    if(!$con){
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("capstone",$con);
    $sql="insert into Offering (cid,classNum,instNameL,instNameF,timeStart,timeEnd,Mon,Tue,Wed,Thu,Fri,Sat,Sun,semester,enrlState,capEnrl,totEnrl,classLocation,waitCap,waitTot,component,courseTitle)VALUES ('";
    for ($x=0; $x<count($offering)-1; $x++) {
    $sql=$sql.$offering[$x]."','";
    }
    $sql=$sql.$offering[21];
    $sql=$sql."')";
    echo $sql;
    mysql_query($sql);
    mysql_close($con);
}
//$offering=new Offering();
//get values from page
function checkClassLocation($location,$offering){
    $con=mysql_connect("localhost:3306","root","5656123ljx");
    if(!$con){
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("capstone",$con);
    $sql="select * from offering where ClassLocation='"+$location+"' and ((Time(TimeStart)>Time('"+$offering[4]+"') "+
"and Time(TimeStart)<Time('"+$offering[4]+"')) or (Time(TimeEnd)>Time('"+$offering[5]+"') and Time(TimeEnd)<Time('"+$offering[5]+"'))) and ( ";
    for($i=6;$i<=12;$i++){
        $temp="";
        $count=0;
        switch($i){
            case 6:
                $temp="Mon='";
                break;
            case 7:
                $temp="Tue='";
                break;
            case 8:
                $temp="Wed='";
                break;
            case 9:
                $temp="Thu='";
                break;
            case 10:
                $temp="Fri='";
                break;
            case 11:
                $temp="Sat='";
                break;
            case 12:
                $temp="Sun='";
                break;

        }
        if($offering[$i]=="T"){
            if($count=0) {
                $temp .= $offering[$i]."' ";
            }else{
                $temp.="or ".$offering[$i]."' ";
            }
            $sql.=$temp;
        }

    }
    $sql.=")";
    $result=mysql_query($sql);
    $row=mysql_fetch_array($result);
    if($row!=null){
        return false;
    }else{
        return true;
    }
}
$offering[0]=$_POST["cid"];
$offering[1]=$_POST["classNum"];
$offering[2]=$_POST["instNameL"];
$offering[3]=$_POST["instNameF"];
$offering[4]=$_POST["timeStart"];
$offering[5]=$_POST["timeEnd"];
$offering[6]=$_POST["Mon"];
$offering[7]=$_POST["Tue"];
$offering[8]=$_POST["Wed"];
$offering[9]=$_POST["Thu"];
$offering[10]=$_POST["Fri"];
$offering[11]=$_POST["Sat"];
$offering[12]=$_POST["Sun"];
$offering[13]=$_POST["semester"];
//$offering[14]=$_POST["endDate"];
$offering[14]=$_POST["enrlState"];
$offering[15]=$_POST["capEnrl"];
$offering[16]=$_POST["totEnrl"];
$offering[17]=$_POST["classLocation"];
$offering[18]=$_POST["waitCap"];
$offering[19]=$_POST["waitTot"];
$offering[20]=$_POST["component"];
$offering[21]=$_POST["courseTitle"];
//put all these values into the class

for($x=6;$x<=12;$x++){
    if($offering[$x]==null){

        $offering[$x]="F";
    }
}

//for($x=0;$x<count($offering);$x++){
//
//    echo $offering[$x];
//    echo "<br/>";
//}
try {
    if($offering[5]<=$offering[4]){
        header("location:debug.html");
    }
    if(checkClassLocation($offering[17],$offering)){
        saveOffering($offering);
        header("location:../view/showOfferingBrief.php");
    }else{
        header("location:debug.html");
    }

}catch(Exception $e){
    echo "error";
}
//$offering->setCid($cid);
//$offering->setClassNum($classNum);
//$offering->setInstNameL($instNameL);
//$offering->setInstNameF($instNameF);
//$offering->setTimeStart($timeStart);
//$offering->setTimeEnd($timeEnd);
//$offering->setMon($Mon);
//$offering->setTue($Tue);
//$offering->setWed($Wed);
//$offering->setThu($Thu);
//$offering->setFri($Fri);
//$offering->setSat($Sat);
//$offering->setSun($Sun);
//$offering->setStartDate($startDate);
//$offering->setEndDate($endDate);
//$offering->setEnrlStart($enrlState);
//$offering->setCapEnrl($capEnrl);
//$offering->setTotEnrl($totEnrl);
//$offering->setClassLocation($classLocation);
//$offering->setWaitCap($waitCap);
//$offering->setWaitTot($waitTot);
//$offering->setComponent($component);
//$offering->setCourseTitle($courseTitle);

?>