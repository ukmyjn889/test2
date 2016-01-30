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
                            <table>
                                <tr>
                                    <td width="200" height="50">course ID:</td>
                                    <td width="300"><input name="cid" value="<?php echo $row['cid']; ?>" onfocus="this.blur()"/>
                                </tr>

                                <tr>
                                    <td height="50">class number:</td>
                                    <td><input name="classNum" type="text" value="<?php echo $row['classNum']; ?>"/>

                                </tr>

                                <tr>
                                    <td height="50">Instructor last name:</td>
                                    <td><input name="instNameL" type="text" value="<?php echo $row['InstNameL']; ?>"/>

                                </tr>

                                <tr>
                                    <td height="50"> Instructor first name:</td>
                                    <td>
                                        <input name="instNameF" type="text" value="<?php echo $row['InstNameF']; ?>"/>
                                </tr>

                                <tr>
                                    <td height="50">  Start Time:</td>
                                    <p><br>
                                    <td><input type="time" name="timeStart" value="<?php echo $row['TimeStart']; ?>"/>
                                </tr>

                                <tr>
                                    <td height="50">  End Time:</td>
                                    <td> <input type="time" name="timeEnd" value="<?php echo $row['TimeEnd']; ?>"/>
                                </tr>
                                <tr>
                                    <td height="50">    week plan</td>
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
                                    <td height="50">  COMPONENT:</td>
                                    <td><?php echo $row['component']; ?>
                                </tr>
                                <tr>
                                    <td height="50">  Semester：
                                    <td><?php echo $row['semester']; ?>
                                </tr>
                                <tr>
                                    <td height="50">  ClassLocation:</td>
                                    <td><input name="classLocation" type="text" value="<?php echo $row['ClassLocation']; ?>"> <br>
                                </tr>
                                <tr>
                                    <td height="50">  CapEnrl;</td>
                                    <td> <input name="capEnrl" type="text" value="<?php echo $row['CapEnrl']; ?>"/>
                                </tr>

                                <tr>
                                    <td height="50"> TotEnrl:</td>
                                    <td><input name="totEnrl" type="text" readonly value="<?php echo $row['TotEnrl']; ?>" />
                                </tr>
                                <tr>
                                    <td height="50">  waitCap:</td>
                                    <td><input name="waitCap" type="text" readonly value="<?php echo $row['waitCap']; ?>"/>
                                </tr>
                                <tr>
                                    <td height="50"> waitTot:</td>
                                    <td><input name="waitTot" type="text" readonly value="<?php echo $row['waitTot']; ?>" />
                                </tr>
                                <tr>
                                    <td height="50"> courseTitle:</td>
                                    <td><input name="courseTitle" type="text" value="<?php echo $row['courseTitle']; ?>"/>
                                </tr>





                            </table>

<!--                </table>-->
    </form>
</body>
</html>
