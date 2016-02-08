
<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">-->
<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Transitional//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" >
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
    <meta charset="UTF-8" >
    <script language="JavaScript">
        var flag="F";
        var count=0;
        function clearP(){
            document.getElementById("pid").value="";
            flag="F";
            count=0;
        }
        function clearR(){
            document.getElementById("restrictions").value="";
            flag="F";
            count=0;
        }

        function showResDiv(){

            document.getElementById("res").style.display="";
        }
        function closeResDiv(){
            clearR();
            document.getElementById("res").style.display="none";

        }

        function showCroDiv(){

            document.getElementById("cross").style.display="";


        }
        function closeCroDiv(){
            document.getElementById("crosslist").value="";
            document.getElementById("cross").style.display="none";

        }

        function showCnfDiv(){
            document.getElementById("win").style.display="";
        }
        function closeCnfDiv(){
            document.getElementById("win").style.display="none";
        }


        function showCNF(prerequisites){
            //   alert(1);
            var xhttp = new XMLHttpRequest();
            if(prerequisites==""){
                document.getElementById("cnfi").innerHTML="";
                return;
            }
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("cnfi").innerHTML = xhttp.responseText;
                }
            }
            xhttp.open("POST", "/capstone/AnalysisPrerequisites.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("prerequisites="+prerequisites);
            showCnfDiv();
        }
        function otherReq(value){
            if(value==0){
                document.getElementById("oo").innerHTML="";
            }else if(value==1){
                //  alert(1);
                <!--ignore -->
                document.getElementById("oo").innerHTML="<select id='addMark1'><option value='A'>A</option><option value='B'>B</option><option value='C'>C</option><option value='D'>D</option></select>" +
                " or better in Course <input type='text' id='addMark2'><input type='button' value='add' onclick='addP(6)'>";

            }else if(value==2){
                <!--ignore -->
                document.getElementById("oo").innerHTML="<input type='text' id='addSemester1'>semester(s) of course<input type='text' id='addSemester2'><input type='button' value='add' onclick='addP(7)'>";
            }else if(value==3){
                <!--ignore -->
                document.getElementById("oo").innerHTML="<input type='text' id='addMajor'><input type='button' value='add' onclick='addP(8)'>";
            }else if(value==4){
                <!--ignore -->
                document.getElementById("oo").innerHTML="<select id='addConsent'><option value='instructor'>Instructor</option><option value='department'>Department</option> </select><input type='button' value='add' onclick='addP(9)'>";
            }else if(value==5){
                <!--ignore -->
                document.getElementById("oo").innerHTML="<select id='addGrade'><option value='freshman'>freshman</option><option value='sophomore'>sophomore</option>" +
                "<option value='junior'>junior</option><option value='senior'>senior</option></select><input type='button' value='add' onclick='addP(10)'>";
            }
        }
        var temp="";
        function getDetailCourse(cid){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                // alert(1);
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    //  alert(xhttp.responseText);
                    if(xhttp.responseText==""){
                        temp="no";
                    }else{
                        temp="yes";
                    }
                }
            };
            xhttp.open("GET", "/capstone/getCourse.php?cid="+cid+"&key=1", false);
            xhttp.send();
        }
        function addC(value){
            switch (value)
            {
                case 0:
                    getDetailCourse(document.getElementById("templateC").value);
                    //  temp=document.getElementById("xxx").innerHTML;
                    // alert(temp);
                    if (temp=="yes") {

                        if (flag == "F") {
                            var result = document.getElementById("templateC").value;
                            document.getElementById("templateC").value="";
                            result = document.getElementById("crosslist").value + result;
                            document.getElementById("crosslist").value = result;
                            flag = "T";
                            document.getElementById("xxx").innerHTML="";
                        }else{
                            alert("invalid input");
                            //alert(result);
                        }
                    }else{
                        alert("can not add this course because this course id not exist");
                    }
                    break;
                case 1:
                    if(flag=="F"){
                        alert("invalid input")
                    }else{
                        <!--ignore -->
                        document.getElementById("crosslist").value+=" ∧ ";
                        flag="F";
                    }
                    break;
                case 2:
                    if(flag=="F"){
                        alert("invalid input")
                    }else{
                        document.getElementById("crosslist").value+=" ∨ ";
                        flag="F";
                    }
                    break;
                case 3:
                    if(flag=="T"){
                        alert("invalid input")
                    }else{
                        document.getElementById("crosslist").value+="!";

                    }
                    break;
                case 4:
                    if(flag=="T"){
                        alert("invalid input")
                    }else {
                        document.getElementById("crosslist").value += "( ";
                    }
                    count++;
                    break;
                case 5:
                    if(count==0||flag=="F"){
                        alert("invalid input");
                    }else {
                        document.getElementById("crosslist").value += " )";
                        count--;
                    }
                    break;
                case 6:
                    if (flag == "T") {
                        alert("invalid input");
                    }else{
                        document.getElementById("crosslist").value +="(>="+document.getElementById("addMark1").value+"in"+document.getElementById("addMark2").value+")";
                        flag="T";
                    }
                    break;
                case 7:
                    if(flag=="T"){
                        alert("invalid input");
                    }else{
                        document.getElementById("crosslist").value+="("+document.getElementById("addSemester1").value+"of"+document.getElementById("addSemester2").value+")";
                        flag="T";
                    }
                    break;
                case 8:
                    if(flag=="T"){
                        alert("invalid input");
                    }else{
                        // alert(count);
                        document.getElementById("crosslist").value+=" ( "+document.getElementById("addMajor").value+"Major"+" ) ";
                        // alert(count);
                        flag="T";
                    }
                    break;
                case 9:
                    if(flag=="T"){
                        alert("invalid input");
                    }else{
                        document.getElementById("crosslist").value+=" ( "+document.getElementById("addConsent").value+" consent ) ";
                        flag="T";
                    }
                    break;
                case 10:
                    if(flag=="T"){
                        alert("invalid input");
                    }else{
                        document.getElementById("crosslist").value+=document.getElementById("addGrade").value;
                        flag="T";
                    }
                    break;
            }



        }
        function addR(value){
            switch (value)
            {
                case 0:
                    //alert(document.getElementById("templateR").value);
                    getDetailCourse(document.getElementById("templateR").value);
                    //  temp=document.getElementById("xxx").innerHTML;
                    //alert(temp);
                    if (temp=="yes") {

                        if (flag == "F") {
                            var result = document.getElementById("templateR").value;
                            document.getElementById("templateR").value="";
                            result = document.getElementById("restrictions").value + result;
                            document.getElementById("restrictions").value = result;
                            flag = "T";
                            document.getElementById("xxx").innerHTML="";
                        }else{
                            alert("invalid input");
                            //alert(result);
                        }
                    }else{
                        alert("can not add this course because this course id not exist");
                    }
                    break;
                case 1:
                    if(flag=="F"){
                        alert("invalid input")
                    }else{
                        <!--ignore -->
                        document.getElementById("restrictions").value+=" ∧ ";
                        flag="F";
                    }
                    break;
                case 2:
                    if(flag=="F"){
                        alert("invalid input")
                    }else{
                        document.getElementById("restrictions").value+=" ∨ ";
                        flag="F";
                    }
                    break;
                case 3:
                    if(flag=="T"){
                        alert("invalid input")
                    }else{
                        document.getElementById("restrictions").value+="!";

                    }
                    break;
                case 4:
                    if(flag=="T"){
                        alert("invalid input")
                    }else {
                        document.getElementById("restrictions").value += "( ";
                    }
                    count++;
                    break;
                case 5:
                    if(count==0||flag=="F"){
                        alert("invalid input");
                    }else {
                        document.getElementById("restrictions").value += " )";
                        count--;
                    }
                    break;
                case 6:
                    if (flag == "T") {
                        alert("invalid input");
                    }else{
                        document.getElementById("restrictions").value +="(>="+document.getElementById("addMark1").value+"in"+document.getElementById("addMark2").value+")";
                        flag="T";
                    }
                    break;
                case 7:
                    if(flag=="T"){
                        alert("invalid input");
                    }else{
                        document.getElementById("restrictions").value+="("+document.getElementById("addSemester1").value+"of"+document.getElementById("addSemester2").value+")";
                        flag="T";
                    }
                    break;
                case 8:
                    if(flag=="T"){
                        alert("invalid input");
                    }else{
                        // alert(count);
                        document.getElementById("restrictions").value+=" ( "+document.getElementById("addMajor").value+"Major"+" ) ";
                        // alert(count);
                        flag="T";
                    }
                    break;
                case 9:
                    if(flag=="T"){
                        alert("invalid input");
                    }else{
                        document.getElementById("restrictions").value+=" ( "+document.getElementById("addConsent").value+" consent ) ";
                        flag="T";
                    }
                    break;
                case 10:
                    if(flag=="T"){
                        alert("invalid input");
                    }else{
                        document.getElementById("restrictions").value+=document.getElementById("addGrade").value;
                        flag="T";
                    }
                    break;
            }



        }
        function addP(value) {
            switch (value)
            {
                case 0:
                    getDetailCourse(document.getElementById("template").value);
                    //  temp=document.getElementById("xxx").innerHTML;
                    // alert(temp);
                    if (temp=="yes") {

                        if (flag == "F") {
                            var result = document.getElementById("template").value;
                            document.getElementById("template").value="";
                            result = document.getElementById("pid").value + result;
                            document.getElementById("pid").value = result;
                            flag = "T";
                            document.getElementById("xxx").innerHTML="";
                        }else{
                            alert("invalid input");
                            //alert(result);
                        }
                    }else{
                        alert("can not add this course because this course id not exist");
                    }
                    break;
                case 1:
                    if(flag=="F"){
                        alert("invalid input")
                    }else{
                        <!--ignore -->
                        document.getElementById("pid").value+=" ∧ ";
                        flag="F";
                    }
                    break;
                case 2:
                    if(flag=="F"){
                        alert("invalid input")
                    }else{
                        document.getElementById("pid").value+=" ∨ ";
                        flag="F";
                    }
                    break;
                case 3:
                    if(flag=="T"){
                        alert("invalid input")
                    }else{
                        document.getElementById("pid").value+="!";

                    }
                    break;
                case 4:
                    if(flag=="T"){
                        alert("invalid input")
                    }else {
                        document.getElementById("pid").value += "( ";
                    }
                    count++;
                    break;
                case 5:
                    if(count==0||flag=="F"){
                        alert("invalid input");
                    }else {
                        document.getElementById("pid").value += " )";
                        count--;
                    }
                    break;
                case 6:
                    if (flag == "T") {
                        alert("invalid input");
                    }else{
                        document.getElementById("pid").value +="(>="+document.getElementById("addMark1").value+"in"+document.getElementById("addMark2").value+")";
                        flag="T";
                    }
                    break;
                case 7:
                    if(flag=="T"){
                        alert("invalid input");
                    }else{
                        document.getElementById("pid").value+="("+document.getElementById("addSemester1").value+"of"+document.getElementById("addSemester2").value+")";
                        flag="T";
                    }
                    break;
                case 8:
                    if(flag=="T"){
                        alert("invalid input");
                    }else{
                        // alert(count);
                        document.getElementById("pid").value+=" ( "+document.getElementById("addMajor").value+"Major"+" ) ";
                        // alert(count);
                        flag="T";
                    }
                    break;
                case 9:
                    if(flag=="T"){
                        alert("invalid input");
                    }else{
                        document.getElementById("pid").value+=" ( "+document.getElementById("addConsent").value+" consent ) ";
                        flag="T";
                    }
                    break;
                case 10:
                    if(flag=="T"){
                        alert("invalid input");
                    }else{
                        document.getElementById("pid").value+=document.getElementById("addGrade").value;
                        flag="T";
                    }
                    break;
            }


        }
        function getCourse(str){
            //document.getElementById("list").options.length=0;

            var xmlhttp;
            if(str==""){
                document.getElementById("list").innerHTML="";
                return;
            }
            if(window.XMLHttpRequest){
                xmlhttp=new XMLHttpRequest();
            }else{
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange= function (){
                <!--ignore -->
                if(xmlhttp.readyState==4&&xmlhttp.status==200){
                    var result=xmlhttp.responseText;
                    if(result==null){
                        document.getElementById("list").innerHTML="";
                    }else {
                        var array = result.split(" ");
                        result="";
                        document.getElementById('list').innerHTML="";
                        for(var z=0;z<array.length;z++){
                            var select = document.getElementById('list');
                            var newOption = document.createElement('option');// create a new option and add it to the select
                            newOption.value = array[z];
                            newOption.innerHTML = array[z];
                            select.appendChild(newOption);
                        }
                    }
                }
            };

            xmlhttp.open("GET","/capstone/getCourse.php?cid="+str,true);
            xmlhttp.send();
        }
        function check(){
            if(count!=0){
                alert("prerequisites is not valid");
                return;
            }
            if(saveCourse.cid.value==""||saveCourse.cid.value=="please ennter course id"){
                alert("please enter course id??");
                saveCourse.cid.focus();
                return;
            }else if(saveCourse.title.value==""||saveCourse.title.value=="please enter course title"){
                alert("please enter course title??");
                saveCourse.title.focus();
                return;
            }else if(saveCourse.credits.value==""||saveCourse.credits.value=="please enter credits"){
                alert("please enter credit??");
                saveCourse.credits.focus();
                return;
            }else{
                saveCourse.submit();
            }

        }
    </script>

    <title>Home Page</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <link rel="stylesheet" href="css/mm_health_nutr.css" type="text/css" />

    <style type="text/css">
        <!--
        .STYLE1 {font-size: 16px}
        -->
    </style>
</head>
<body bgcolor="#F4FFE4">
<form action="saveCourse.php" method="post" name="saveCourse">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr bgcolor="#D5EDB3">
            <td colspan="3" rowspan="2"><img src="images/mm_health_photo.jpg" alt="Header image" width="382" height="101" border="0" /></td>
            <td height="50" colspan="3" id="logo" valign="bottom" align="center" nowrap="nowrap">Admin manage interface</td>
            <td width="657">&nbsp;</td>
        </tr>

        <tr bgcolor="#D5EDB3">
            <td height="51" colspan="3" id="tagline" valign="top" align="center">save course</td>
            <td width="657">&nbsp;</td>
        </tr>

        <tr>
            <td colspan="7" bgcolor="#5C743D"><img src="images/mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
        </tr>

        <tr>
            <td colspan="7" bgcolor="#99CC66" background="images/mm_dashed_line.gif"><img src="images/mm_dashed_line.gif" alt="line decor" width="4" height="3" border="0" /></td>
        </tr>

        <tr bgcolor="#99CC66">
            <td colspan="7" id="dateformat" height="20">&nbsp;&nbsp;<script language="JavaScript" type="text/javascript">
                    document.write(TODAY);	</script>	</td>
        </tr>
        <tr>
            <td colspan="7" bgcolor="#99CC66" background="images/mm_dashed_line.gif"><img src="images/mm_dashed_line.gif" alt="line decor" width="4" height="3" border="0" /></td>
        </tr>

        <tr>
            <td colspan="7" bgcolor="#5C743D"><img src="images/mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
        </tr>

        <tr>
            <td width="165" height="974" valign="top" bgcolor="#5C743D">
                <table border="0" cellspacing="0" cellpadding="0" width="165" id="navigation">
                    <tr>
                        <td width="165">&nbsp;<br />
                            &nbsp;<br /></td>
                    </tr>
                    <tr>
                        <td width="165"><a href="addCourse.php" class="navText">add Course</a></td>
                    </tr>
                    <tr>
                        <td width="165"><a href="showCourse.php" class="navText">show Course</a></td>
                    </tr>
                    <tr>
                        <td width="165"><a href="showOfferingBrief.php" class="navText">show Offering</a></td>
                    </tr>
                    <tr>
                        <td width="165"><a href="javascript:;" class="navText">guidelink4</a></td>
                    </tr>
                    <tr>
                        <td width="165"><a href="javascript:;" class="navText">guidelink5</a></td>
                    </tr>
                </table>
                ?<br />
                &nbsp;<br />
                &nbsp;<br />
                &nbsp;<br /> 	</td>
            <td width="50"><img src="images/mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
            <td colspan="2" valign="top"><img src="images/mm_spacer.gif" alt="" width="305" height="1" border="0" /><br />
                &nbsp;<br />
                &nbsp;<br />




                <p>&nbsp;      </p>
                <p>&nbsp;</p>
                <table width="694" border="0" align="center" cellpadding="0" cellspacing="0">
                    <div align="center">
                        <div align="left">
                            <table width="583" border="0" align="center">
                                <tr>
                                    <td width="110" height="44">course id </td>
                                    <td width="463"><input name="cid" type="text" style="color:#999999"
                                                           onFocus="if(value==defaultValue){value='';this.style.color='#000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999'}" value="please ennter course id" size="45"></td>
                                </tr>
                                <tr>
                                    <td height="39">title</td>
                                    <td><input name="title" type="text" style="color:#999999"
                                               onFocus="if(value==defaultValue){value='';this.style.color='#000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999'}" value="please enter course title" size="45"></td>
                                </tr>
                                <tr>
                                    <td height="73">prerequisites</td>
                                    <!--                                    <td><textarea name="prerequisites" cols="45" rows="3" style="color:#999999" onFocus="if(value==defaultValue){value='';this.style.color='#000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999'}">please enter course prerequisites</textarea></td>-->
                                    <!--                                    <td><input type="text" id="template" onkeyup="getCourse(this.value)"><input type="button" value="add" onclick="addP(0)"><p><span id="xxx"></span></p></td>-->
                                    <td><input type="text" id="template" onkeyup="getCourse(this.value)" list="list">
                                        <datalist id="list">

                                        </datalist>
                                        <input type="button" value="add" onclick="addP(0)"><p><span id="xxx"></span></p></td>
                                    <!--                                    <td> <textarea rows="3" cols="20" id="template" onkeyup="getCourse(this.value)"></textarea><input type="button" value="confirm" onclick="addP(0)"><p><span id="xxx"></span></p></td>-->
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="button" value="AND" size="4" onclick="addP(1)">
                                        <input type="button" value="OR" size="6" onclick="addP(2)">
                                        <!--                                    <input type="button" value="NOT" size="4" onclick="addP(3)">-->
                                        <input type="button" value="(" size="2" onclick="addP(4)">
                                        <input type="button" value=")" size="2" onclick="addP(5)"><br><br>
                                        other requirements:
                                        <select id="other" onchange="otherReq(this.value)">
                                            <option value="0">please select...</option>
                                            <option value="1">mark</option>
                                            <option value="2">semester</option>
                                            <option value="3">major</option>
                                            <option value="4">consent</option>
                                            <option value="5">grade</option>
                                        </select><br>
                                        <p><span id="oo"></span></p>
                                    </td>

                                </tr>
                                <tr>
                                    <td> prerequisites overview</td>
                                    <!--                                    <td><input type="text" name="prerequisites" id="pid" size="50" readonly></td>-->
                                    <td> <textarea rows="2" cols="45" name="prerequisites" id="pid" readonly></textarea><br><input type="button" onclick="clearP()" value="clear">
                                        <input type="button" value="check"   onclick="showCNF(document.getElementById('pid').value)">
                                        <p><span id="CNF"></span></p>
                                    </td>

                                </tr>
                                <tr>
                                    <td height="60"><label>credits</label></td>
                                    <td><input name="credits" type="text" style="color:#999999"
                                               onFocus="if(value==defaultValue){value='';this.style.color='#000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999'}"value="please enter credits" size="45"></td>
                                </tr>
                                <tr>
                                    <td height="58">lab?</td>
                                    <td><input name="lab" type="radio" value="yes">
                                        yes
                                        <input name="lab" type="radio"  value="no" checked>
                                        no</td>
                                </tr>
                                <tr>
                                    <td height="58">restrictions?
                                        <br></td>
                                    <td>
                                        <br>
                                        <input name="restrictions" type="radio" value="yes"  onclick="showResDiv()" >
                                        yes
                                        <input name="restrictions" type="radio"  value="no" checked onclick="closeResDiv()" >
                                        no


                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><p id="res2"></p></td>

                                </tr>
                                <tr>
                                    <td height="58">CrossList?</td>
                                    <td><input name="CrossList" type="radio" value="yes" onclick="showCroDiv()" >
                                        yes
                                        <input name="Crosslist" type="radio"  value="no" checked onclick="closeCroDiv()" >
                                        no<br>
                                        <p id="cro"></p></td>
                                </tr>
                            </table>

                        </div>
                        <p id="subCourse"></p>
                        <div align="center">
                            <?php
                            if($_GET["error"]!=null){
                                echo "<p style='color:red'>";
                                echo $_GET["error"]."<br/></p>";
                            }
                            ?>
                            <input type="button" value="submit" onClick="check()" >
                            <input type="reset" value="clear">
                        </div>
                    </div>

                </table>
                <p><br />
                    &nbsp;<br />
                </p>
                <p>&nbsp;	  </p></td>
            <td width="50"><img src="images/mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
            <td width="347" valign="top"><br />
                &nbsp;<br />

            <td width="657">&nbsp;</td>
        </tr>
        <tr>
            <td width="165">&nbsp;</td>
            <td width="50">&nbsp;</td>
            <td width="192">&nbsp;</td>
            <td width="222">&nbsp;</td>
            <td width="50">&nbsp;</td>
            <td width="347">&nbsp;</td>
            <td width="657">&nbsp;</td>
        </tr>
    </table>
    <div id="res" style="display:none; POSITION:absolute; left:75%; top:45%; width:600px; height:300px; margin-left:-300px; margin-top:-200px; border:2px solid #888; background-color:#f4ffe4; text-align:center">
        PLEASE ADD A RESTRICTIONS<br>
        <table>
            <tr>
                <td height="73">restrictions</td>
                <!--                                    <td><textarea name="prerequisites" cols="45" rows="3" style="color:#999999" onFocus="if(value==defaultValue){value='';this.style.color='#000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999'}">please enter course prerequisites</textarea></td>-->
                <!--                                    <td><input type="text" id="template" onkeyup="getCourse(this.value)"><input type="button" value="add" onclick="addP(0)"><p><span id="xxx"></span></p></td>-->
                <td><input type="text" id="templateR" onkeyup="getCourse(this.value)" list="list">
                    <datalist id="list">

                    </datalist>
                    <input type="button" value="add" onclick="addR(0)">
                    <!--                    <p><span id="xxx"></span></p>-->
                </td>
                <!--                                    <td> <textarea rows="3" cols="20" id="template" onkeyup="getCourse(this.value)"></textarea><input type="button" value="confirm" onclick="addP(0)"><p><span id="xxx"></span></p></td>-->
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="button" value="AND" size="4" onclick="addR(1)">
                    <input type="button" value="OR" size="6" onclick="addR(2)">
                    <!--                                    <input type="button" value="NOT" size="4" onclick="addP(3)">-->
                    <input type="button" value="(" size="2" onclick="addR(4)">
                    <input type="button" value=")" size="2" onclick="addR(5)"><br><br>

                    <p><span id="oo"></span></p>
                </td>

            </tr>
            <tr>
                <td> restrictions overview</td>
                <!--                                    <td><input type="text" name="prerequisites" id="pid" size="50" readonly></td>-->
                <td> <textarea rows="2" cols="45" name="restrictions" id="restrictions" readonly></textarea><br><input type="button" onclick="clearR()" value="clear">
                    <input type="button" value="check" onclick="showCNF(document.getElementById('restrictions').value)">
                    <p><span id="CNFR"></span></p>
                </td>

            </tr>
        </table>

    </div>






    <div id="cross" style="display:none; POSITION:absolute; left:75%; top:85%; width:600px; height:200px; margin-left:-300px; margin-top:-200px; border:2px solid #888; background-color:#f4ffe4; text-align:center">
        <p id="croi"></p>
        please add crosslist courses
        <table>
            <tr>
                <td height="73">course</td>
                <td><input type="text" id="templateC" onkeyup="getCourse(this.value)" list="list">
                    <datalist id="list"></datalist>
                    <input type="button" value="add" onclick="addC(0)">
                    <!--                    <p><span id="xxx"></span></p>-->
                </td>
            </tr>
            <tr>
                <td> crosslist overview</td>

                <td> <textarea rows="3" cols="45" id="crosslist" name="crosslist"></textarea></td>
            </tr>
        </table>







    </div>
    <div id="win" style="clear:both;display:none; POSITION:absolute; left:44%; top:81%; width:400px; height:80px; margin-left:-300px; margin-top:-200px; border:1px solid #888; background-color:#f4ffe4; text-align:center">
        <table height="90px" align="center">
            <tr align="center">
                <td height="70px" align="center">
                    <p id="cnfi" style="font-size: small;font-weight: bold">


                    </p>
                </td>
            </tr>
            <tr align="center">
                <td height="20px" align="center">
                    <input id="123" type="button" value="close" onclick="closeCnfDiv()">
                </td>
            </tr>
        </table>
    </div>



</body>
</html>
