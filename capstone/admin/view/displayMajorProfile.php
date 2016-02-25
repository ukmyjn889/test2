<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/11/3
 * Time: 19:59
 */
include_once "../model/getMajorProfile.php";
include_once "adminView.php";
include_once "../model/getMajor.php";
$major=$_GET['major'];
$result=getMajorProfileByMajor($major);
$flag=false;
if($result[count($result)-1][0]['options']>1){
    $flag=true;
}
//print_r($result[count($result)-1][0]['options']);
//print_r($result[1]);
$map=array();
$option=0;
?>
<table class="table table-striped "  style='border-collapse: collapse' rules='rows' width="450">
<?php
$count1=1;
for($x=0;$x<count($result);$x++){
    $temp=$result[$x];
    if($x==0){
        echo "<h3 class='text-success'>Core Course</h3>";
        for($y=1;$y<count($temp);$y++){
            $list=$temp[$y];
            echo "<tr>";
//            echo $list['cid'];
//            echo "           ";
//            echo $list['credits'];
//            echo "<br>";
            echo "<td align='left' height='20px'>";
           // echo $list['cid'];
            ?>
            <a href='#' data-toggle='popover' id="<?php echo  $list['cid']?>"
               title="<?php echo $list['cid']?>"
               data-html='true' data-content='' data-placement='top' data-trigger='focus'
               onclick='return false' onmouseover='changeValue(this.id)'
               onmouseout='leave(this.id)'><?php echo $list['cid']?></a>
            <?php
            echo "</td><td align='right' height='20px' >";
            echo"<h3 class='text-success'>";
            echo $list['credits'];
            echo"</h3 >";
            echo "</td>";
            echo "</tr>";
        }
    }else{

        $head=$temp[0];
       // echo $head['listname']."xxx";
        if($flag==true){
            if($head['options']>$option){
                $option++;
                echo "<tr><td  height='20px' style='font-size: medium'>Option".$option.":</td><td></td></tr>";
            }
        }
        if($head['listname']==null) {
            if ($head['component'] == "select") {
//                echo "select " . $head['subject'] . " course from the following:            ".$head['credits']."<br>";
                echo "<tr>";
                echo "<td align='left' height='20px'>";
                echo "select " . $head['subject'] . " course from the following: ";
                echo "</td>";
                echo "<td align='right' height='20px'>";
                echo $head['credits'];
                echo "</td></tr>";
            } else if ($head['component'] == "credit") {
//                echo "select " . $head['subject'] . " credits from the following:            ".$head['credits']."<br>";
                echo "<tr>";
                echo "<td align='left' height='20px'>";
                echo "select " . $head['subject'] . " credits from the following: ";
                echo "</td>";
                echo "<td align='right' height='20px'>";
                echo $head['credits'];
                echo "</td></tr>";
            }
            for($y=1;$y<count($temp);$y++){
                $list=$temp[$y];
//                echo $list['cid'];
//                echo "           ";
//                echo $list['credits'];
//                echo "<br>";
                echo "<tr>";
                echo "<td align='left' height='20px'>";
                ?>
                <a href='#' data-toggle='popover' id="<?php echo  $list['cid']?>"
                   title="<?php echo $list['cid']?>"
                   data-html='true' data-content='' data-placement='top' data-trigger='focus'
                   onclick='return false' onmouseover='changeValue(this.id)'
                   onmouseout='leave(this.id)'><?php echo $list['cid']?></a>
    <?php
                echo "</td><td align='right' height='20px'>";
                echo"<h3 class='text-success'>";
                echo $list['credits'];
                echo"</h3>";
                echo "</td>";
                echo "</tr>";
            }
        }else{

            $string="";
            if(count($temp)>1){
                $string="(see below)";
                if(!array_key_exists($head['listname'],$map)){
                    $map[$head['listname']]=$temp;
                }
            }
            if ($head['component'] == "select") {
                echo "<tr>";
                echo "<td align='left' height='20px'>";
                echo "select " . $head['subject'] . " course from Elective List".$count1.$string;
                $count1++;
                echo "</td>";
                echo "<td align='right' height='20px'>";
                echo"<h3 class='text-success'>";
                echo $head['credits'];
                echo"</h3>";
                echo "</td></tr>";
              //  echo "select " . $head['subject'] . " course from ".$head['listname'].$string."            ".$head['credits']."<br>";
            } else if ($head['component'] == "credit") {
                echo "<tr>";
                echo "<td align='left' height='20px'>";
                echo "select " . $head['subject'] . " course from Elective List".$count1.$string;
                $count1++;
                echo "</td>";
                echo "<td align='right' height='20px'>";
                echo"<h3 class='text-success'>";
                echo $head['credits'];
                echo"</h3>";
                echo "</td></tr>";
                //echo "select " . $head['subject'] . " credits from  ".$head['listname'].$string."            ".$head['credits']."<br>";
            }
        }


    }
}
?>
    <tr>
        <td height="20px" ><h3 class='text-success'>Total Credits</h3></td><td align="right">
        <?php
        echo getMajorCreditByMajorName($major);
        ?>
        </td>
    </tr>
</table>
<?php
$keys=array_keys($map);
for($x=0;$x<count($keys);$x++){
    echo "<table class='table table-striped ' style='border-collapse: collapse' rules='rows' width='450'>";
  //  echo "<tr>";
   // echo "<td>";
    echo "<br>";
    echo "<li style='font-size: medium; list-style-type: none'>";
    echo "Elective list".($x+1);
    echo "</li>";
  //  echo "</td>";
 //   echo "</tr>";
for($y=1;$y<count($map[$keys[$x]]);$y++){
    $list=$map[$keys[$x]][$y];
    echo "<tr>";
    echo "<td align='left' height='20px'>";
    ?>
    <a href='#' data-toggle='popover' id="<?php echo  $list['cid']?>"
       title="<?php echo $list['cid']?>"
       data-html='true' data-content='' data-placement='top' data-trigger='focus'
       onclick='return false' onmouseover='changeValue(this.id)'
       onmouseout='leave(this.id)'><?php echo $list['cid']?></a>
    <?php
    echo "</td><td align='right' height='20px'>";
    echo"<h3 class='text-success'>";
    echo $list['credits'];
    echo"</h3 >";
    echo "</td>";
    echo "</tr>";
//    echo $list['cid'];
//    echo "           ";
//    echo $list['credits'];
//    echo "<br>";
}
    echo "</table>";
}
?>
<script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
        $('[data-toggle="tooltip"]').tooltip();
    });
    function changeValue(id){
       // alert(id);
       // var value=document.getElementById(id).getAttribute("data-original-title");
      //  var value=document.getElementById(id).onclick;
        //alert(value);
        $.ajax({
            url:"../../student/model/getCourseDescription.php",
            data:{cid:id},
            type:"GET",
            async:false,
            success:function(data){
               // alert(data);
                document.getElementById(id).setAttribute("data-content",data);
            }

        });
    }
</script>
<?php
include_once "adminViewEnd.php";
?>