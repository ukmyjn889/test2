<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/11/29
 * Time: 17:25
 */
include_once "../model/AutoPlan.php";

session_start();
$result=$_SESSION['semesters'];
$sid=$_SESSION['sid'];
$term=$_GET['term'];
$semesters=$_GET['semesters'];
$resultX=getKasiPlan($semesters,$sid);
//print_r($resultX);
$creditsList=$_SESSION['creditsList'];
//print_r($creditsList);

?>




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
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../../css/studentViewStyle.css" />
    <link rel="stylesheet" href="../../css/responsive.css" />
    <script src="../../scripts/js_func.js"></script>

    <script type="text/javascript">
        var arr=new Array(0);
        var TCL=new Array(0);
        var CCL=new Array(0);
        window.onload=function() {
            //alert('<?php echo $creditsList[0][7]?>');
            <?php  for($m=0;$m<count($creditsList);$m++){?>

            TCL.push('<?php echo $creditsList[$m]['listid']?>');
            TCL.push(<?php echo $creditsList[$m]['credits']?>);
            CCL.push('<?php echo $creditsList[$m]['listid']?>');
            CCL.push(0);
            <?php }?>
        };
        function viewCredits(){
            var string="";
            for(var m=0;m<TCL.length;m=m+2){
                string+=TCL[m]+":"+CCL[m+1]+"/"+TCL[m+1]+"\n";
            }
            alert(string);
        }
        function generate(){
            for(var m=1;m<TCL.length;m=m+2){
                if(CCL[m]<TCL[m]){
                    alert('Your selection is not satisfied with credits requirement');
                    return;
                }
            }
            var str="";
            for(var i=0;i<arr.length-4;i=i+4){
                str+=arr[i]+","+arr[i+1]+",";

            }
            if(arr.length>=1) {
                str += arr[arr.length - 4]+","+arr[arr.length - 3];
            }
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("faq").innerHTML=xhttp.responseText;
                    document.getElementById("faq").innerHTML+="<br><img src='../../images/Correct.png'>"
                    document.getElementById("viewCredit").type="hidden";
                }
            };
            xhttp.open("POST", "/capstone/student/model/AjaxPlan.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("cids="+str+"&&method=generate");
        }
        function inArray(str,array){
            for(var i=0;i<array.length;i++){
                if(str==array[i]){
                    return true;
                }
            }
            return false;
        }
        function previous(currentSemester){
            var li=document.getElementById(currentSemester);
            var dl=li.getElementsByTagName("dl")[0];
            var dt=dl.getElementsByTagName("dt")[0];
            var img=dt.getElementsByTagName("img")[0];
            img.src="../../images/arrow.png";
            var dd=dl.getElementsByTagName("dd")[0];
            dd.style.display='none';
            li=document.getElementById(parseInt(currentSemester)-1);
            dl=li.getElementsByTagName("dl")[0];
            dt=dl.getElementsByTagName("dt")[0];
            img=dt.getElementsByTagName("img")[0];
            img.src="../../images/arrowDown.png";
            dd=dl.getElementsByTagName("dd")[0];
            dd.style.display='block';
            var input=dd.getElementsByTagName("input");

                for(var j=0;j<input.length;j++){
                    var flag=false;
                    var td;
                    var STR="";
                    for(var i=0;i<arr.length;i=i+4){
                    if(input[j].value==arr[i]&&(input[j].id!=(arr[i]+""+arr[i+1]))){
                        STR=input[j].getAttribute("onclick");
                        input[j].setAttribute("onclick","return false");
                        input[j].setAttribute("data-toggle","tooltip");
                        input[j].setAttribute("data-placement","right");
                        input[j].setAttribute("data-original-title","selected");
                        input[j].setAttribute("storage",STR);
                        input[j].title="";
                        td=input[j].parentNode;
                        td.setAttribute("style","background:gray");
                        flag=true;
                        }
                    }
                    if(flag==false){
                        if(input[j].getAttribute("data-original-title")=="selected"){
                            td=input[j].parentNode;
//                            var tr=td.parentNode;
//                            var cid=tr.getElementsByTagName("td")[0].getElementsByTagName("a")[0].innerHTML;
                            STR=input[j].getAttribute("storage");

                            input[j].setAttribute("onclick",STR);
                            input[j].setAttribute("data-toggle","");
                            input[j].setAttribute("data-placement","");
                            input[j].setAttribute("data-original-title","");
                            input[j].title="";

                            td.setAttribute("style","");
                        }
                }
            }

            $('[data-toggle="tooltip"]').tooltip();
        }


        function leave(id){


        }
        function changeValue(id){
           var value=document.getElementById(id).getAttribute("data-original-title");
           // alert(value);
            $.ajax({
                url:"../model/getCourseDescription.php",
            data:{cid:value},
                type:"GET",
                async:false,
            success:function(data){
                document.getElementById(id).setAttribute("data-content",data);
            }

            });
        }
        function next(currentSemester){

            //  alert(arr);
            //  alert(parseInt(currentSemester)+1);
            var str="";
            for(var i=0;i<arr.length-4;i=i+4){
                str+=arr[i]+",";

            }
            if(arr.length>=4) {
                str += arr[arr.length - 4];
            }
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    //document.getElementById("xxx").innerHTML="<table><tr></tr></table>";
                    var li=document.getElementById(currentSemester);
                    var dl=li.getElementsByTagName("dl")[0];
                    var dt=dl.getElementsByTagName("dt")[0];
                    var img=dt.getElementsByTagName("img")[0];
                    img.src="../../images/arrow.png";
                    var dd=dl.getElementsByTagName("dd")[0];
                    dd.style.display='none';
                    //alert(1);
                    var result=xhttp.responseText;
                    //alert(result);
                    result=eval(result);
                   // alert(result);
                    li=document.getElementById(parseInt(currentSemester)+1);
                    //alert(parseInt(currentSemester)+1);
                    dl=li.getElementsByTagName("dl")[0];
                    dt=dl.getElementsByTagName("dt")[0];
                    //alert(dt.innerHTML);
                    dd=dl.getElementsByTagName("dd")[0];
                   // alert(dd.innerHTML);
                    var string="<table class='table' style='width: 700px;table-layout: fixed'>";
                   // dd.innerHTML="<table><tr>";
                    for(var k=0;k<arr.length;k=k+4){
                        // alert(arr[k+1]+" ");
                      //  dd.innerHTML+="<table><tbody><tr></tr></tbody></table>";
                      // string+="<td>xxx</td>";
                        if(parseInt(arr[k+1])==(parseInt(currentSemester) + 1)){
                            string+="<tr>";
                            string+="<td style='width: 620px'><a href='#' data-toggle='popover' id=\"" + ((parseInt(currentSemester) + 1)+arr[k]) + "\" title='"
                            +arr[k] + "'data-html='true' data-content=''data-placement='top' data-trigger='focus' onclick='return false' onmouseover='changeValue(this.id)' onmouseout='leave(this.id)'>"
                            +arr[k] + "</a></td>";
                            string+="<td style='width: 40px'>"+arr[k+3]+"</td>";
                            string+="<td style='width: 40px'><input type=\"checkbox\"  value=\"" + arr[k] + "\" onclick=\"checkVaild(this.value," + (parseInt(currentSemester) + 1) + ",'"
                            + arr[k+2] + "'," + arr[k+3] + ")\" id=\"" + (arr[k] + (parseInt(currentSemester) + 1)) + "\" checked></td></tr>";

                        }
                    }

                    for(var i = 4,length = result.length;i<length;i++){

                        //alert(length);
                        string+="<tr>";
                        string+="<td style='width: 620px' ><a href='#' data-toggle='popover' id=\"" + ((parseInt(currentSemester) + 1)+result[i]["cid"]) + "\" title='"
                        +result[i]["cid"] + "'data-html='true' data-placement='top' data-trigger='focus' data-content='' onclick='return false' onmouseover='changeValue(this.id)' onmouseout='leave(this.id)'>"
                        +result[i]["cid"] + "</a></td>";
                        string+="<td  style='width: 40px'>"+result[i]["credits"]+"</td>";
                        //alert(result[i]["cid"]);
                        var tempStrArray=result[i]["offerTime"].split(" ");
                        var offerTimeFlag=false;
                        //alert(i);
                        if((parseInt(currentSemester)+1)%2==0){
                            if(inArray("spring",tempStrArray)){
                                offerTimeFlag=true;
                            }
                        }else{
                            if(inArray("fall",tempStrArray)){
                                offerTimeFlag=true;
                            }
                        }
                        //alert(i);
                        if(offerTimeFlag) {
                            if (result[i]["available"] == "true") {
                                //  if(hasSelected(result[i]["cid"],parseInt(currentSemester)+1)){
                                string+="<td style='width: 40px'><input type=\"checkbox\"  value=\"" + result[i]["cid"] + "\" onclick=\"checkVaild(this.value," + (parseInt(currentSemester) + 1) + ",'"
                                + result[i]['listid'] + "'," + result[i]['credits'] + ")\" id=\"" + (result[i]["cid"] + (parseInt(currentSemester) + 1)) + "\"></td>";

                            } else {
                                string+="<td  style='background: gray;width: 40px'><input type='checkbox' data-toggle='tooltip' onclick='return false' data-placement='right' title=\"" + result[i]["available"] + "\"></td>";
               //                 dd.innerHTML += "<input type='checkbox' data-toggle='tooltip' onclick='return false' data-placement='right' title=\"" + result[i]["available"] + "\"></p>";
                            }
                        }else{
                            string+="<td  style='background: gray;width:40px'><input type='checkbox' data-toggle='tooltip' onclick='return false' data-placement='right' title=\"not offered this semester\"></td>";
                  //          dd.innerHTML += "<input type='checkbox' data-toggle='tooltip' onclick='return false' data-placement='right' title=\"not offered this semester\"></p>";
                        }

                        string+="</tr>";
                       // alert(length);
                       // alert(i);
                    }
                    //alert(string);
                  //  string+="</table>";
                  //  dd.innerHTML=string;
                    // dd.innerHTML+="</tbody></table>";
                    string+="<tr><td align='left'><input type='button' value='<<Previous' onclick='previous("+(parseInt(currentSemester)+1)+")'></td><td></td>";
                 //   dd.innerHTML+="<input type='button' value='Previous' onclick='previous("+(parseInt(currentSemester)+1)+")'>";
                    if((parseInt(currentSemester)+1)==(<?php echo $term+$semesters-1;?>)){
                        string+="<td align='right'><input type='button' value='Generate!!' onclick='generate()'></td>";
                       // dd.innerHTML+="<input type='button' value='Generate' onclick='generate()'>";
                    }else{
                        string+="<td align='right'><input type='button' value='Next>>' onclick=\"next('"+(parseInt(currentSemester)+1)+"')\"></td>";
                  //      dd.innerHTML+="<input type='button' value='Next' onclick=\"next('"+(parseInt(currentSemester)+1)+"')\">";
                    }
                    string+="</tr></table>";
                    dd.innerHTML=string;
                    li=document.getElementById(parseInt(currentSemester)+1);
                    dl=li.getElementsByTagName("dl")[0];
                    dt=dl.getElementsByTagName("dt")[0];
                   // alert(dt.innerHTML);
                    img=dt.getElementsByTagName("img")[0];
                    img.src="../../images/arrowDown.png";
                    dd=dl.getElementsByTagName("dd")[0];
                    dd.style.display='block';
                    $(document).ready(function() {
                        $('[data-toggle="tooltip"]').tooltip();
                      //  $.when(changeValue()).done(function(){
                            $('[data-toggle="popover"]').popover();
//                        });
//                        $(document).ajaxStop(function () {
//                            $('[data-toggle="popover"]').popover();
//                        });

                    });
                    //  $('[data-toggle="popover"]').popover();

                }

            }
            xhttp.open("POST", "/capstone/student/model/AjaxPlan.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("cids="+str+"&&currentSemester="+(currentSemester-<?php echo $term?>+1)+"&&method=2");

        }
        function checkVaild(value,currentSemester,listID,credits){
            if(document.getElementById(value+""+currentSemester).checked){
                arr.push(value);
                arr.push(currentSemester);
                arr.push(listID);
                arr.push(credits);
//                document.getElementById((value+""+(currentSemester-1))).disabled=true;
//                document.getElementById((value+""+(currentSemester-1))).title="selected";
             //    alert(arr);
                for(var n=0;n<CCL.length;n=n+2){
                    if(listID==CCL[n]){
                        CCL[n+1]+=credits;
                        //alert(CCL[n]+CCL[n+1]);
                    }
                }
            }else{
                //remove value
                var temp=new Array(0);
                for(var x=0;x<arr.length;x=x+4){
                    if(arr[x]!=value){
                        temp.push(arr[x]);
                        temp.push(arr[x+1]);
                        temp.push(arr[x+2]);
                        temp.push(arr[x+3]);
                    }
                }

                var str="";
                for(var i=0;i<temp.length-4;i=i+4){
                    str+=temp[i]+",";
                }
                if(temp.length>=4) {
                    str += temp[temp.length - 4];
                }
                //alert(str);
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        if(xhttp.responseText=="true"){
                            arr=temp;
//                            document.getElementById((value+""+(currentSemester-1))).disabled=false;
//                            document.getElementById((value+""+(currentSemester-1))).title="";
                            for(var n=0;n<CCL.length;n=n+2){
                                if(listID==CCL[n]){
                                    CCL[n+1]-=credits;
                                    //alert(CCL[n],CCL[n+1]);
                                }
                            }
                        }else{
                            alert("can not cancel this course because "+xhttp.responseText+" requires this course");
                            document.getElementById(value+""+currentSemester).checked=true;
                        }
                        //alert(xhttp.responseText);
                    }
                }
                xhttp.open("POST", "/capstone/student/model/AjaxPlan.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("cids="+str+"&&method=1");
            }
        }
    </script>
