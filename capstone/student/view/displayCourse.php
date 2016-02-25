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
<table class="table table-striped" width="800"  align="center" cellspacing="4"  cellpadding="4" >
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
</div>
<div align="center">
<ul class="pagination">
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
<script>
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
<?php
include_once "studentViewEnd.php";
//?>
