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
<table border='1' style='border-collapse: collapse' rules='rows' width="450">
<?php
for($x=0;$x<count($result);$x++){
    $temp=$result[$x];
    if($x==0){
        echo "<li style='font-size: medium; list-style-type: none'>Core Course</li>";
        for($y=1;$y<count($temp);$y++){
            $list=$temp[$y];
            echo "<tr>";
//            echo $list['cid'];
//            echo "           ";
//            echo $list['credits'];
//            echo "<br>";
            echo "<td align='left' height='20px'>";
            echo $list['cid'];
            echo "</td><td align='right' height='20px' >";
            echo $list['credits'];
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
                echo $list['cid'];
                echo "</td><td align='right' height='20px'>";
                echo $list['credits'];
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
                echo "select " . $head['subject'] . " course from ".$head['listname'].$string;
                echo "</td>";
                echo "<td align='right' height='20px'>";
                echo $head['credits'];
                echo "</td></tr>";
              //  echo "select " . $head['subject'] . " course from ".$head['listname'].$string."            ".$head['credits']."<br>";
            } else if ($head['component'] == "credit") {
                echo "<tr>";
                echo "<td align='left' height='20px'>";
                echo "select " . $head['subject'] . " course from ".$head['listname'].$string;
                echo "</td>";
                echo "<td align='right' height='20px'>";
                echo $head['credits'];
                echo "</td></tr>";
                //echo "select " . $head['subject'] . " credits from  ".$head['listname'].$string."            ".$head['credits']."<br>";
            }
        }


    }
}
?>
    <tr>
        <td height="20px" style="font-size: small; font-weight: bold">Total Credits</td><td align="right">
        <?php
        echo getMajorCreditByMajorName($major);
        ?>
        </td>
    </tr>
</table>
<?php
$keys=array_keys($map);
for($x=0;$x<count($keys);$x++){
    echo "<table border='1' style='border-collapse: collapse' rules='rows' width='450'>";
  //  echo "<tr>";
   // echo "<td>";
    echo "<br>";
    echo "<li style='font-size: medium; list-style-type: none'>";
    echo $keys[$x];
    echo "</li>";
  //  echo "</td>";
 //   echo "</tr>";
for($y=1;$y<count($map[$keys[$x]]);$y++){
    $list=$map[$keys[$x]][$y];
    echo "<tr>";
    echo "<td align='left' height='20px'>";
    echo $list['cid'];
    echo "</td><td align='right' height='20px'>";
    echo $list['credits'];
    echo "</td>";
    echo "</tr>";
//    echo $list['cid'];
//    echo "           ";
//    echo $list['credits'];
//    echo "<br>";
}
    echo "</table>";
}
include_once "adminViewEnd.php";
?>