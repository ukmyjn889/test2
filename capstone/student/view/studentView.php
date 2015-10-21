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
        <a class="logo" href="../../Login.html">student module</a>
        <nav>
            <!-- top menu -->
            <ul>
                <li><a href="displayStudentProfile.php">view profile</a>
                    <ul>
                        <li><a href="index2.html">Home Version 2</a></li>
                        <li><a href="index3.html">Home Version 3</a></li>
                        <li><a href="index4.html">Home Version 4</a></li>
                        <li><a href="index5.html">Home Version 5</a></li>
                        <li><a href="index6.html">Home Version 6</a></li>
                        <li><a href="index7.html">Home Version 7</a></li>
                        <li><a href="index8.html">Home Version 8</a></li>
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
                    ">view courses</a>
                    <ul>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="team.html">Team</a></li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="process.html">Process</a></li>
                        <li><a href="testimonials.html">Testimonials</a></li>
                        <li><a href="contact_us.html">Contact Us</a></li>
                        <li><a href="pricing.html">Pricing</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="left_nav.html">Left Nav</a></li>
                        <li><a href="left_sidebar.html">Left Sidebar</a></li>
                        <li><a href="right_nav.html">Right Nav</a></li>
                        <li><a href="right_sidebar.html">Right Sidebar</a></li>
                        <li><a href="full_width.html">Full Width</a></li>
                    </ul>
                </li>
                <li><a href="short_text.html">Select courses</a>
                    <ul>
                        <li><a href="short_text.html">Short Text Layout</a>
                            <ul>
                                <li><a href="short_text.html">1 Column</a></li>
                                <li><a href="short_text2.html">2 Column</a></li>
                                <li><a href="short_text3.html">3 Column</a></li>
                                <li><a href="short_text4.html">4 Column</a></li>
                            </ul>
                        </li>
                        <li><a href="long_text.html">my class schedular</a>
                            <ul>
                                <li><a href="long_text_wide.html">1 Column Wide</a></li>
                                <li><a href="long_text.html">1 Column</a></li>
                                <li><a href="long_text2.html">2 Column</a></li>
                                <li><a href="long_text3.html">3 Column</a></li>
                                <li><a href="long_text4.html">4 Column</a></li>
                            </ul>
                        </li>
                        <li><a href="filtered.html">Log out</a>
                            <ul>
                                <li><a href="filtered.html">1 Column</a></li>
                                <li><a href="filtered2.html">2 Column</a></li>
                                <li><a href="filtered3.html">3 Column</a></li>
                                <li><a href="filtered4.html">4 Column</a></li>
                            </ul>
                        </li>
                        <li><a href="right_sidebar.html">Right Sidebar</a>
                            <ul>
                                <li><a href="right_sidebar.html">1 Column</a></li>
                                <li><a href="right_sidebar2.html">2 Column</a></li>
                                <li><a href="right_sidebar3.html">3 Column</a></li>
                            </ul>
                        </li>
                        <li><a href="left_sidebar.html">Left Sidebar</a>
                            <ul>
                                <li><a href="left_sidebar.html">1 Column</a></li>
                                <li><a href="left_sidebar2.html">2 Column</a></li>
                                <li><a href="left_sidebar3.html">3 Column</a></li>
                            </ul>
                        </li>
                        <li><a href="gallery.html">Gallery Style</a>
                            <ul>
                                <li><a href="gallery.html">1 Column</a></li>
                                <li><a href="gallery2.html">2 Column</a></li>
                                <li><a href="gallery3.html">3 Column</a></li>
                                <li><a href="gallery4.html">4 Column</a></li>
                            </ul>
                        </li>
                        <li><a href="single_full.html">Portfolio Single Post</a>
                            <ul>
                                <li><a href="single_full.html">Full Width</a></li>
                                <li><a href="single_right.html">Right Sidebar</a></li>
                                <li><a href="single_left.html">Left Sidebar</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="blog_post.html">my class schedular</a>
                    <ul>
                        <li><a href="blog_full_width.html">Full Width</a></li>
                        <li><a href="blog_large.html">Large Image No Sidebar</a></li>
                        <li><a href="blog_large_sidebar.html">Large Image With Sidebar</a></li>
                        <li><a href="blog_medium_sidebar.html">Medium Image Right Sidebar</a></li>
                    </ul>
                </li>
                <li><a href="../model/logOut.php">Log out</a>
                    <ul>
                        <li><a href="shortcodes_typography.html">Typography</a></li>
                        <li><a href="shortcodes_buttons_icons.html">Buttons</a></li>
                        <li><a href="shortcodes_google_maps.html">Maps</a></li>
                        <li><a href="shortcodes_content_sliders.html">Sliders</a></li>
                        <li><a href="shortcodes_videos.html">Videos</a></li>
                        <li><a href="shortcodes_pricing_tables.html">Tables</a></li>
                        <li><a href="shortcodes_alerts_boxes.html">Boxes</a></li>
                        <li><a href="shortcodes_accordions_tabs_toggles.html">Tabs</a></li>
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
        <div class="left_nav" style="border-left:solid 1px gray;border-right:solid 1px gray">
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
<!--            <!-- copyright -->
<!--            <div class="copyright">-->
<!--                <div class="wraper">-->
<!--                    <p><span>Copyright </span>All Rights Reserved</a></p>-->
<!--                    <a class="top" href="#">Back to the top</a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <!-- /copyright -->
<!--            <!-- /footer -->
<!--</body>-->
<!--</html>-->
