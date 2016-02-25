<?php include_once "adminView.php"?>
<div style="position: relative;left: 25%">
<form action="../model/getMajorList.php" method="post">
<label>Major Name<input type="text" name="majorName"></label><br>
<label>Core Course<input type="text" id="core" onkeyup="getCourse(this.value,'list1')" list="list1">
    <datalist id="list1">
    </datalist>
    <input type="button" value="add" onclick="addCoreCourse()"></label><br>
    Core course selected:<img src="../../images/arrowDown.png" id="arrow" onclick="changeVisible('arrow','coreCourseList')" name="0" height="15" width="15">
    <ul id="coreCourseList" style="display: block">
    </ul><br>
    <input id="coreCourse" name="coreCourse" value="" type="hidden">
    <label>Add Elective List<input id="1" type="text" name="elective1"></label><img src="../../images/add.jpg" onclick="addList()" height="25" width="25"><br>
    <label>     Elective Course
        <input type="text" id="e1" onkeyup="getCourse(this.value,'list2')" list="list2"><input type="button" value="add" onclick="addElectiveCourse('electiveCourse1','e1')">
    </label>
        <datalist id="list2">
        </datalist><br>
    Elective course 1 selected:<img src="../../images/arrowDown.png" id="arrow2" onclick="changeVisible('arrow2','electiveCourse1')" name="0" height="15" width="15">
        <ul id="electiveCourse1" style="display: block">
        </ul><br>
   <br>
    <div id="otherElective"></div>
    <input type="submit" value="Submit">
</form>
</div>
<script>
    function addElectiveCourse(str,id){
        var ul=document.getElementById(str);
        //alert(document.getElementById(id).value);
        ul.innerHTML+="<li >"+document.getElementById(id).value+"</li>";
       // document.getElementById("coreCourse").value+=document.getElementById("core").value+" ";
    }
    function addList(){

    }
    function changeVisible(arrowid,list){
        var arrow=document.getElementById(arrowid);
        if(arrow.name==0){
            arrow.name=1;
            document.getElementById(list).style.display="none";
            arrow.src="../../images/arrow.png";
        }else{
            arrow.name=0;
            document.getElementById(list).style.display="block";
            arrow.src="../../images/arrowDown.png";
        }

    }
    function addCoreCourse(){
        var ul=document.getElementById("coreCourseList");
        ul.innerHTML+="<li >"+document.getElementById("core").value+"</li>";
        document.getElementById("coreCourse").value+=document.getElementById("core").value+" ";
    }
    function getCourse(str,list){
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
               // alert(1);
                var result=xmlhttp.responseText;
                //alert(result);
                if(result==null){
                    document.getElementById(list).innerHTML="";
                }else {
                    var array = result.split(" ");
                   // alert(array[0]);
                    result="";
                    document.getElementById(list).innerHTML="";
                    for(var z=0;z<array.length;z++){
                       // alert(z);
                        var select = document.getElementById(list);
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
</script>
<?php include_once "adminViewEnd.php"?>