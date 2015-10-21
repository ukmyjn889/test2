<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 10/9/2015
 * Time: 11:40 PM
 */
include_once "studentView.php";
include_once "../model/getCourse.php";
include_once "../model/getOffering.php";
$cid=$_GET['cid'];
$result=getCourseById($cid);
$row=mysql_fetch_array($result);
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo $row['cid'];
$lab=$row['lab'];
//will do it later;
$sid="1";
echo "<br/>";
$result=getOfferingByCid($cid);
?>
<form action="displaySelectResult.php" method="post">

<table border="1">
    <tr height="45">
        <th>class Number</th>
        <th>Instructor Name</th>
        <th>class Time</th>

        <th>classroom</th>

        <th></th>
    </tr>

    <?php
    while($row=mysql_fetch_array($result)){
        echo "<tr height='30'>";
//        echo "<td>";
//        echo $row['oid'];
//        echo "</td>";
        echo "<td>";
        echo $row['classNum'];
        echo "</td>";
        echo "<td>";
        echo $row['InstNameF']." ".$row['InstNameL'];
        echo "</td>";
        echo "<td>";
        echo $row['TimeStart']."-".$row['TimeEnd']."(".transWeekIntoString($row).")";
        echo "</td>";
//        echo "<td>";
//        echo transWeekIntoString($row);
//        echo "</td>";
        echo "<td>";
        echo $row['ClassLocation'];
        echo "</td>";
        echo "<td>";
        echo "<input type='radio' name='lec' value='".$row["oid"]."'>";
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>
    <br>
    <br>
    <br>
    <?php
    if($lab!="no"){
        echo $lab;
        echo "<br/>";
        $result=getOfferingByCid($lab);


    ?>

<table border="1">
    <tr height="45">
        <th>class Number</th>
        <th>Instructor Name</th>
        <th>class Time</th>

        <th>classroom</th>

        <th></th>
    </tr>
    <?php
    while($row=mysql_fetch_array($result)){
        echo "<tr height='30'>";
//        echo "<td>";
//        echo $row['oid'];
//        echo "</td>";
        echo "<td>";
        echo $row['classNum'];
        echo "</td>";
        echo "<td>";
        echo $row['InstNameF']." ".$row['InstNameL'];
        echo "</td>";
        echo "<td>";
        echo $row['TimeStart']."-".$row['TimeEnd']."(".transWeekIntoString($row).")";
        echo "</td>";
//        echo "<td>";
//        echo transWeekIntoString($row);
//        echo "</td>";
        echo "<td>";
        echo $row['ClassLocation'];
        echo "</td>";
        echo "<td>";
        echo "<input type='radio' name='lab' value='".$row["oid"]."'>";
        echo "</td>";
        echo "</tr>";
    }
    }
    ?>
    <input type="hidden" name="cid" value="<?php echo $cid?>">

</table>
    <input type="submit" value="select">
</form>
<?php
include_once "studentViewEnd.php";
?>
