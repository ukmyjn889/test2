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
//    $(function(){
//
//        var el = $("#corelist").multiselect(),
//            disabled = $('#disabled'),
//            selected = $('#selected'),
//            newItem = $('#newItem');
//
//       // $("#add").click(function(){
//       // xxx();
//           var m="666"; var v = "xxx";
//                opt = $('<option />', {
//                value: v,
//                text: m
//
//            });
//
//        //    alert(v);
//
//            if(disabled.is(':checked')){
//                opt.attr('disabled','disabled');
//            }
//            if(selected.is(':checked')){
//                opt.attr('selected','selected');
//            }
//
//            opt.appendTo( el );
//          //  el.multiselect('refresh');
//        v = "yyy",
//            opt = $('<option />', {
//                value: v,
//                text: v
//
//            });
//        opt.appendTo( el );
//        el.multiselect('refresh');
//     //   });
//    });


    var gn=2;
    $ (function ()
    {

        $ ('#addg').click (function ()
        {//
//		   var html='';
//	html+='<p>'
//	html+='<select name="elegrup1" multiple="multiple" style="width:400px">'
//		html+='<option value="option1">Option 1</option>'
//		html+='<option value="option2">Option 2</option>'
//		html+='<option value="option3">Option 3</option>'
//		html+='<option value="option4">Option 4</option>'
//		html+='<option value="option5">Option 5</option>'
//		html+='<option value="option6">Option 6</option>'
//		html+='<option value="option7">Option 7</option></select>'
//		html+='</p>'
//		
//   
//    $('#elearea').append(html);
//   

            $('#elegrup'+gn+'').show();



            gn++;

        });
    });
</script>

</head>
<body onload="prettyPrint();">
<?php include_once "viewStructureBody.php";?>
<!--<div class="wraper">-->
<!--    <header class="header">-->
<!--        <a class="logo" href="../../Login.html">Admin module</a>-->
<!--        <nav>-->
<!--      -->
<!--            <ul>-->
<!--                <li><a >View Course</a>-->
<!--                    <ul>-->
<!---->
<!--                    </ul>-->
<!--                </li>-->
<!--                -->
<!--                <li><a >View Major</a>-->
<!--                    <ul>-->
<!--                        <li><a href="displayTimeTable.php"><p class="text-primary">Add Courses into Major</p></a>-->
<!---->
<!--                        </li>-->
<!--      -->
<!---->
<!--                </li>-->
<!---->
<!--                </li>-->
<!---->
<!--            </ul>-->
<!--            </li>-->
<!--            <li><a href="#">View Offering</a>-->
<!--                <ul>-->
<!--                   -->
<!--                </ul>-->
<!--            </li>-->
<!--            <li><a href="../../student/model/logOut.php">Log out</a>-->
<!--                <ul>-->
<!--                 -->
<!--                </ul>-->
<!--            </li>-->
<!--            </ul>-->
<!--       -->
<!--        </nav>-->
<!--    </header>-->
<!--</div>-->
<!---->
<!--<div class="content_block">-->
<!--   -->
<!--    <div class="top_title">-->
<!--        <div class="wraper">-->
<!--            <h2>Admin Module <span></span></h2>-->
<!--            <ul>-->
<!--                -->
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
<!-- -->
<!--    <div class="wraper">-->
<!--       -->
<!--        <div class="left_nav" style="border-left:solid 1px  gray;border-right:solid 1px gray; height:auto" >-->
<!--            <div id="tab-1">-->
                <div style="margin: 0 auto;">
                    <div style="position: relative;left: 25%">
                    <h1 style="color:lightblue">Add major</h1>

<!--                    <div style="float:left; width:325px">-->
<!--                        <h3 style="margin-top:0">Add an item:</h3>-->
<!--                        <p>Type in the text of a new option tag to add dynamically.</p>-->
<!--                        <input type="text" id="newItem">-->
<!--                        <input type="button" id="add" value="Add">-->
<!--                        <p>-->
<!--                            <label style="margin-right:8px"><input type="checkbox" id="selected"> Selected?</label>-->
<!--                            <label><input type="checkbox" id="disabled"> Disabled?</label>-->
<!--                        </p>-->
<!--                    </div>-->

                    <form>
                        <h3 style="color:darkgreen">Please choose a Major</h3>
                        <select id="majorName" name="majorName" style="width: 400px">
                        </select>
                        <script>
                            $(function(){
                              //  $("#majorName").multiple=false;
                                var el = $("#majorName").multiselect({
                                    multiple: false,
                                    header: "Select an option",
                                    noneSelectedText: "Select an Option",
                                    selectedList: 1
                                });
                                $.ajax({
                                    url: "../service/getMajorAndMajorName.php?message=getMajors", success: function (result) {
                                      //  alert(result);
                                        result = eval(result);
                                       // alert(result);
                                        for (var i = 0; i < result.length; i++) {
                                            var m=result[i].majorFullName; var v = result[i].majorName;
                                            opt = $('<option />', {
                                                value: v,
                                                text: m

                                            });
                                            opt.appendTo( el );

                                        }
                                        el.multiselect('refresh');
                                    }
                                });
                            });
                        </script>
                        <h3 style="color:darkgreen">Please choose core courses</h3>

                        <p>
                            <select id="corelist" name="corelist" multiple="multiple" style="width:400px" >
