<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/11/11
 * Time: 21:41
 */
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/10/13
 * Time: 19:04
 */
include_once "../model/getStudent.php";
include_once "../model/getPlan.php";
include_once "../model/getStu_Plan.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .black_overlay{
            display: none;
            position: absolute;
            top: 0%;
            left: 0%;
            width: 100%;
            height: 100%;
            background-color: black;
            z-index:1001;
            -moz-opacity: 0.8;
            opacity:.80;
            filter: alpha(opacity=88);
        }
        .white_content {
            display: none;
            position: absolute;
            top: 25%;
            left: 35%;
            width: 40%;
            height: 30%;
            padding: 20px;
            border: 10px solid orange;
            background-color: white;
            z-index:1002;
            overflow: auto;
        }
    </style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Left Navigation</title>
    <!--    <link rel="stylesheet" href="../../css/div5.css" />-->
    <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

    <!--    <script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>-->
    <!--    <link rel="icon" type="image/png" href="images/favicon.ico" />-->
    <!--    <link rel="apple-touch-icon" href="images/apple-touch-icon.png" />-->
    <!--    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png" />-->
    <!--    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png" />-->
    <!--[if lt IE 9]>
    <script src="../scripts/ie9.js">IE7_PNG_SUFFIX=".png";</script>
    <![endif]-->

    <link rel="stylesheet" href="../../css/studentViewStyle.css" />
    <link rel="stylesheet" href="../../css/responsive.css" />
    <script src="../../scripts/jquery.min.js"></script>
    <script src="../../scripts/js_func.js"></script>
    <script>
        function add(){
            alert(1);
        }
        function changeOption(){
            document.getElementById('option').value=2;
            document.getElementById('form1').submit();
        }
        function showdiv(cid,plannerId,i){
           // alert(1);
            document.getElementById('light').style.display='block';
            document.getElementById('fade').style.display='block';
            document.getElementById('termv1').value=cid;
            document.getElementById('termv2').value=plannerId;
            document.getElementById('option').value=i;
            if(i==1){
                document.getElementById('delete').innerHTML="<input type='button' value='Drop this Course' onclick='changeOption()'>";
            }else{
                document.getElementById('delete').innerHTML="";
            }
        }
        function save(){
            document.getElementById('light').style.display='none';
            document.getElementById('fade').style.display='none';

        }
        function close(){
            document.getElementById('light').style.display='none';
            document.getElementById('fade').style.display='none';



        }
    </script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
<div class="wraper">
    <header class="header">
        <a class="logo" href="../../Login.html">Student module</a>
        <nav>
            <!-- top menu -->
            <ul>
                <li><a >View student profile</a>
                    <ul>
                        <li><a href="displayStudentProfile.php">User information</a></li>
                        <!--                        <li><a href="displayStudentProfile.php">Course profile</a></li>-->

                    </ul>
                </li>

                <li><a href="displayCourse.php<?php
                    session_start();
                    if($_SESSION['sid']!=null){
                        $result=getStudentById($_SESSION['sid']);
                        $row=mysql_fetch_array($result);
                        echo "?major=".trim($row["major"]);
                    }
                    ?>
                    ">Search courses</a>
                    <ul>
                        <!--                        <li><a href="about.html">Search course fuzzy</a></li>-->
                        <!--                        <li><a href="team.html">Search courses by conditions</a></li>-->


                    </ul>
                </li>
                <li><a >My class Schedular</a>
                    <ul>
                        <li><a href="displayTimeTable.php">Show current course time table</a>

                        </li>
                        <!--                        <li><a href="long_text.html">Class planner</a>-->
                        <!---->
                        <!--                        </li>-->
                        <!--                        <li><a href="filtered.html">Other</a>-->

                </li>

            </ul>
            </li>
            <li><a href="#">Planner</a>
                <ul>
                    <li><a href="selectTermToSetPlanner.php">Set my planner</a></li>
                    <li><a href="selectTermToViewOwnPlanner.php">View my planner</a></li>
                    <li><a href="displaySelectSemesters.php">Auto Generate planner</li>
                    <!--                        <li><a href="blog_large_sidebar.html">Planner</a></li>-->
                    <!--                        <li><a href="blog_medium_sidebar.html">Planner</a></li>-->
                </ul>
            </li>
            <li><a >Log out</a>
                <ul>
                    <li><a href="../model/logOut.php">Log out</a></li>
                    <li><a href="shortcodes_buttons_icons.html">Switch user</a></li>

                </ul>
            </li>
            </ul>
            <!-- /top menu -->
        </nav>
    </header>
