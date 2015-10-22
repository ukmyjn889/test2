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
                        <li><a href="displayStudentProfile.php">Course profile</a></li>

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
                        <li><a href="about.html">Search course fuzzy</a></li>
                        <li><a href="team.html">Search courses by conditions</a></li>


                    </ul>
                </li>
                <li><a >My class Schedular</a>
                    <ul>
                        <li><a href="displayTimeTable.php">Show current course time table</a>

                        </li>
                        <li><a href="long_text.html">Class planner</a>

                        </li>
                        <li><a href="filtered.html">Other</a>

                        </li>

                    </ul>
                </li>
                <li><a href="blog_post.html">Planner</a>
                    <ul>
                        <li><a href="blog_full_width.html">Planner</a></li>
                        <li><a href="blog_large.html">Planner</a></li>
                        <li><a href="blog_large_sidebar.html">Planner</a></li>
                        <li><a href="blog_medium_sidebar.html">Planner</a></li>
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
        <div class="left_nav" style="border-left:solid 1px gray;border-right:solid 1px gray;height: 480px" >
<!--            <div  class="c_after">-->
<!--                <ul class="tab_select">-->
<!--                    <li><a href="#tab-1">Home Page Options</a></li>-->
<!--                    <li><a href="#tab-2">Home Page Options</a></li>-->
<!--                    <li><a href="#tab-3">Home Page Options</a></li>-->
<!--                    <li><a href="#tab-4">Home Page Options</a></li>-->
<!--                    <li><a href="#tab-5">Home Page Options</a></li>-->
<!--                    <li><a href="#tab-6">Home Page Options</a></li>-->
<!--                    <li><a href="#tab-7">Home Page Options</a></li>-->
<!--                    <li><a href="#tab-8">Home Page Options</a></li>-->
<!--                    <li><a href="#tab-9">Home Page Options</a></li>-->
<!--                </ul>-->
                <div id="tab-1">


<!--                <div id="tab-2">-->
<!---->
<!--                </div>-->
<!--                <div id="tab-3">-->
<!---->
<!--                    <div id="tab-4">-->
<!---->
<!--                    </div>-->
<!--                    <div id="tab-5">-->
<!---->
<!--                    </div>-->
<!--                    <div id="tab-6">-->
<!---->
<!--                    </div>-->
<!--                    <div id="tab-7">-->
<!---->
<!--                    </div>-->
<!--                    <div id="tab-8">-->
<!---->
<!--                    </div>-->
<!--                    <div id="tab-9">-->
<!---->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <!-- /left_nav -->
<!---->
<!---->
<!---->
            <!-- copyright
            <div class="copyright">
                <div class="wraper">
                    <p><span>Copyright </span>All Rights Reserved</a></p>
                    <a class="top" href="#">Back to the top</a>
                </div>
            </div>
            <!-- /copyright
            <!-- /footer
</body>
</html>
-->