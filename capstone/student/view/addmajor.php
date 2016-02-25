<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Left Navigation</title>
    <!--    <link rel="stylesheet" href="../../css/div5.css" />-->
    <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>


    <script src="../scripts/ie9.js">IE7_PNG_SUFFIX=".png";</script>


    <link rel="stylesheet" href="../../css/adminViewStyle.css" />
    <link rel="stylesheet" href="../../css/responsive.css" />
    <script src="../../scripts/jquery.min.js"></script>
    <script src="../../scripts/js_func.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<link rel="stylesheet" type="text/css" href="../../css/jquery.multiselect.css" />
<link rel="stylesheet" type="text/css" href="../../css/style.css" />
<link rel="stylesheet" type="text/css" href="../../css/prettify.css" />
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script type="text/javascript" src="../../scripts/jquery.multiselect.js"></script>
<script type="text/javascript" src="../../scripts/prettify.js"></script>
<script type="text/javascript">
$(function(){

	$("select").multiselect({
		selectedList: 20
	});
	
});

var gn=2;
$ (function ()
    { 
	
	   $ ('#addg').click (function ()
	   {
$('#elegrup'+gn+'').show();



    gn++;
	   	
	   });
    });


</script>

</head>
<body onload="prettyPrint();">
<div class="wraper">
    <header class="header">
        <a class="logo" href="../../Login.html">Admin module</a>
        <nav>
            <!-- top menu -->
            <ul>
                <li><a >View Course</a>
                    <ul>
                        <!--                        <li><a href="displayStudentProfile.php">User information</a></li>-->
                        <!--                        <li><a href="displayStudentProfile.php">Course profile</a></li>-->

                    </ul>
                </li>

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


            </ul>
        </div>
    </div>
    <!-- /top_title -->
    <div class="wraper">
        <!-- left_nav -->
        <div class="left_nav" style="border-left:solid 1px  gray;border-right:solid 1px gray; height:auto" >
            <div id="tab-1">
                <div style="margin: 0 auto;">

                    <h1 style="color:lightblue">Add major</h1>



                    <form>
                        <h3 style="color:darkgreen">Please select Major</h3>
                        <select id="majorName" name="majorName" style="width:400px"></select>
                        <script>
                            $(document).ready(function() {
                                $.ajax({
                                    url: "../service/getMajorAndMajorName.php", success: function (result) {
                                        // alert(1);
                                        result = eval(result);
                                        for (var i = 0; i < result.length; i++) {
                                            document.getElementById("majorName").innerHTML += "<option value='" + result[i].majorName + "'>" + result[i].majorFullName + "</option>";
                                        }

                                        //alert(result[0].majorName);
                                    }
                                });
                            }
                        </script>
                        <h3 style="color:darkgreen">Please choose core sourses</h3>
                        <p>
                           <label>  Core Course Name<input type="text" class="form-control" name="listname" style="width: 400px"></label><br>
                            <select name="corelist[]" multiple="multiple" style="width:400px">
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                                <option value="option4">Option 4</option>
                                <option value="option5">Option 5</option>
                                <option value="option6">Option 6</option>
                                <option value="option7">Option 7</option>
                            </select>
                        </p>
                        <div id="elearea">
                            <h3 style="color:darkgreen">Please add elective course to elective group</h3>

                            <p>
                            <h3 style="color:darkgreen">group1</h3>
                            <select name="elegrup1[]" multiple="multiple" style="width:400px">
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                                <option value="option4">Option 4</option>
                                <option value="option5">Option 5</option>
                                <option value="option6">Option 6</option>
                                <option value="option7">Option 7</option>
                            </select>
                            </p>

                            <div id="elegrup2" style="display:none">
                            <h3 style="color:darkgreen">group2</h3>
                            <select name="elegrup2[]" multiple="multiple" style="width:400px">
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                                <option value="option4">Option 4</option>
                                <option value="option5">Option 5</option>
                                <option value="option6">Option 6</option>
                                <option value="option7">Option 7</option>
                            </select>
                            </div >
                            <div id="elegrup3" style="display:none">
                                <h3 style="color:darkgreen">group3</h3>
                                <select name="elegrup3[]" multiple="multiple" style="width:400px">
                                    <option value="option1">Option 1</option>
                                    <option value="option2">Option 2</option>
                                    <option value="option3">Option 3</option>
                                    <option value="option4">Option 4</option>
                                    <option value="option5">Option 5</option>
                                    <option value="option6">Option 6</option>
                                    <option value="option7">Option 7</option>
                                </select>
                            </div>
                            <div id="elegrup4" style="display:none">
                                <h3 style="color:darkgreen">group4</h3>
                                <select name="elegrup4[]" multiple="multiple" style="width:400px">
                                    <option value="option1">Option 1</option>
                                    <option value="option2">Option 2</option>
                                    <option value="option3">Option 3</option>
                                    <option value="option4">Option 4</option>
                                    <option value="option5">Option 5</option>
                                    <option value="option6">Option 6</option>
                                    <option value="option7">Option 7</option>
                                </select>
                            </div>
                            <div id="elegrup5" style="display:none">
                                <h3 style="color:darkgreen">group5</h3>
                                <select name="elegrup5" multiple="multiple" style="width:400px">
                                    <option value="option1">Option 1</option>
                                    <option value="option2">Option 2</option>
                                    <option value="option3">Option 3</option>
                                    <option value="option4">Option 4</option>
                                    <option value="option5">Option 5</option>
                                    <option value="option6">Option 6</option>
                                    <option value="option7">Option 7</option>
                                </select>
                            </div>
                            <div id="elegrup6" style="display:none">
                                <h3 style="color:darkgreen">group6</h3>
                                <select name="elegrup" multiple="multiple" style="width:400px">
                                    <option value="option1">Option 1</option>
                                    <option value="option2">Option 2</option>
                                    <option value="option3">Option 3</option>
                                    <option value="option4">Option 4</option>
                                    <option value="option5">Option 5</option>
                                    <option value="option6">Option 6</option>
                                    <option value="option7">Option 7</option>
                                </select>
                            </div>
                            <div id="elegrup7" style="display:none">
                                <h3 style="color:darkgreen">group7</h3>
                                <select name="elegrup7" multiple="multiple" style="width:400px">
                                    <option value="option1">Option 1</option>
                                    <option value="option2">Option 2</option>
                                    <option value="option3">Option 3</option>
                                    <option value="option4">Option 4</option>
                                    <option value="option5">Option 5</option>
                                    <option value="option6">Option 6</option>
                                    <option value="option7">Option 7</option>
                                </select>
                            </div>
                            <div id="elegrup8" style="display:none">
                                <h3 style="color:darkgreen">group8</h3>
                                <select name="elegrup8" multiple="multiple" style="width:400px">
                                    <option value="option1">Option 1</option>
                                    <option value="option2">Option 2</option>
                                    <option value="option3">Option 3</option>
                                    <option value="option4">Option 4</option>
                                    <option value="option5">Option 5</option>
                                    <option value="option6">Option 6</option>
                                    <option value="option7">Option 7</option>
                                </select>
                            </div>

                        </div>
                        <button class="btn btn-default" id="addg" type="button">add more group</button>
                    </form>




                </div>
                </div>
</body>
</html>