<!--    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
</head>
<body>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="popover"]').popover();
    });
</script>
<div class="wraper">
    <header class="header">
        <a class="logo" href="../../Login.html">Planner module</a>
        <nav>
            <!-- top menu -->
            <ul>
                <li><a >View student profile</a>
                    <ul>
                        <li><a href="displayStudentProfile.php">User information</a></li>
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
                    ">Search courses</a>
                    <ul>
                        <!--                        <li><a href="about.html">Search course fuzzy</a></li>-->
                        <!--                        <li><a href="team.html">Search courses by conditions</a></li>-->


                    </ul>
                </li>
                <li><a >My class Schedular</a>
                    <ul>
                        <li><a href="displayTimeTable.php">Show current course time table</a>

                        </li>
                        <!--                        <li><a href="long_text.html">Class planner</a>-->
                        <!---->
                        <!--                        </li>-->
                        <!--                        <li><a href="filtered.html">Other</a>-->

                </li>

            </ul>
            </li>
            <li><a href="#">Planner</a>
                <ul>
                    <li><a href="selectTermToSetPlanner.php">Set my planner</a></li>
                    <li><a href="selectTermToViewOwnPlanner.php">View my planner</a></li>
                    <li><a href="displaySelectSemesters.php">Auto Generate planner</li>
                    <!--                        <li><a href="blog_large_sidebar.html">Planner</a></li>-->
                    <!--                        <li><a href="blog_medium_sidebar.html">Planner</a></li>-->
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

    <div class="wraper">

        <div class="left_nav" style="border-left:solid 1px gray;border-right:solid 1px gray; height: auto;min-height: 550px" >
            <ul><li><dl><dd id="xxx"></dd></dl></li></ul>