<!--                                <option value="option1">Option 1</option>-->
<!--                                <option value="option2">Option 2</option>-->
<!--                                <option value="option3">Option 3</option>-->
<!--                                <option value="option4">Option 4</option>-->
<!--                                <option value="option5">Option 5</option>-->
<!--                                <option value="option6">Option 6</option>-->
<!--                                <option value="option7">Option 7</option>-->
                            </select>
                            <script>

                                 $("#corelist").multiselect({beforeopen:function(){
                                     var el = $("#corelist").multiselect();
                                     var majorName=$("#majorName").val();
                                    $.ajax({
                                        url: "../service/getMajorAndMajorName.php?message="+majorName, success: function (result) {
                                            // alert($("#majorName").val());
                                           // alert(result);
                                            result = eval(result);
                                           // alert(result);
                                            //alert($("#majorName").val());
                                           // el.removeChild();
                                         //  $("#corelist").multiselect("option").empty();
                                          //  el.child().empty();
                                            $("#corelist").empty();
                                           // if($("#majorName").val()=="CS") {
                                                for (var i = 0; i < result.length; i++) {
                                                    var m = result[i].cid;
                                                    var v = result[i].cid;
                                                    opt = $('<option />', {
                                                        value: v,
                                                        text: m

                                                    });
                                                    opt.appendTo(el);

                                                }
                                                el.multiselect('refresh');
                                            }
                                       // }
                                    });
                                 }});

                            </script>

                        </p>
                        <div id="elearea">
                            <h3 style="color:darkgreen">Please add elective course to elective group</h3>

                            <div>
                            <h4 style="color:darkgreen">Group1</h4>
                            <select name="elegrup1" id="ele1" multiple="multiple" style="width:400px">

                            </select>   <button class="btn" id="addg" type="button">add more group</button>
                            </div>

                            <div id="elegrup2" style="display:none">
                            <h4 style="color:darkgreen">Group2</h4>
                            <select name="elegrup2" multiple="multiple" style="width:400px" id="ele2">

                            </select>
                            </div >
                            <div id="elegrup3" style="display:none">
                                <h4 style="color:darkgreen">Group3</h4>
                                <select name="elegrup3" multiple="multiple" style="width:400px" id="ele3">

                                </select>
                            </div>
                            <div id="elegrup4" style="display:none">
                                <h4 style="color:darkgreen">Group4</h4>
                                <select name="elegrup4" multiple="multiple" style="width:400px" id="ele4">

                                </select>
                            </div>
                            <div id="elegrup5" style="display:none">
                                <h4 style="color:darkgreen">Group5</h4>
                                <select name="elegrup5" multiple="multiple" style="width:400px" id="ele5">

                                </select>
                            </div>
                            <div id="elegrup6" style="display:none">
                                <h4 style="color:darkgreen">Group6</h4>
                                <select name="elegrup" multiple="multiple" style="width:400px" id="ele6">
                                </select>
                            </div>
                            <div id="elegrup7" style="display:none">
                                <h3 style="color:darkgreen">Group7</h3>
                                <select name="elegrup7" multiple="multiple" style="width:400px" id="ele7">

                                </select>
                            </div>
                            <div id="elegrup8" style="display:none">
                                <h4 style="color:darkgreen">Group8</h4>
                                <select name="elegrup8" id="ele8" multiple="multiple" style="width:400px">

                                </select>
                                <script>

                                    $("select").multiselect({beforeopen:function() {
                                        var id = this.id;

                                        var el = $("#" + id).multiselect();
                                        var majorName = $("#majorName").val();
                                       // alert(id);
                                        if(id!="majorName"){
                                        $.ajax({
                                            url: "../service/getMajorAndMajorName.php?message=" + majorName,
                                            success: function (result) {
                                                // alert($("#majorName").val());
                                                // alert(result);
                                                result = eval(result);
                                                // alert(result);
                                                //alert($("#majorName").val());
                                                // el.removeChild();
                                                //  $("#corelist").multiselect("option").empty();
                                                //  el.child().empty();
                                                $("#" + id).empty();
                                                // if($("#majorName").val()=="CS") {
                                                for (var i = 0; i < result.length; i++) {
                                                    var m = result[i].cid;
                                                    var v = result[i].cid;
                                                    opt = $('<option />', {
                                                        value: v,
                                                        text: m

                                                    });
                                                    opt.appendTo(el);

                                                }
                                                el.multiselect('refresh');
                                            }
                                            // }
                                        });
                                    }
                                    }});
                                //    }
                                </script>
                            </div>
                            <input type="submit" class="btn btn-success" value="Submit">
                        </div>

                    </form>
</div>



                </div>
            </div>
</body>
</html>
