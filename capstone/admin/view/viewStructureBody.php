<div class="wraper">
    <header class="header">
        <a class="logo" href="../../Login.html">Admin module</a>
        <nav>
            <!-- top menu -->
            <ul>
                <li ><a href="showCourse.php"><p class="text-success">View Course</p></a>

                    <ul>
                        <li><a href="addCourse.php"><p class="text-success">Add courses</p></a>

                        </li>
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
                <li><a href="displayMajor.php"><p class="text-success">View Major</p></a>
                    <ul>
                        <li><a href="testDisplayPage.php"><p class="text-success">Add courses into major</p></a>

                        </li>
                        <!--                        <li><a href="long_text.html">Class planner</a>-->
                        <!---->
                        <!--                        </li>-->
                        <!--                        <li><a href="filtered.html">Other</a>-->

                </li>

            </ul>
            </li>
            <li><a href="#"><p class="text-success">View Offering</p></a>
                <ul>
                    <!--                    <li><a href="selectTermToSetPlanner.php">Set my planner</a></li>-->
                    <!--                    <li><a href="selectTermToViewOwnPlanner.php">View my planner</a></li>-->
                    <!--                    <li><a href="displaySelectSemesters.php">Auto Generate planner</li>-->
                    <!--                        <li><a href="blog_large_sidebar.html">Planner</a></li>-->
                    <!--                        <li><a href="blog_medium_sidebar.html">Planner</a></li>-->
                </ul>
            </li>
            <li><a href="../../student/model/logOut.php"><p class="text-success">Log out</p></a>
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
        <div class="left_nav" style="border-left:solid 1px  gray;border-right:solid 1px gray; height:auto" >
            <div id="tab-1">