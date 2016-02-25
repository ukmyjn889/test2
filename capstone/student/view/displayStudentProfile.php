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
include_once"../model/getMajor.php";
session_start();
$sid=$_SESSION["sid"];
$result=getStudentById($sid);
$row=mysql_fetch_array($result);
?>
<div>
<table border="0" title="student info" width="500" height="100" >
    <tr>
        <td>
            <h4 class="text-primary">Name:</h4>
        </td>
        <td>
            <?php
            echo"<h4 class='text-primary'>";
            echo $row['nameF']." ";

            echo $row['nameL'];
            echo"</h4>";
            ?>
        </td>
    </tr>
    <tr>
        <td>
            <h4 class="text-primary"> Student ID:</h4>
        </td>
        <td>
            <?php
            echo"<h4 class='text-primary'>";
            echo $row['sid'];
             echo"</h4>";
            ?>
        </td>
    </tr>

    <tr>
        <td>
            <h4 class="text-primary"> Major:</h4>
        </td>
        <td>
            <?php
            echo"<h4 class='text-primary'>";
            echo mysql_fetch_array(getMajorByMajorNickName($row['major']))['majorFullName'];
            echo"</h4>";
            ?>
        </td>
        </tr>
    <tr>
        <td>
            <h4 class="text-primary"> Enrollment year:</h4>
        </td>

        <td>
            <?php
            echo"<h4 class='text-primary'>";
            echo $row['grade']." ".$row['semester'];
            echo"</h4>";
            ?>
        </td>
    </tr>

</table>

</div>
<br><br>
<div >
    <h3 class="text-primary"> Course taken:</h3><br>
<table  width="710" class="table table-striped">
    <tr>
        <th height="20">Course ID</th>
        <th height="20">Course Title</th>
        <th height="20">Instructor Name</th>
        <th height="20">Class Time</th>

        <th height="20">Classroom</th>
        <th height="20">Taken in</th>
        <th height="20">Grade</th>
     </tr>
<?php
$result=getStu_offeringBySid($sid);

while ($row=mysql_fetch_array($result)){
   // echo $row['oid'];
    $innerResult=getOfferingById($row['oid']);
  //  echo $innerResult;
    $innerRow=mysql_fetch_array($innerResult);
            echo "<tr>";
//        echo "<td>";
//        echo $innerRow['oid'];
//        echo "</td>";
        echo "<td height='35'>";
        echo $innerRow['cid']."<br/>".strtoupper($innerRow['component']);
        echo "</td>";

    echo "<td>";
    echo  ucwords($innerRow['courseTitle']);
    echo "</td>";
        echo "<td>";
        echo ucwords($innerRow['InstNameF'])." ".ucwords($innerRow['InstNameL']);
        echo "</td>";
        echo "<td>";
        echo date("h:i A",strtotime($innerRow['TimeStart']))."-".date("h:i A",strtotime($innerRow['TimeEnd']))." ( ". transWeekIntoString($innerRow)." ) ";
        echo "</td>";
//        echo "<td>";
//        echo transWeekIntoString($innerRow);
//        echo "</td>";
        echo "<td>";
        echo  ucwords($innerRow['ClassLocation']);
        echo "</td>";
        echo "<td>";
        echo  ucwords($row['term']);
        echo "</td>";
        echo "<td width='20px'>";
        echo  ucwords($row['mark']);
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