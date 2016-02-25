<div class="wraper">
    <header class="header">
        <a class="logo" href="../../Login.html">Student module</a>
        <nav>
            <!-- top menu -->
            <ul>
                <li><a ><p class="text-primary">View Student Profile</p></a>
                    <ul>
                        <li><a href="displayStudentProfile.php"><p class="text-primary">User information</p></a></li>
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
                    "><p class="text-primary">Search Courses</p></a>
                    <ul>
                        <!--                        <li><a href="about.html">Search course fuzzy</a></li>-->
                        <!--                        <li><a href="team.html">Search courses by conditions</a></li>-->


                    </ul>
                </li>
                <li><a ><p class="text-primary">View Schedule</p></a>
                    <ul>
                        <li><a href="displayTimeTable.php"><p class="text-primary">Show current course time table</p></a>

                        </li>
                        <!--                        <li><a href="long_text.html">Class planner</a>-->
                        <!---->
                        <!--                        </li>-->
                        <!--                        <li><a href="filtered.html">Other</a>-->

                </li>

            </ul>
            </li>
            <li><a href="#"><p class="text-primary">View Planner</p></a>
                <ul>
                    <li><a href="displaySelectSemesters.php">Create new Planner</a></li>
                    <li><a href="selectTermToSetPlanner.php">View my Planner</a></li>
                    <!--                        <li><a href="displaySelectSemesters.php">Auto Generate planner</li>-->
                    <!--                        <li><a href="blog_large_sidebar.html">Planner</a></li>-->
                    <!--                        <li><a href="blog_medium_sidebar.html">Planner</a></li>-->
                </ul>
            </li>
            <li><a href="../model/logOut.php"><p class="text-primary">Log out</p></a>
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
    <div class="top_title" >
        <div class="wraper">
            <h2>Student Module    <span></span></h2>

            <!--                <li><a href="#">Home</a></li>-->
            <!--                <li><a href="#">Log Out</a></li>-->

            <?php
            session_start();
            if($_SESSION['sid']!=null){
                echo "<p  style='color: #f9f8f8;position:absolute;top:65%;left:85%' >";
                $result=getStudentById($_SESSION['sid']);
                $row=mysql_fetch_array($result);
                echo "Welcome  ".$row['nameF']." ".$row['nameL'];
                echo "</p>";
            }else{
                echo "<a href='../../Login.html' style='color: #f9f8f8;position:absolute;top:65%;left:85%'>login</a>";
            }
            ?>

        </div>
    </div>
    <!-- /top_title -->
    <div class="wraper">
        <!-- left_nav -->
        <div class="left_nav" style="border-left:solid 1px gray;border-right:solid 1px gray; height: 480px" >

            <div id="tab-1">