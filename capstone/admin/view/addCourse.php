

<?php
include_once "adminView.php";
?>
 <form action="../model/saveCourse.php" method="post" name="saveCourse">
                <table  width="694" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family:'宋体'; font-size:18px;font-weight: bold">
<!--                    <div align="center">-->
<!--                        <div align="left">-->
                            <table width="800" border="0" align="center">
                                <tr>
                                    <td width="400" height="44"><h3 class="text-success text-left">Course ID </h3></td>
                                    <td width="400"><input name="cid" type="text" class="form-control" style="color:#999999"
                                                           onFocus="if(value==defaultValue){value='';this.style.color='#000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999'}" value="Please ennter course id" size="45"></td>
                                </tr>
                                <tr>
                                    <td height="60"><h3 class="text-success">Title</h3></td>
                                    <td><input  name="title" type="text" class="form-control" style="color:#999999"
                                               onFocus="if(value==defaultValue){value='';this.style.color='#000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999'}" value="Please enter course title" size="45"></td>
                                </tr>
                                <tr>
                                    <td height="60"><h3 class="text-success">Major</h3></td>
                                    <td><input name="major" type="text" class="form-control" style="color:#999999"
                                               onFocus="if(value==defaultValue){value='';this.style.color='#000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999'}" value="Please ennter course id" size="45"></td>
                                </tr>
                                <tr>
                                    <td><h3 class="text-success">Offer Year</h3></td>
                                    <td><select name="offerYear" class="form-control">
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                        </select></td></tr>
                                    <tr>
                                    <td><h3 class="text-success">Offer Semester</h3></td>
                                    <td><select name="offerTime" class="form-control">
                                            <option value="spring">Spring</option>
                                            <option value="fall">Fall</option>
                                            <option value="spring fall">Spring and Fall</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td height="100"><h3 class="text-success">Prerequisites</h3></td>
                                    <!--                                    <td><textarea name="prerequisites" cols="45" rows="3" style="color:#999999" onFocus="if(value==defaultValue){value='';this.style.color='#000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999'}">please enter course prerequisites</textarea></td>-->
                                    <!--                                    <td><input type="text" id="template" onkeyup="getCourse(this.value)"><input type="button" value="add" onclick="addP(0)"><p><span id="xxx"></span></p></td>-->
                                    <td><input type="text" id="template"  class="form-control" placeholder="Please input prerequisites" onkeyup="getCourse(this.value)" list="list">
                                        <datalist id="list">

                                        </datalist>
                                        <input type="button" value="Add" class="btn btn-primary" onclick="addP(0)"><p><span id="xxx"></span></p></td>
                                    <!--                                    <td> <textarea rows="3" cols="20" id="template" onkeyup="getCourse(this.value)"></textarea><input type="button" value="confirm" onclick="addP(0)"><p><span id="xxx"></span></p></td>-->
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="button" class="btn btn-primary btn-sm" value="AND" size="4" onclick="addP(1)">
                                        <input type="button"  class="btn btn-primary btn-sm" value="OR" size="6" onclick="addP(2)">
                                        <!--                                    <input type="button" value="NOT" size="4" onclick="addP(3)">-->
                                        <input type="button" class="btn btn-primary btn-sm" value="(" size="2" onclick="addP(4)">
                                        <input type="button" class="btn btn-primary btn-sm" value=")" size="2" onclick="addP(5)"><br><br>
                                        <b>Other requirements:</b>
                                        <select id="other" onchange="otherReq(this.value)">
                                            <option value="0">Please select...</option>
                                            <option value="1">Mark</option>
                                            <option value="2">Semester</option>
                                            <option value="3">Major</option>
                                            <option value="4">Consent</option>
                                            <option value="5">Grade</option>
                                        </select><br>
                                        <p><span id="oo"></span></p>
                                    </td>

                                </tr>
                                <tr>
                                    <td> <h3 class="text-success">Prerequisites overview</h3></td>
                                    <!--                                    <td><input type="text" name="prerequisites" id="pid" size="50" readonly></td>-->
                                    <td> <textarea class="form-control" rows="3" cols="45" name="prerequisites" id="pid" readonly></textarea><br>
                                        <input type="button" class="btn btn-primary"onclick="clearP()" value="clear">
                                        <input type="button" class="btn btn-primary" value="check"   onclick="showCNF(document.getElementById('pid').value)">
                                        <p><span id="CNF"></span></p>
                                    </td>

                                </tr>
                                <tr>
                                    <td height="60"><label><h3 class="text-success">Credits</h3></label></td>
                                    <td><input name="credits"class="form-control" type="text" style="color:#999999"
                                               onFocus="if(value==defaultValue){value='';this.style.color='#000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999'}"value="please enter credits" size="45"></td>
                                </tr>
                                <tr>
                                    <td height="58"><h3 class="text-success">Lab?</h3></td>
                                    <td><input name="lab" type="radio" value="yes">
                                        yes
                                        <input name="lab" type="radio"  value="no" checked>
                                        no</td>
                                </tr>
                                <tr>
                                    <td height="58"><h3 class="text-success">Restrictions?</h3>
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
                                    <td height="58"><h3 class="text-success">CrossList?</h3></td>
                                    <td><input name="CrossList" type="radio" value="yes" onclick="showCroDiv()" >
                                        yes
                                        <input name="Crosslist" type="radio"  value="no" checked onclick="closeCroDiv()" >
                                        no<br>
                                        <p id="cro"></p></td>
                                </tr>
                                <tr>
                                    <td><h3 class="text-success">Description</h3></td>
                                    <td><textarea class="form-control" name="description" rows="3"></textarea></td>
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
                            <input type="button" value="submit"  class="btn btn-primary btn-lg onClick="check()" >
                            <input type="reset" value="clear"class="btn btn-warning btn-lg">
                        </div>
                    </div>

                </table>
    <div id="res" style="display:none; POSITION:absolute; left:75%; top:45%; width:600px; height:300px; margin-left:-300px; margin-top:-200px; border:2px solid #888; background-color:#f4ffe4; text-align:center">
        <h3 class="text-success"PLEASE ADD A RESTRICTIONS></h3>
        <table>
            <tr>
                <td height="73"><h3 class="text-success">restrictions</h3></td>
                <!--                                    <td><textarea name="prerequisites" cols="45" rows="3" style="color:#999999" onFocus="if(value==defaultValue){value='';this.style.color='#000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999'}">please enter course prerequisites</textarea></td>-->
                <!--                                    <td><input type="text" id="template" onkeyup="getCourse(this.value)"><input type="button" value="add" onclick="addP(0)"><p><span id="xxx"></span></p></td>-->
                <td><input type="text" id="templateR" class="form-control" onkeyup="getCourse(this.value)" list="list">
                    <datalist id="list">

                    </datalist>
                    <input type="button"class="btn btn-primary" value="add" onclick="addR(0)">
                    <!--                    <p><span id="xxx"></span></p>-->
                </td>
                <!--                                    <td> <textarea rows="3" cols="20" id="template" onkeyup="getCourse(this.value)"></textarea><input type="button" value="confirm" onclick="addP(0)"><p><span id="xxx"></span></p></td>-->
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="button" class="btn btn-primary" value="AND" size="4" onclick="addR(1)">
                    <input type="button"  class="btn btn-primary" value="OR" size="6" onclick="addR(2)">
                    <!--                                    <input type="button" value="NOT" size="4" onclick="addP(3)">-->
                    <input type="button" class="btn btn-primary" value="(" size="2" onclick="addR(4)">
                    <input type="button" class="btn btn-primary" value=")" size="2" onclick="addR(5)"><br><br>

                    <p><span id="oo"></span></p>
                </td>

            </tr>
            <tr>
                <td> <h3 class="text-success">restrictions overview</h3></td>
                <!--                                    <td><input type="text" name="prerequisites" id="pid" size="50" readonly></td>-->
                <td> <textarea rows="2" cols="45" name="restrictions" id="restrictions" class="form-control" readonly></textarea><br><input type="button" onclick="clearR()" value="clear">
                    <input type="button" value="check" onclick="showCNF(document.getElementById('restrictions').value)">
                    <p><span id="CNFR"></span></p>
                </td>

            </tr>
        </table>

    </div>






    <div id="cross" style="display:none; POSITION:absolute; left:75%; top:75%; width:600px; height:200px; margin-left:-300px; margin-top:-200px; border:2px solid #888; background-color:#f4ffe4; text-align:center">
        <p id="croi"></p>
        <h3 class="text-success"PLEASE ADD A RESTRICTIONS>please add crosslist courses</h3>
        <table>
            <tr>
                <td height="73"><h3 class="text-success">Course</h3></td>
                <td><input type="text" id="templateC" class="form-control" onkeyup="getCourse(this.value)" list="list">
                    <datalist id="list"></datalist>
                    <input type="button"  class="btn btn-primary" value="add" onclick="addC(0)">
                    <input type="reset"  class="btn btn-primary" value="clear" >
                    <!--                    <p><span id="xxx"></span></p>-->
                </td>
            </tr>
            <tr>
                <td> <h3 class="text-success">Crosslist overview</h3></td>

                <td> <textarea rows="3" cols="45" class="form-control" id="crosslist" name="crosslist"></textarea></td>
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
 </form>
