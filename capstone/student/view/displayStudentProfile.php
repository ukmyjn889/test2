<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 10/10/2015
 * Time: 1:40 AM
 */
include_once "studentView.php";
include_once "../model/getStudent.php";
include_once "../model/getStu_offering.php";
include_once "../model/getOffering.php";
session_start();
$sid=$_SESSION["sid"];
$result=getStudentById($sid);
$row=mysql_fetch_array($result);
?>
<div style="position:relative; left:100px">
    Student Information
<table border="0" title="student info" width="300" height="200" >
    <tr>
        <td>
            Student ID:
        </td>
        <td>
            <?php
            echo $row['sid'];
            ?>
        </td>
    </tr>
        <tr>
        <td>
            Name:
        </td>
        <td>
            <?php
            echo $row['nameF']." ";
            echo $row['nameL'];
            ?>
        </td>
    </tr>
    <tr>
        <td>
            Major:
        </td>
        <td>
            <?php
            echo $row['major'];
            ?>
        </td>
        </tr>
    <tr>
        <td>
            Enrollment year:
        </td>

        <td>
            <?php
            echo $row['grade'];
            ?>
        </td>
    </tr>

</table>

</div>
<div style="position:relative; left:100px">
    Course taken:
<table border="1" width="690" >
    <tr height="45">
        <th>Course</th>
        <th>Course Title</th>
        <th>Instructor Name</th>
        <th>Class Time</th>

        <th>Classroom</th>
        <th>Offering Taken time</th>
        <th>Mark</th>
     </tr>
<?php
$result=getStu_offeringBySid($sid);

while ($row=mysql_fetch_array($result)){
   // echo $row['oid'];
    $innerResult=getOfferingById($row['oid']);
  //  echo $innerResult;
    $innerRow=mysql_fetch_array($innerResult);
            echo "<tr height='35'>";
//        echo "<td>";
//        echo $innerRow['oid'];
//        echo "</td>";
        echo "<td>";
        echo $innerRow['cid']."<br/>".strtoupper($innerRow['component']);
        echo "</td>";

    echo "<td>";
    echo $innerRow['courseTitle'];
    echo "</td>";
        echo "<td>";
        echo $innerRow['InstNameF']." ".$innerRow['InstNameL'];
        echo "</td>";
        echo "<td>";
        echo $innerRow['TimeStart']."-".$innerRow['TimeEnd']." ( ". transWeekIntoString($innerRow)." ) ";
        echo "</td>";
//        echo "<td>";
//        echo transWeekIntoString($innerRow);
//        echo "</td>";
        echo "<td>";
        echo $innerRow['ClassLocation'];
        echo "</td>";
        echo "<td>";
        echo $row['takenTime'];
        echo "</td>";
        echo "<td width='20px'>";
        echo $row['mark'];
        echo "</td>";
             echo "</tr>";
}
    ?>
</table>
</div>
<!--    --><?php

//    while($outRow=mysql_fetch_array($result)){
//        $row=mysql_fetch_array(getOfferingById($outRow['oid']));
//        echo "<tr>";
//        echo "<td>";
//        echo $row['oid'];
//        echo "</td>";
//        echo "<td>";
//        echo $row['classNum'];
//        echo "</td>";
//        echo "<td>";
//        echo $row['InstNameF']." ".$row['InstNameL'];
//        echo "</td>";
//        echo "<td>";
//        echo $row['TimeStart']."-".$row['TimeEnd'];
//        echo "</td>";
//        echo "<td>";
//        echo transWeekIntoString($row);
//        echo "</td>";
//        echo "<td>";
//        echo $row['ClassLocation'];
//        echo "</td>";
//        echo "<td>";
//        echo "<input type='radio' name='lab' value='".$row["oid"]."'>";
//        echo "</td>";
//        echo "</tr>";
//    }
//    ?>
<?php
include_once "studentViewEnd.php";
?>