<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/10/13
 * Time: 19:04
 */
//include_once "../model/getStudent.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Left Navigation</title>
    <!--    <link rel="stylesheet" href="../../css/div5.css" />-->
    <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
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

    <link rel="stylesheet" href="../../css/adminViewStyle.css" />
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
                <li><a >View Course</a>
                    <ul>
<!--                        <li><a href="displayStudentProfile.php">User information</a></li>-->
                        <!--                        <li><a href="displayStudentProfile.php">Course profile</a></li>-->

                    </ul>
                </li>

<!--                <li><a href="displayCourse.php--><?php
//                    session_start();
//                    if($_SESSION['sid']!=null){
//                        $result=getStudentById($_SESSION['sid']);
//                        $row=mysql_fetch_array($result);
//                        echo "?major=".trim($row["major"]);
//                    }
//                    ?>
<!--                    ">Search Courses</a>-->
<!--                    <ul>-->
<!--                        <!--                        <li><a href="about.html">Search course fuzzy</a></li>-->
<!--                        <!--                        <li><a href="team.html">Search courses by conditions</a></li>-->
<!---->
<!---->
<!--                    </ul>-->
<!--                </li>-->
                <li><a >View Major</a>
                    <ul>
<!--                        <li><a href="displayTimeTable.php">Show current course time table</a>-->

                        </li>
                        <!--                        <li><a href="long_text.html">Class planner</a>-->
                        <!---->
                        <!--                        </li>-->
                        <!--                        <li><a href="filtered.html">Other</a>-->

                </li>

            </ul>
            </li>
            <li><a href="#">View Offering</a>
                <ul>
<!--                    <li><a href="selectTermToSetPlanner.php">Set my planner</a></li>-->
<!--                    <li><a href="selectTermToViewOwnPlanner.php">View my planner</a></li>-->
<!--                    <li><a href="displaySelectSemesters.php">Auto Generate planner</li>-->
                    <!--                        <li><a href="blog_large_sidebar.html">Planner</a></li>-->
                    <!--                        <li><a href="blog_medium_sidebar.html">Planner</a></li>-->
                </ul>
            </li>
            <li><a href="../../student/model/logOut.php">Log out</a>
                <ul>
                    <!--                        <li><a href="shortcodes_buttons_icons.html">Switch user</a></li>-->
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
            <h2>Admin Module <span></span></h2>
            <ul>
                <!--                <li><a href="#">Home</a></li>-->
                <!--                <li><a href="#">Log Out</a></li>-->

<!--                --><?php
//                session_start();
//                if($_SESSION['sid']!=null){
//                    echo "<p  style='color: #f9f8f8'>";
//                    $result=getStudentById($_SESSION['sid']);
//                    $row=mysql_fetch_array($result);
//                    echo "Welcome  ".$row['nameF']." ".$row['nameL'];
//                    echo "</p>";
//                }else{
//                    echo "<a href='../../Login.html' style='color: #f9f8f8'>login</a>";
//                }
//                ?>
            </ul>
        </div>
    </div>
    <!-- /top_title -->
    <div class="wraper">
        <!-- left_nav -->
        <div class="left_nav" style="border-left:solid 1px gray;border-right:solid 1px gray; height: 480px" >
            <div id="tab-1">