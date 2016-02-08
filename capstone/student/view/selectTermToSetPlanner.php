<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/11/12
 * Time: 5:52
 */
include_once "../model/getStu_Plan.php";
//include_once "studentView.php";

?>
<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/10/13
 * Time: 19:04
 */
include_once "../model/getStudent.php";
?>

 <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title>Left Navigation</title>
        <!--    <link rel="stylesheet" href="../../css/div5.css" />-->
        <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">

        <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
        <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
        <link href="http://cdn.bootcss.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet">
        <script src="http://cdn.bootcss.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
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
                height: 50%;
                padding: 20px;
                border: 10px solid #B0E2FF;
                background-color: white;
                z-index:1002;
                overflow: auto;
            }
        </style>


        <script>
            function showadvance(){
                document.getElementById('advanceSearch').style.display='block';
                document.getElementById('planviewer').style.display='none';

            }
            function hideadvance(){
                document.getElementById('advanceSearch').style.display='none';
                document.getElementById('planviewer').style.display='block';
            }

            function showdiv(){

                document.getElementById('light').style.display='block';
                document.getElementById('fade').style.display='block';




            }
            function closep(){

                document.getElementById('light').style.display='none';
                document.getElementById('fade').style.display='none';


            }

        </script>
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
                        <li><a href="displaySelectSemesters.php">Create a new planner</a></li>
                        <li><a href="selectTermToSetPlanner.php">View my planners</a></li>
<!--                        <li><a href="displaySelectSemesters.php">Auto Generate planner</li>-->
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
            <h2>Student Module    </h2>

                <!--                <li><a href="#">Home</a></li>-->
                <!--                <li><a href="#">Log Out</a></li>-->

                <?php
session_start();
if($_SESSION['sid']!=null){
    echo "<p  style='color: #f9f8f8 ;position:absolute;top:65%;left:85%'>";
    $result=getStudentById($_SESSION['sid']);
    $row=mysql_fetch_array($result);
    echo "Welcome,".$row['nameF']." ".$row['nameL'];
    echo "</p>";
}else{
    echo "<a href='../../Login.html' style='color: #f9f8f8'>login</a>";
}
?>

        </div>
    </div>
    <!-- /top_title -->
    <div class="wraper">
    <!-- left_nav -->
    <div class="left_nav" style="border-left:solid 1px gray;border-right:solid 1px gray;height: 480px" >

    <div id="tab-1">






    <div class="span12" >
    <div class="page-header" align="center">
        <h1 style="color:#2894FF"> Please choose a plan</h1>
        <h1><small>Or you can creat a new one</small> </h1>
    </div>
    <div id="planviewer" align="center">
        <form action="displayPlanner.php" method="get">
            <!--        <center>-->
            <?php
session_start();
$sid=$_SESSION['sid'];
$array=array();
$result=getPlannerIdsBySid($sid);
$i=1;
$nickName="";
?>
            <select name="plannerId" style="width: 330px;">
                <?php while($row=mysql_fetch_array($result)){
    if($row['nickName']!=null){
        $nickName=$row['nickName'];
    }else{
        $nickName="Planner ".$i;
    }
    ?>
    <option value="<?php echo $row['plannerId']?>"><?php echo $nickName?></option>
    <?php $i++;}?>
            </select>
<br>
            <button class="btn" type="submit">View plan</button>
            <button class="btn" type="button" onclick="showadvance()">Advance viewer</button>
            <button class="btn" type="reset">Delete a plan</button>


            <!--        </center>-->
            <!--    </div>-->
        </form>





<!--        <button class="btn" type="button" onClick="showdiv()">Create new plan?</button>-->
    </div>


    <div id="light" class="white_content">

        <form action="../model/saveStu_Plan.php" method="get">

            <p>step 1:</p> please input a plan name you want:
            <br>
            <input type="text" id="planname" name="nickName" value="" >
            <br>


            <p>step 2:</p>Please input simple description for this plan:<br>


            <input type="text" id="termv1" value="">

            <br>
            <input type="submit" value="Create" >
            <input type="reset" value="close" onclick = "closep()">



        </form>

    </div>
    <div id="advanceSearch" style="display:none" align="center" > <form action="displayStudentOwnPlan.php" method="get" >
            <div class="planner" style="font-size:20px;font-style:oblique;">
                <div class="title" style="font-size:30px;font-style:oblique;font-variant: small-caps;color:#79B6E3" align="center ">




                </div>

                <p >
                    <?php
session_start();
$sid=$_SESSION['sid'];
$array=array();
$result=getPlannerIdsBySid($sid);
$i=1;
$nickName="";
?>
                    <table>
                    <tr>
                        <td>
                    Please select a plan <br>
                        </td>
                        </tr>
                    <tr>
                        <td>
                    <select name="plannerId">
                        <?php while($row=mysql_fetch_array($result)){
    if($row['nickName']!=null){
        $nickName=$row['nickName'];
    }else{
        $nickName="Planner ".$i;
    }
    ?>
    <option value="<?php echo $row['plannerId']?>"><?php echo $nickName?></option>
    <?php $i++;}?>
                    </select></td>
                </tr>


                    <tr>
                        <td>
                    Please input the year you want <br>

                    </td>
                    </tr>

                    <tr>
                        <td>
                    <!--<center><input id="year" type="text" value="" >-->
                    <select name="term1" id="select_k1" class="xla_k">

                        <option value="">Please choose a year</option>

                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                    </select>
                        </td>
                    </tr>


                    <tr>
                        <td>


                    Please choose a term <br>


                        </td>
                    </tr>
                    <tr>
                        <td>
                <div id="checkbox" >
                    <label>
                        <input type="radio" name="term2" value="spring" id="RadioGroup1_0">
                        SPRING</label>
                        </td>
                    </tr>

<!--                    <label>-->
<!--                        <input type="radio" name="term2" value="summer" id="RadioGroup1_1">-->
<!--                        SUMMER</label>-->
                    <tr>
                        <td>
                    <label>
                        <input type="radio" name="term2" value="fall" id="RadioGroup1_2">
                        FALL</label>
                        </td>
                    </tr>

<!--                    <label>-->
<!--                        <input type="radio" name="term2" value="winter" id="RadioGroup1_3">-->
<!--                        WINTER</label>-->
<!--                    <br>-->




                </div>

            </div>
<!--            <br>-->
<!--            <br>-->
<!--            <br>-->
            <div >

                <tr>
                    <td>
                    <input type="submit" value="OK">
                    <input type="reset" value="Clear">
                <input type="button" value="Hide me!" onclick="hideadvance()">
                    </td>
                </tr>
                </table>


            </div>
        </form></div>











<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/11/12
 * Time: 5:52
 */
include_once "studentViewEnd.php";
?>