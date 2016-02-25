<?php
include_once "adminView.php";
include_once "../model/deleteCourse.php";
$delete=$_GET['delete'];
if($delete!=null){
    deleteByCid($delete);
}
?>

<!--                <table border="0" cellspacing="0" cellpadding="0" width="523">-->
<!--                    <tr>-->
<!--                        <td width="523" class="pageName">please add a course</td>-->
<!--                    </tr>-->
<!--                    -->
<!--                </table>-->
                <?php

                /**
                 * Created by PhpStorm.
                 * User: Liu
                 * Date: 9/16/2015
                 * Time: 10:09 PM
                 */
                echo "<div align='center'>
        <table class='table table-striped'  width='800' style='height: 400px;align-content: center;align-items: center;'>
         <tbody align='middle' >
            <td><h3 class='text-success'>Id</h3></td>
            <td><h3 class='text-success'>Title</h3></td>
            <td><h3 class='text-success'>Prerequisites</h3></td>
            <td><h3 class='text-success'>Credits</h3></td>
            <td><h3 class='text-success'>Lab</h3></td>
            <td><b>    </b></td>
        <br>";

                $pageNow=$_GET["pageNow"];
                //echo $pageNow;
                if(!is_numeric($pageNow)){
                    $pageNow=1;
                }
                $pageSize=6;
                $pageCount=($pageNow-1)*$pageSize;
                $con=mysql_connect("localhost:3306","root","5656123ljx");
                if(!$con){
                    die('Could not connect: ' . mysql_error());
                }
                mysql_select_db("capstone",$con);
                $result=mysql_query("select * from Course limit ".$pageCount.",".$pageSize);
                while($row = mysql_fetch_array($result))
                {
                    echo "<tr><td>";
                    echo"<h4>";
                    echo $row['cid']." ";
                    echo"</h4>";
                    echo "</td>";
                    echo "<td>";
                    echo"<h4>";
                    echo $row['title']." ";
                    echo"</h4>";
                    echo "</td>";
                    echo "<td>";
                    echo"<h4>";
                    echo $row['prerequisites']." ";
                    echo"</h4>";
                    echo "</td>";
                    echo "<td>";
                    echo"<h4>";
                    echo $row['credits'] ." ";
                    echo"</h4>";
                    echo "</td>";
                    echo "<td>";
                    echo"<h4>";
                    echo $row['lab']." ";
                    echo"</h4>";
                    echo "</td>";

                    echo "<td>";
                    ?>
                   <label><input type="radio" name="x" onclick="setCidAndCourseTitle('<?php echo $row['cid'];?>','<?php echo $row['title'] ?>',<?php echo $pageNow;?>)"></label>

                    <?php echo "</td></tr>";
                   //  echo "<td>";
                    ?>

<!--                    --><?php //echo "</td>";
//                    echo "<td>";
//                    ?>
<!--                    -->
<!--                    --><?php //echo "</td></tr>";

                }


                ?>


</tbody>
</table>
<div id="div" style="display: none">
<br><input type="hidden"  id="cid">
<input type="hidden"  id="courseTitle">
<input type="hidden" id="pageNow">
<input type="button" class="btn btn-success" value="Add Offering" onclick="location='addOffering.php?cid='+document.getElementById('cid').value+'&courseTitle='+document.getElementById('courseTitle').value">
<input type="button" class="btn btn-info" value="View Offering" onclick="location='showOfferingBrief.php?cid='+document.getElementById('cid').value+'&courseTitle='+document.getElementById('courseTitle').value">
<input type="button" class="btn btn-warning" value="Delete" onclick="del()"><br>
</div>
<div align="center">
    <ul class="pagination">
    <?php
        $result=mysql_query("select count(*) from Course");
        $row=mysql_fetch_array($result);
    if($row[0]<$pageSize) {
        $pageTotal=1;
    }else{

            $pageTotal = ceil($row[0] / $pageSize) ;

    }

    if($pageNow!=1) {
        echo "<li><a href='showCourse.php?pageNow=" . ($pageNow-1) . "' style='font-size:200%'>&laquo;</a></li>&nbsp";
    }
    for($x=1;$x<=$pageTotal;$x++){
        if($x==$pageNow){
            echo "<li class='active'><a href='showCourse.php?pageNow=" . $x . "' style='font-size:200%'>" . $x . "</a></li> &nbsp";
        }else {
            echo "<li><a href='showCourse.php?pageNow=" . $x . "' style='font-size:200%'>" . $x . "</a></li> &nbsp";
        }
    }
    if($pageNow<$pageTotal) {
        echo "<li><a href='showCourse.php?pageNow=" . ($pageNow+1) . "' style='font-size:200%'>&raquo;</a></li>";
    }

    ?>
        </ul>
    </div>
<!--    <a href="addCourse.php">back</a>-->

<script>

    function setCidAndCourseTitle(cid,courseTitle,pageNow){
        document.getElementById("cid").value=cid;
        document.getElementById("courseTitle").value=courseTitle;
        document.getElementById("pageNow").value=pageNow;
        showDiv();
    }
    function del(){
        if(confirm("Confirm to delete this course?")){
            window.location="showCourse.php?delete="+document.getElementById("cid").value+"&pageNow="+document.getElementById("pageNow").value;
        }else{
            window.event.returnValue=false;
        }
    }
    function showDiv(){
        document.getElementById("div").style.display="block";
    }
</script>

</body>
</html>
