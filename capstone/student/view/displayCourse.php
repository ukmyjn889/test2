<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 10/9/2015
 * Time: 9:55 PM
 */
include_once "studentView.php";
require "../model/getCourse.php";
$major=$_GET['major'];
$tPageNow=$_GET['pageNow'];
$pageNow=1;
if($major!=null){

    $pageNow=getCurrentStudentMajorPageNow($major);
    //echo ($pageNow-1)*8;
}else if($tPageNow!=null){
    $pageNow=$tPageNow;
}
$result=getAllLecCourse($pageNow);
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




<div align="center" style="height:480px">
    <div id="searcharea">
        <div id="panel">
            <select id="majorName" class="form-control" name="majorName" style="width: 400px">
            </select>
            <script>
                //  $("#majorName").multiple=false;
                $.ajax({
                    url: "../service/getMajorAndMajorName.php?message=getMajors", success: function (message) {
                        //  alert(message);
                        message = eval(message);
                        // alert(result[0]);
                        var length=message.length;
                        var majorList=document.getElementById("majorName");
                        majorList.innerHTML="";
                        //alert(message.length);
                        // alert(result);
                        // alert(message.length);

                        // alert(length);
                        for(var x=0;x<length;x++){
                            // alert(x);
                            majorList.innerHTML+="<option value="+message[x].majorName+">"+message[x].majorFullName+"</option>";
                        }
                        //alert(majorList.innerHTML);
                    }
                });
            </script>
            <form class="form-inline" role="form">

                <p style="margin: 0px;color: #fff;line-height:20px;">　　  <P> <label><select class="form-control" name="searchWay" id="searchWay" class="form-inline">
                            <option value="equals">is exactly to</option>
                            <option value="contains">contains</option>
                            <option value="great">great than or equals to</option>
                            <option value="less">less than or equals to</option></p>
                <p>  </select><input type="text" class="form-control" name="searchValue" id="searchValue" class="form-inline">
                    <input type="button" class="form-inline  btn btn-success" value="Search" onclick="search()">
                    <input type="button" class="form-inline  btn btn-default" value="Show all Course" onclick="location='displayCourse.php'"></label></p>

                </p>
            </form>
        </div>

        <p class="slide"><a href="#" class="btn-slide">Show Search bar</a></p>

    </div>









    <table class="table table-striped" width="800"  align="center" cellspacing="4"  cellpadding="4" id="courseTable">
        <tr>
            <td height="50" align="left">
                <h3 class="text-primary"> Course ID </h3>
            </td>
            <td height="50" align="left">
                <h3 class="text-primary"> Course Title </h3>
            </td>
            <td height="50" align="center">
                <h3 class="text-primary"> Course Offering  </h3>
            </td>
        </tr>
        <?php
        while ($row=mysql_fetch_array($result)){
            $cid=$row['cid'];
            echo "<tr>";
            echo "<td height='30' width='250' align='left'>";
            ?>
            <a href='#' data-toggle='popover' id="<?php echo  $cid?>"
               title="<?php echo $cid?>"
               data-html='true' data-content='' data-placement='top' data-trigger='focus'
               onclick='return false' onmouseover='changeValue(this.id)'
               onmouseout='leave(this.id)'><?php echo $cid?></a>
            <?php
            echo "</td>";
            echo "<td height='30' align='left'>";
            echo $row['title'];
            echo "</td>";
            echo "<td height='30' align='center'>";
            echo "<a href='displayCourseProfile.php?cid=".$cid."'>Select</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </table>

    <div align="center">
        <ul class="pagination" id="pageSplit">
            <?php
            $pageTotal=0;
            $pageSize=12;
            $result=mysql_query("select count(*) from Course where cid not like '%L%'");
            $row=mysql_fetch_array($result);
            if($row[0]<$pageSize) {
                $pageTotal=1;
            }else{
                $pageTotal = ceil($row[0] / $pageSize);
            }
            $max=ceil($pageTotal);
            $pageNow=ceil($pageNow);
            //echo $max;
            if($pageNow!=1) {
                echo "<li><a href='displayCourse.php?pageNow=" . ($pageNow-1) . "'>&laquo;</a></li>";
            }else{
                echo "<li class='disabled'><a href='#'>&laquo;</a></li>";
            }
            if($pageNow>4) {
                if($pageTotal>$pageNow+5){
                    $max=$pageNow+5;
                }
                for ($x = $pageNow - 4; $x <= $max; $x++) {
                    if($x==$pageNow){
                        echo "<li class='active'><a href='displayCourse.php?pageNow=" . $x . "'>" . $x . "</a> </li>";
                    }else {
                        echo "<li><a href='displayCourse.php?pageNow=" . $x . "'>" . $x . "</a> </li>";
                    }
                }
            }else{
                if($pageTotal>$pageNow+9){
                    $max=$pageNow+9;
                }
                for ($x = 1; $x <= $max; $x++) {
                    if($x==$pageNow){
                        echo "<li class='active'><a href='displayCourse.php?pageNow=" . $x . "'>" . $x . "</a> </li>";
                    }else {
                        echo "<li><a href='displayCourse.php?pageNow=" . $x . "'>" . $x . "</a></li>";
                    }
                }
            }

            if($pageNow!=$pageTotal) {
                echo "<li><a href='displayCourse.php?pageNow=" . ($pageNow+1) . "'>&raquo;</a></li>";
            }else{
                echo "<li class='disabled'><a href='#'>&raquo;</a></li>";
            }

            ?>
            <!--    <li><a href="#">&laquo;</a></li>-->
            <!--    <li><a href="#">1</a></li>-->
            <!--    <li><a href="#">2</a></li>-->
            <!--    <li><a href="#">3</a></li>-->
            <!--    <li><a href="#">4</a></li>-->
            <!--    <li><a href="#">5</a></li>-->
            <!--    <li><a href="#">&raquo;</a></li>-->
        </ul>
    </div>
</div>
<script>
    function search(){
        var searchWay=$("#searchWay").val();
        var searchValue=$("#searchValue").val();
        var searchMajor=$("#majorName").val();
        $.ajax({
            url:"../service/searchCourse.php",
            data:{searchWay:searchWay,searchValue:searchValue,searchMajor:searchMajor},
            type:"POST",
            async:true,
            success:function(data){
                data=eval(data);
                $("#courseTable").html("<tr> <td height='50' align='left'> <h3 class='text-primary'> Course ID </h3> </td> <td height='50' align='left'> " +
                "<h3 class='text-primary'> Course Title </h3> </td> <td height='50' align='center'> <h3 class='text-primary'> Course Offering  </h3> </td> </tr>");
                for(var i=0;i<data.length;i++){
                    //alert(data[i].cid);
                    document.getElementById("courseTable").innerHTML+="<tr><td height='30' width='250' align='left'><a href='#' data-toggle='popover' id='"+data[i].cid+
                    "' title='"+data[i].cid+"'  data-html='true' data-content='' data-placement='top' data-trigger='focus' onclick='return false' onmouseover='changeValue(this.id)' onmouseout='leave(this.id)'>"+
                    data[i].cid+"</a></td><td height='30' align='left'>"+data[i].title+"</td><td height='30' align='center'><a href='displayCourseProfile.php?cid="+data[i].cid+"'>Select</a></td></tr>";
                }
                $("#pageSplit").html("");
                //  alert(data);
                // document.getElementById(id).setAttribute("data-content",data);
            }

        });
    }
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
        $('[data-toggle="tooltip"]').tooltip();
    });
    function changeValue(id){
        // alert(id);
        // alert(id);
        // var value=document.getElementById(id).getAttribute("data-original-title");
        //  var value=document.getElementById(id).onclick;
        //alert(value);
        $.ajax({
            url:"../model/getCourseDescription.php",
            data:{cid:id},
            type:"GET",
            async:false,
            success:function(data){
                //  alert(data);
                document.getElementById(id).setAttribute("data-content",data);
            }

        });
    }
</script>
<script type="text/javascript">
    $(document).ready(function(){

        $(".btn-slide").click(function(){
            $("#panel").slideToggle("slow");
            $(this).toggleClass("active"); return false;
        });


    });
</script>

<style type="text/css">

    a:focus {
        outline: none;
    }
    #panel {

        height: 87px;
        display: none;
    }
    .slide {
        margin: 0;
        padding: 0;

        background:lightblue;;
    }
    .btn-slide {

        text-align: center;
        width: 168px;
        height: 25px;
        padding: 10px 10px 0 0;
        margin: 0 auto;
        display: block;
        font: bold 120%/100% Arial, Helvetica, sans-serif;
        color: #fff;
        text-decoration: none;
    }
    .active {
        background-position: right 12px;
    }
</style>
<?php
include_once "studentViewEnd.php";
//?>