</div>
</body>
     <script language="JavaScript">
         var flagP="F";
         var flagR="F";
         var flagC="F";
         var count=0;
         function clearP(){
             document.getElementById("pid").value="";
             flagP="F";
             count=0;
         }
         function clearR(){
             document.getElementById("restrictions").value="";
             flagR="F";
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

                         if (flagC == "F") {
                             var result = document.getElementById("templateC").value;
                             document.getElementById("templateC").value="";
                             result = document.getElementById("crosslist").value + result;
                             document.getElementById("crosslist").value = result;
                             flagC = "T";
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
                     if(flagC=="F"){
                         alert("invalid input")
                     }else{
                         <!--ignore -->
                         document.getElementById("crosslist").value+=" ∧ ";
                         flagC="F";
                     }
                     break;
                 case 2:
                     if(flagC=="F"){
                         alert("invalid input")
                     }else{
                         document.getElementById("crosslist").value+=" ∨ ";
                         flagC="F";
                     }
                     break;
                 case 3:
                     if(flagC=="T"){
                         alert("invalid input")
                     }else{
                         document.getElementById("crosslist").value+="!";

                     }
                     break;
                 case 4:
                     if(flagC=="T"){
                         alert("invalid input")
                     }else {
                         document.getElementById("crosslist").value += "( ";
                     }
                     count++;
                     break;
                 case 5:
                     if(count==0||flagC=="F"){
                         alert("invalid input");
                     }else {
                         document.getElementById("crosslist").value += " )";
                         count--;
                     }
                     break;
                 case 6:
                     if (flagC == "T") {
                         alert("invalid input");
                     }else{
                         document.getElementById("crosslist").value +="(>="+document.getElementById("addMark1").value+"in"+document.getElementById("addMark2").value+")";
                         flagC="T";
                     }
                     break;
                 case 7:
                     if(flagC=="T"){
                         alert("invalid input");
                     }else{
                         document.getElementById("crosslist").value+="("+document.getElementById("addSemester1").value+"of"+document.getElementById("addSemester2").value+")";
                         flagC="T";
                     }
                     break;
                 case 8:
                     if(flagC=="T"){
                         alert("invalid input");
                     }else{
                         // alert(count);
                         document.getElementById("crosslist").value+=" ( "+document.getElementById("addMajor").value+"Major"+" ) ";
                         // alert(count);
                         flagC="T";
                     }
                     break;
                 case 9:
                     if(flagC=="T"){
                         alert("invalid input");
                     }else{
                         document.getElementById("crosslist").value+=" ( "+document.getElementById("addConsent").value+" consent ) ";
                         flagC="T";
                     }
                     break;
                 case 10:
                     if(flagC=="T"){
                         alert("invalid input");
                     }else{
                         document.getElementById("crosslist").value+=document.getElementById("addGrade").value;
                         flagC="T";
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

                         if (flagR == "F") {
                             var result = document.getElementById("templateR").value;
                             document.getElementById("templateR").value="";
                             result = document.getElementById("restrictions").value + result;
                             document.getElementById("restrictions").value = result;
                             flagR = "T";
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
                     if(flagR=="F"){
                         alert("invalid input")
                     }else{
                         <!--ignore -->
                         document.getElementById("restrictions").value+=" ∧ ";
                         flagR="F";
                     }
                     break;
                 case 2:
                     if(flagR=="F"){
                         alert("invalid input")
                     }else{
                         document.getElementById("restrictions").value+=" ∨ ";
                         flagR="F";
                     }
                     break;
                 case 3:
                     if(flagR=="T"){
                         alert("invalid input")
                     }else{
                         document.getElementById("restrictions").value+="!";

                     }
                     break;
                 case 4:
                     if(flagR=="T"){
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
                     if (flagR == "T") {
                         alert("invalid input");
                     }else{
                         document.getElementById("restrictions").value +="(>="+document.getElementById("addMark1").value+"in"+document.getElementById("addMark2").value+")";
                         flagR="T";
                     }
                     break;
                 case 7:
                     if(flagR=="T"){
                         alert("invalid input");
                     }else{
                         document.getElementById("restrictions").value+="("+document.getElementById("addSemester1").value+"of"+document.getElementById("addSemester2").value+")";
                         flagR="T";
                     }
                     break;
                 case 8:
                     if(flagR=="T"){
                         alert("invalid input");
                     }else{
                         // alert(count);
                         document.getElementById("restrictions").value+=" ( "+document.getElementById("addMajor").value+"Major"+" ) ";
                         // alert(count);
                         flagR="T";
                     }
                     break;
                 case 9:
                     if(flagR=="T"){
                         alert("invalid input");
                     }else{
                         document.getElementById("restrictions").value+=" ( "+document.getElementById("addConsent").value+" consent ) ";
                         flagR="T";
                     }
                     break;
                 case 10:
                     if(flagR=="T"){
                         alert("invalid input");
                     }else{
                         document.getElementById("restrictions").value+=document.getElementById("addGrade").value;
                         flagR="T";
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

                         if (flagP == "F") {
                             var result = document.getElementById("template").value;
                             document.getElementById("template").value="";
                             result = document.getElementById("pid").value + result;
                             document.getElementById("pid").value = result;
                             flagP = "T";
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
                     if(flagP=="F"){
                         alert("invalid input")
                     }else{
                         <!--ignore -->
                         document.getElementById("pid").value+=" ∧ ";
                         flagP="F";
                     }
                     break;
                 case 2:
                     if(flagP=="F"){
                         alert("invalid input")
                     }else{
                         document.getElementById("pid").value+=" ∨ ";
                         flagP="F";
                     }
                     break;
                 case 3:
                     if(flagP=="T"){
                         alert("invalid input")
                     }else{
                         document.getElementById("pid").value+="!";

                     }
                     break;
                 case 4:
                     if(flagP=="T"){
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
                     if (flagP == "T") {
                         alert("invalid input");
                     }else{
                         document.getElementById("pid").value +="(>="+document.getElementById("addMark1").value+"in"+document.getElementById("addMark2").value+")";
                         flagP="T";
                     }
                     break;
                 case 7:
                     if(flagP=="T"){
                         alert("invalid input");
                     }else{
                         document.getElementById("pid").value+="("+document.getElementById("addSemester1").value+"of"+document.getElementById("addSemester2").value+")";
                         flagP="T";
                     }
                     break;
                 case 8:
                     if(flagP=="T"){
                         alert("invalid input");
                     }else{
                         // alert(count);
                         document.getElementById("pid").value+=" ( "+document.getElementById("addMajor").value+"Major"+" ) ";
                         // alert(count);
                         flagP="T";
                     }
                     break;
                 case 9:
                     if(flagP=="T"){
                         alert("invalid input");
                     }else{
                         document.getElementById("pid").value+=" ( "+document.getElementById("addConsent").value+" consent ) ";
                         flagP="T";
                     }
                     break;
                 case 10:
                     if(flagP=="T"){
                         alert("invalid input");
                     }else{
                         document.getElementById("pid").value+=document.getElementById("addGrade").value;
                         flagP="T";
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
</html>