<?php if($resultX=="error"){
   // echo $term;
   // echo $semesters;
    echo "<div align='center' style='position: relative;top:100px;font-weight: bolder'>";
    echo "You cant finish these courses within ".$semesters." semesters<br>";
    echo "<img src='../../images/wrong.png'>";
    echo "<br><a href=\"javascript:history.go(-1)\">Back</a>";
    echo "</div>";
}else{?>
<div align="right">
    <input type="button" id="viewCredit" value="View credits requirement List" onclick="viewCredits()">
</div>
<?php
$result=$_SESSION['semesters'];

//echo "<table border='1'>";
echo "<div style='position: relative;left: 10%'>";
echo "<ul id=\"faq\">";
for($i=0;$i<$semesters;$i++){
    ?>
    <li id="<?php echo $term + $i;?>">
        <dl>
            <dt><?php
                $t = (int)(($term + $i) / 2);
                if (($term + $i) % 2 == 0) {
                    echo "20" . $t . " SPRING";
                } else {
                    echo "20" . $t . " FALL";
                }
                if($i==0){
                    echo "<img src='../../images/arrowDown.png' height='15px' width='15px'>";
                }else{
                    echo "<img src='../../images/arrow.png' height='15px' width='15px'>";
                }


                ?></dt>
            <?php if($i == 0){?>
                <dd style="display:block">
                <?php
                echo "<table class='table' style='width:700px;table-layout: fixed'>";
                //echo "111";
                for($j = 0;$j < count($result[$i]);$j++) {

                    echo "<tr>";
                    echo "<td>";
                    ?>
                    <!--                    echo $result[$i][$j]['cid'];-->
                    <a href='#' data-toggle='popover' id="<?php echo "0" . $result[$i][$j]['cid']?>"
                       title="<?php echo $result[$i][$j]['cid']?>"
                       data-html='true' data-content='' data-placement='top' data-trigger='focus'
                       onclick='return false' onmouseover='changeValue(this.id)'
                       onmouseout='leave(this.id)'><?php echo $result[$i][$j]['cid']?></a>
                    <?php
                    echo "</td>";
                    echo "<td width=40>";
                    echo "&nbsp&nbsp&nbsp&nbsp";
                    echo $result[$i][$j]['credits'];
                    echo "&nbsp&nbsp&nbsp&nbsp";
                    echo "</td>";
                    $offerTimeFlag = false;
                    $tempStrArray = explode(" ", $result[$i][$j]['offerTime']);

                    if ($term % 2 == 0) {
                        if (in_array("spring", $tempStrArray)) {
                            $offerTimeFlag = true;
                        }
                    } else {
                        if (in_array("spring", $tempStrArray)) {
                            $offerTimeFlag = true;
                        }
                    }
                    if($offerTimeFlag) {
                        if ($result[$i][$j]['available'] == "true") {
                            echo "<td width='40'>";
                            ?>
                            <input type="checkbox"
                                   onclick="checkVaild(this.value,<?php echo $term . ",'" . $result[$i][$j]['listid'] . "'," . $result[$i][$j]['credits']; ?>)"
                                   value="<?php echo $result[$i][$j]['cid'] ?>"
                                   id="<?php echo $result[$i][$j]['cid'] . $term; ?>">
                        <?php
                        } else {
                            echo "<td width='40' style='background: gray'>";
                            echo "<input type='checkbox' data-toggle='tooltip'  onclick='return false' data-placement='right' title=\"$result[$i][$j]['available']\">";
                        }

                    }else {
                        echo "<td width='40' style='background: gray'>";
                        echo "<input type='checkbox' data-toggle='tooltip' onclick='return false' data-placement='right' title=\"not offered this semester\">";
                    }
                    //   }
                }
                echo "</td></tr><tr><td></td><td></td>";
                echo "<td align='right'>";
                ?>


                <input type="button" value="Next>>" onclick="next('<?php echo $term;?>')">
                <?php  echo "</td>";
                echo "</tr>";
                echo "</table> </dd>"; }else{

                ?>


                <dd style="display:none">
                    <!--              <table class='table'><tr>-->
                    <!--                      <td>324435454</td>-->
                    <!--                  </tr></table>-->
                </dd>
            <?php }?>


        </dl>
    </li>
<?php
}
echo "</ul></div>";
}
//echo "<input type='checkbox' data-toggle='tooltip'  onclick='return false' title=\"hover over me\">hover over me";
?>
<!--            <input type="checkbox" onclick="next(31)" data-toggle="tooltip" title="Hooray!">Hover over me-->
 </div>
</div>
</div>
</body>
</html>

