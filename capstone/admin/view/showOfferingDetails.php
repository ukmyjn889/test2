<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 9/23/2015
 */
?>
<?php
$oid=$_GET["oid"];
if($oid==null){
    echo 1;
    //header("location:showCourse.php");
    // return;
}
$con=mysql_connect("localhost:3306","root","5656123ljx");
if(!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("capstone",$con);
$sql="select * from Offering where oid='".$oid."'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
include_once "adminView.php";
?>
<form action="" method="post" name="saveOffering">
<!--                <table border="0" cellspacing="0" cellpadding="0" width="523">-->
<!--                    <tr>-->
<!--                        <td width="523" class="pageName">Offering info</td>-->
<!--                    </tr>-->
<!---->
<!--                    <tr>-->
<!--                        <td class="bodyText"><p>-->
    <b STYLE="font-weight: 800;font-size: large;color: darkgreen">OFFERING DETAILS</b>
                            <table width="1200px" align="center">
                                <tr>
                                    <td width="200" height="50"><b>Course ID:</b></td>
                                    <td width="300"><input name="cid" value="<?php echo $row['cid']; ?>" onfocus="this.blur()"/>
                                </tr>
                                <tr>
                                    <td height="50"> <b>Course Title:</b></td>
                                    <td><input name="courseTitle" type="text" value="<?php echo $row['courseTitle']; ?>"></td>
                                </tr>
                                <tr>
                                    <td height="50"><b>Class number:</b></td>
                                    <td><input name="classNum" type="text" value="<?php echo $row['classNum']; ?>"/>

                                </tr>

                                <tr>
                                    <td height="50"><b>Instructor last name:</b></td>
                                    <td><input name="instNameL" type="text" value="<?php echo $row['InstNameL']; ?>"/>

                                </tr>

                                <tr>
                                    <td height="50"> <b>Instructor first name:</b></td>
                                    <td>
                                        <input name="instNameF" type="text" value="<?php echo $row['InstNameF']; ?>"/>
                                </tr>

                                <tr>
                                    <td height="50"> <b> Start Time:</b></td>
                                    <p><br>
                                    <td><input type="time" name="timeStart" value="<?php echo $row['TimeStart']; ?>"/>
                                </tr>

                                <tr>
                                    <td height="50"> <b> End Time:</b></td>
                                    <td> <input type="time" name="timeEnd" value="<?php echo $row['TimeEnd']; ?>"/>
                                </tr>
                                <tr>
                                    <td height="50">   <b> Week plan</b></td>
                                    <td>
                                        <p>
                                            <input name="Mon" type="checkbox" value="T"<?php
                                            if($row['Mon']=="T"){
                                                echo "checked";
                                            } ?>>
                                            Monday
                                            <input name="Tue" type="checkbox" value="T" <?php
                                            if($row['Tue']=="T"){
                                                echo "checked";
                                            } ?>>
                                            Tuesday
                                            <input name="Wed" type="checkbox" value="T" <?php
                                            if($row['Wed']=="T"){
                                                echo "checked";
                                            }else{
                                                echo $row['Wed'];
                                            } ?>>
                                            Wednesday
                                            <input name="Thu" type="checkbox" value="T" <?php
                                            if($row['Thu']=="T"){
                                                echo "checked";
                                            } ?>><br>
                                            Thurday
                                            <input name="Fri" type="checkbox" value="T" <?php
                                            if($row['Fri']=="T"){
                                                echo "checked";
                                            } ?>>
                                            Friday
                                            <input name="Sat" type="checkbox" value="T" <?php
                                            if($row['Sat']=="T"){
                                                echo "checked";
                                            } ?>>
                                            Saturday
                                            <input name="Sun" type="checkbox" value="T" <?php
                                            if($row['Sun']=="T"){
                                                echo "checked";
                                            } ?>>
                                            Sunday

                                </tr>
                                <tr>
                                    <td height="50">  <b>COMPONENT:</b></td>
                                    <td><?php echo $row['component']; ?></td>
                                </tr>
                                <tr>
                                    <td height="50"> <b> Semester：</b></td>
                                    <td><?php echo $row['semester']; ?></td>
                                </tr>
                                <tr>
                                    <td height="50">  <b>Class Location:</b></td>
                                    <td><input name="classLocation" type="text" value="<?php echo $row['ClassLocation']; ?>"> <br></td>
                                </tr>
                                <tr>
                                    <td height="50">  <b>Capacity of enrollment;</b></td>
                                    <td> <input name="capEnrl" type="text" value="<?php echo $row['CapEnrl']; ?>"></td>
                                </tr>

                                <tr>
                                    <td height="50"> <b>Actual enrollment:</b></td>
                                    <td><input name="totEnrl" type="text" readonly value="<?php echo $row['TotEnrl']; ?>" ></td>
                                </tr>
                                <tr>
                                    <td height="50"> <b> Wait Capacity:</b></td>
                                    <td><input name="waitCap" type="text" readonly value="<?php echo $row['waitCap']; ?>"></td>
                                </tr>
                                <tr>
                                    <td height="50"> <b>Wait Total:</b></td>
                                    <td><input name="waitTot" type="text" readonly value="<?php echo $row['waitTot']; ?>" ></td>
                                </tr>






                            </table>

<!--                </table>-->
    </form>
</body>
</html>