</div>

<div class="content_block">
    <!-- top_title -->
    <div class="top_title">
        <div class="wraper">
            <h2>Student Module    <span>This is a  page for student</span></h2>
            <ul>
                <!--                <li><a href="#">Home</a></li>-->
                <!--                <li><a href="#">Log Out</a></li>-->

                <?php
                session_start();
                if($_SESSION['sid']!=null){
                    echo "<p  style='color: #f9f8f8'>";
                    $result=getStudentById($_SESSION['sid']);
                    $row=mysql_fetch_array($result);
                    echo "Welcome,".$row['nameF']." ".$row['nameL'];
                    echo "</p>";
                }else{
                    echo "<a href='../../Login.html' style='color: #f9f8f8'>login</a>";
                }
                ?>
            </ul>
        </div>
    </div>
    <!-- /top_title -->
    <div class="wraper">
        <!-- left_nav -->
        <div class="left_nav" style="border-left:solid 1px gray;border-right:solid 1px gray;height: 550px" >

<?php
session_start();
$sid=$_SESSION['sid'];
$plannerId=$_GET['plannerId'];
$Array=getMajorOverView($sid,$plannerId);
$father=$Array[0];
$son=$Array[1];
echo "<div style='position: absolute; left: 20px'>";

echo "Planner Name: ".getPlannerNickNameBySidAndPlannerId($sid,$plannerId)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"../model/saveStu_Plan.php?deleteId=".$plannerId."\">delete the whole plan</a><br>";
//echo "<a href=\"../model/copyPlanner.php?plannerId=".$plannerId."\">generate a new planner base on this plan</a><br>";
for($i=0;$i<count($father);$i++){
    echo "<table border='1' width='500' >";
    echo $father[$i]['listname']."<br>";
    echo "<tr><td style='font-weight: bold'>Course ID</td><td style='font-weight: bold'>credits</td><td style='font-weight: bold' width='5px'>condition</td><td style='font-weight: bold' width='5px'>operate</td></tr>";
    for($j=0;$j<count($son[$i]);$j++){
        echo "<tr><td>";
        echo $son[$i][$j]['cid'];
        echo "</td><td>";
        echo $son[$i][$j]['credits'];
        echo "</td><td width='5px'>";
        //echo "<input type='checkbox' name='courses[]' value='".$son[$i][$j]['cid']."'>";
        if($son[$i][$j]['term']=="true"){
            echo "Available";
        }else if($son[$i][$j]['term']=="false"){
            echo "conflict";
        }else{
            if($son[$i][$j]['term']!="Taken"){
            echo "Semester".$son[$i][$j]['term'];
                }else{
                echo $son[$i][$j]['term'];
            }
        }

        echo "</td><td width='5px'>";
        if($son[$i][$j]['term']=="true"){
            //$cid=$son[$i][$j]['cid'];
            echo "<input type='button' value='select' onclick=\"showdiv('".$son[$i][$j]['cid']."',".$plannerId.",0)\"><br>";
        }else if($son[$i][$j]['term']=="false"){
            echo "-----------";
        }
        else if($son[$i][$j]['term']=="Taken"){
            echo "-----------";
        }else{
            echo "<input type='button' value='edit' onclick=\"showdiv('".$son[$i][$j]['cid']."',".$plannerId.",1)\"><br>";
        }
        echo "</td></tr>";
}
    echo "</table>";

}
echo "<div align='left'><a href=\"../model/copyPlanner.php?plannerId=".$plannerId."\">generate a new planner base on this plan</a></div>";

echo "</div>";
//echo "</form>";
          ?>
                <div id="light" class="white_content">

                    <form id="form1" action="../model/savePlanner.php" method="get">

                        please choose a year
                        <select id="select1" name="term1" >
                            <option></option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                        </select><br>


                        Please choose a term
                        <select id="select2" name="term2">
                            <option></option>
                            <option value="spring">SPRING</option>
                            <option value="summer">SUMMER</option>
                            <option value="fall">FALL</option>
                            <option value="winter">WINTER</option>
                        </select>
                        <p >
                            <input type="hidden" id="termv1" name="cid">
                            <input type="hidden" id="termv2" name="plannerId">
                            <input type="hidden" id="option" name="option">
                            <br>
                            <input type="submit" value="save">
                            <input type="button" value="close" onclick="save()" >
                            <div align="right" id="delete"></div>
                        </p>
                    </form>

                </div>


                <div id="fade" class="black_overlay"></div>
                <?
include_once "studentViewEnd.php";
?>





