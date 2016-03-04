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
<?php include_once "viewStructureBody.php";?>
                <div style="margin: 0 auto;">
                    <div style="position: relative;left: 25%">
                    <h1 style="color:blue">Add major courses</h1>

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

                    <form action="../service/saveMajor.php" method="post">
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
                                    url: "../../student/service/getMajorAndMajorName.php?message=getMajors", success: function (result) {
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
                            <select id="corelist" name="corelist[]" multiple="multiple" style="width:400px" >
                            </select>

                        </p>
                        <div id="elearea">
                            <h3 style="color:darkgreen">Please add elective course to elective group</h3>

                            <div>
                            <h4 style="color:darkgreen">Group1</h4><br>
                               <label> Credits or number of courses:<br>
                                    <select name="eChoice1" id="eChoice1">
                                        <option value="credits">number of credits</option>
                                        <option value="courses">number of courses</option>
                                </select>
                                   </label><br>
                                <label><input type="text" name="eChoiceValue1" class="form-control"></label><br>
                            <select name="elegrup1[]" id="ele1" multiple="multiple" style="width:400px">

                            </select>   <button class="btn" id="addg" type="button">add more group</button>
                            </div>

                            <div id="elegrup2" style="display:none">
                            <h4 style="color:darkgreen">Group2</h4>
                                <label> Credits or number of courses:<br>
                                    <select name="eChoice2" id="eChoice2">
                                        <option value="credits">number of credits</option>
                                        <option value="courses">number of courses</option>
                                    </select>
                                </label><br>
                                <label><input type="text" name="eChoiceValue2" class="form-control"></label><br>
                            <select name="elegrup2[]" multiple="multiple" style="width:400px" id="ele2">

                            </select>
                            </div >
                            <div id="elegrup3" style="display:none">
                                <h4 style="color:darkgreen">Group3</h4>
                                <label> Credits or number of courses:<br>
                                    <select name="eChoice3" id="eChoice3">
                                        <option value="credits">number of credits</option>
                                        <option value="courses">number of courses</option>
                                    </select>
                                </label><br>
                                <label><input type="text" name="eChoiceValue3" class="form-control"></label><br>
                                <select name="elegrup3[]" multiple="multiple" style="width:400px" id="ele3">

                                </select>
                            </div>
                            <div id="elegrup4" style="display:none">
                                <h4 style="color:darkgreen">Group4</h4>
                                <label> Credits or number of courses:<br>
                                    <select name="eChoice4" id="eChoice4">
                                        <option value="credits">number of credits</option>
                                        <option value="courses">number of courses</option>
                                    </select>
                                </label><br>
                                <label><input type="text" name="eChoiceValue4" class="form-control"></label><br>
                                <select name="elegrup4[]" multiple="multiple" style="width:400px" id="ele4">

                                </select>
                            </div>
                            <div id="elegrup5" style="display:none">
                                <h4 style="color:darkgreen">Group5</h4>
                                <label> Credits or number of courses:<br>
                                    <select name="eChoice5" id="eChoice5">
                                        <option value="credits">number of credits</option>
                                        <option value="courses">number of courses</option>
                                    </select>
                                </label><br>
                                <label><input type="text" name="eChoiceValue5" class="form-control"></label><br>
                                <select name="elegrup5[]" multiple="multiple" style="width:400px" id="ele5">

                                </select>
                            </div>
                            <div id="elegrup6" style="display:none">
                                <h4 style="color:darkgreen">Group6</h4>
                                <label> Credits or number of courses:<br>
                                    <select name="eChoice6" id="eChoice6">
                                        <option value="credits">number of credits</option>
                                        <option value="courses">number of courses</option>
                                    </select>
                                </label><br>
                                <label><input type="text" name="eChoiceValue6" class="form-control"></label><br>
                                <select name="elegrup[]" multiple="multiple" style="width:400px" id="ele6">
                                </select>
                            </div>
                            <div id="elegrup7" style="display:none">
                                <h3 style="color:darkgreen">Group7</h3>
                                <label> Credits or number of courses:<br>
                                    <select name="eChoice7" id="eChoice7">
                                        <option value="credits">number of credits</option>
                                        <option value="courses">number of courses</option>
                                    </select>
                                </label><br>
                                <label><input type="text" name="eChoiceValue7" class="form-control"></label><br>
                                <select name="elegrup7[]" multiple="multiple" style="width:400px" id="ele7">

                                </select>
                            </div>
                            <div id="elegrup8" style="display:none">
                                <h4 style="color:darkgreen">Group8</h4>
                                <label> Credits or number of courses:<br>
                                    <select name="eChoice8" id="eChoice8">
                                        <option value="credits">number of credits</option>
                                        <option value="courses">number of courses</option>
                                    </select>
                                </label><br>
                                <label><input type="text" name="eChoiceValue1" class="form-control"></label><br>
                                <select name="elegrup8[]" id="ele8" multiple="multiple" style="width:400px">

                                </select>
                                <script>

                                    $("#eChoice1,#eChoice2,#eChoice3,#eChoice4,#eChoice5,#eChoice6,#eChoice7,#eChoice8").multiselect({
                                        multiple: false,
                                        header: "Select an option",
                                        noneSelectedText: "Select an Option",
                                        selectedList: 1
                                    });
                                    $("select").multiselect({beforeopen:function() {
                                       // alert($("#corelist").val());
                                       var coreValue="";
                                        var temp=$("#corelist").val();
                                               if(temp!=null){
                                               coreValue=temp;
                                           }
                                        var id = this.id;
                                        var el = $("#" + id).multiselect();
                                        var majorName = $("#majorName").val();
                                       // alert(id);

                                        if(id!="majorName"&&id!="corelist"&&id!="eChoice1"&&id!="eChoice2"&&id!="eChoice3"
                                            &&id!="eChoice4"&&id!="eChoice5"&&id!="eChoice6"&&id!="eChoice7"&&id!="eChoice8"){
                                        $.ajax({
                                            url: "../../student/service/getMajorAndMajorName.php?message=" + majorName+"&&corelist="+coreValue,
                                            success: function (result) {
                                                result = eval(result);
                                                $("#" + id).empty();
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
                                        });
                                    }else if(id=="corelist"){
                                            $.ajax({
                                                url: "../../student/service/getMajorAndMajorName.php?message=" + majorName,
                                                success: function (result) {
                                                    result = eval(result);
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
