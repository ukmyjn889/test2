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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
    <meta charset="UTF-8" >


    <title>Home Page</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <link rel="stylesheet" href="css/mm_health_nutr.css" type="text/css" />

    <style type="text/css">
        <!--
        .STYLE1 {font-size: 16px}
        -->
    </style>
</head>
<body bgcolor="#F4FFE4">
<form action="" method="post" name="saveOffering">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr bgcolor="#D5EDB3">
            <td colspan="3" rowspan="2"><img src="images/mm_health_photo.jpg" alt="Header image" width="382" height="101" border="0" /></td>
            <td height="50" colspan="3" id="logo" valign="bottom" align="center" nowrap="nowrap">Admin manage interface</td>
            <td width="657">&nbsp;</td>
        </tr>

        <tr bgcolor="#D5EDB3">
            <td height="51" colspan="3" id="tagline" valign="top" align="center">save class Offering</td>
            <td width="657">&nbsp;</td>
        </tr>

        <tr>
            <td colspan="7" bgcolor="#5C743D"><img src="images/mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
        </tr>

        <tr>
            <td colspan="7" bgcolor="#99CC66" background="images/mm_dashed_line.gif"><img src="images/mm_dashed_line.gif" alt="line decor" width="4" height="3" border="0" /></td>
        </tr>

        <tr bgcolor="#99CC66">
            <td colspan="7" id="dateformat" height="20">&nbsp;&nbsp;<script language="JavaScript" type="text/javascript">
                    document.write(TODAY);	</script>	</td>
        </tr>
        <tr>
            <td colspan="7" bgcolor="#99CC66" background="images/mm_dashed_line.gif"><img src="images/mm_dashed_line.gif" alt="line decor" width="4" height="3" border="0" /></td>
        </tr>

        <tr>
            <td colspan="7" bgcolor="#5C743D"><img src="images/mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
        </tr>

        <tr>
            <td width="165" height="974" valign="top" bgcolor="#5C743D">
                <table border="0" cellspacing="0" cellpadding="0" width="165" id="navigation">
                    <tr>
                        <td width="165">&nbsp;<br />
                            &nbsp;<br /></td>
                    </tr>
                    <tr>
                        <td width="165"><a href="addCourse.php" class="navText">add Course</a></td>
                    </tr>
                    <tr>
                        <td width="165"><a href="showCourse.php" class="navText">show Course</a></td>
                    </tr>
                    <tr>
                        <td width="165"><a href="showOfferingBrief.php" class="navText">show Offering</a></td>
                    </tr>
                    <tr>
                        <td width="165"><a href="javascript:;" class="navText">guidelink4</a></td>
                    </tr>
                    <tr>
                        <td width="165"><a href="javascript:;" class="navText">guidelink5</a></td>
                    </tr>
                </table>
                ?<br />
                &nbsp;<br />
                &nbsp;<br />
                &nbsp;<br /> 	</td>
            <td width="50"><img src="images/mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
            <td colspan="2" valign="top"><img src="images/mm_spacer.gif" alt="" width="305" height="1" border="0" /><br />
                &nbsp;<br />
                &nbsp;<br />
                <table border="0" cellspacing="0" cellpadding="0" width="523">
                    <tr>
                        <td width="523" class="pageName">Offering info</td>
                    </tr>

                    <tr>
                        <td class="bodyText"><p>
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

                </table>

                    &nbsp;<br />
                </p>
                <p>&nbsp;	  </p></td>
            <td width="50"><img src="images/mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
            <td width="347" valign="top"><br />
                &nbsp;<br />
                <table width="262"  border="0" cellpadding="0" cellspacing="0" id="leftcol">

                    <tr>
                        <td width="10"><img src="images/mm_spacer.gif" alt="" width="10" height="1" border="0" /></td>
                        <td width="177" class="smallText"><br />
                            <p><span class="subHeader">course id </span><br />
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam. </p>

                            <p><span class="subHeader">prerequisites</span><br />
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam. </p>

                            <p><span class="subHeader">offering</span><br />
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam. </p>

                            <br />
                            &nbsp;<br />          </td>
                        <td width="10">&nbsp;</td>
                    </tr>
                </table>	</td>
            <td width="657">&nbsp;</td>
        </tr>
        <tr>
            <td width="165">&nbsp;</td>
            <td width="50">&nbsp;</td>
            <td width="192">&nbsp;</td>
            <td width="222">&nbsp;</td>
            <td width="50">&nbsp;</td>
            <td width="347">&nbsp;</td>
            <td width="657">&nbsp;</td>
        </tr>
    </table>
</body>
</html>
