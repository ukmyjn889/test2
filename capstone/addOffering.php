<?php
 $cid=$_GET["cid"];
if($cid==null){
   // echo 1;
    //header("location:showCourse.php");
   // return;
}
function charAt($str,$pos)

{

    return (mb_substr($str,$pos,1) !== false) ? mb_substr($str,$pos,1) : "";

}
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
<form action="saveOffering.php" method="post" name="saveOffering">
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
                        <td width="523" class="pageName">please add a course</td>
                    </tr>

                    <tr>
                        <td class="bodyText"><p>
                            <p>
<table>
                    <tr>
                        <td width="200" height="50">cid</td>
                        <td width="300"><input name="cid" value="<?php echo $cid; ?>" onfocus="this.blur()"/>
                    </tr>

                    <tr>
                        <td height="50">classNum</td>
                        <td><input name="classNum" type="text" />

                    </tr>

                    <tr>
                        <td height="50">Instructor last name</td>
                        <td><input name="instNameL" type="text" />

                    </tr>

                    <tr>
                        <td height="50"> Instructor first name</td>
                        <td><input name="instNameF" type="text" />
                    </tr>

                    <tr>
                        <td height="50">  Start Time</td>
                        <td><input type="time" name="timeStart"/>
                    </tr>

                    <tr>
                        <td height="50">  End Time</td>
                        <td> <input type="time" name="timeEnd"/>
                    </tr>
                    <tr>
                        <td height="50">   week plan</td>
                        <td> <input name="Mon" type="checkbox" value="T" >
                            Monday
                            <input name="Tue" type="checkbox" value="T" >
                            Tuesday
                            <input name="Wed" type="checkbox" value="T" >
                            Wednesday<br>
                            <input name="Thu" type="checkbox" value="T" >
                            Thurday
                            <input name="Fri" type="checkbox" value="T" >
                            Friday
                            <input name="Sat" type="checkbox" value="T" >
                            Saturday
                            <input name="Sun" type="checkbox" value="T" >
                            Sunday

                    </tr>
                    <tr>
                        <td height="50">  semester:</td>
                        <td> <select name="semester">
                                <option value="spring">spring</option>
                                <option value="summer">summer</option>
                                <option value="fall">fall</option>
                                <option value="winter">winter</option>
                            </select>
                    </tr>
                    <tr>
                        <td height="50">  ClassLocation</td>
                        <td> <input name="classLocation" type="text" >
                    </tr>
                    <tr>
                        <td height="50">   CapEnrl</td>
                        <td> <input name="capEnrl" type="text" />
                    </tr>



                </table>
                            <br>


                            <p align="center"id="subCourse">
                                <input name="submit" type="submit" value="submit"onclick="check()" />
                                <input name="reset" type="reset" value="clear">
                            </p>

                                <!--COMPONENT-->
                                <input name="component" type="hidden" value="<?php
                                 $point=strlen($cid)-1;
                                if(substr ( $cid, $point)=="L"){
                                    echo "lab";
                                }else{
                                    echo "lec";
                                }
                                ?>">

                            <p><br>
                                <!-- EnrlState--><input name="enrlState" type="hidden" value="O"/><br>

                            <p><br>
                                <!--TotEnrl-->
                                <input name="totEnrl" type="hidden" value="0" />
                            <p><br>
                                <!--waitCap-->
                                <input name="waitCap" type="hidden" value="0"/>
                            <p><!--waitTot-->
                                <input name="waitTot" type="hidden" value="0" />
                                <br>
                                <input name="courseTitle" type="hidden" value="<?php echo $_GET["courseTitle"];?>" />

                            <p>
                            <p>
                    </tr>
                </table>


                <p><br />

                </p>
                <p>	 </p></td>
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

                            ?<br />
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

            <td width="657">&nbsp;</td>
        </tr>
    </table>
</body>
</html>
<!--<p>cid <input name="cid" value="--><?php //echo $cid; ?><!--" onfocus="this.blur()"/>-->
<!--<p>classNum <input name="classNum" type="text" />-->
<!--<p>-->
<!--    Instructor last name-->
<!--    <input name="instNameL" type="text" />-->
<!--<p><br>-->
<!--    Instructor first name-->
<!--    <input name="instNameF" type="text" />-->
<!--<p><br>-->
<!--    Start Time-->
<!--    <input type="time" name="timeStart"/>-->
<!--<p><br>-->
<!--    End Time-->
<!--    <input type="time" name="timeEnd"/>-->
<!--<p><br>-->
<!--    week plan-->
<!--<p>-->
<!--    <input name="Mon" type="checkbox" value="T" >-->
<!--    Monday-->
<!--    <input name="Tue" type="checkbox" value="T" >-->
<!--    Tuesday-->
<!--    <input name="Wed" type="checkbox" value="T" >-->
<!--    Wednesday-->
<!--    <input name="Thu" type="checkbox" value="T" >-->
<!--    Thurday-->
<!--    <input name="Fri" type="checkbox" value="T" >-->
<!--    Friday-->
<!--    <input name="Sat" type="checkbox" value="T" >-->
<!--    Saturday-->
<!--    <input name="Sun" type="checkbox" value="T" >-->
<!--    Sunday-->
<!--    <br>-->
<!--    <!--                            <p><br>-->-->
<!--    <!--                                StartDate-->-->
<!--    <!--                                <input type="date" name="startDate"/>-->-->
<!--    <!--                            <p><br>-->-->
<!--    <!--                                EndDate-->-->
<!--    <!--                                <input type="date" name="endDate"/>-->-->
<!--    semester:<select name="semester">-->
<!--        <option value="spring">spring</option>-->
<!--        <option value="summer">summer</option>-->
<!--        <option value="fall">fall</option>-->
<!--        <option value="winter">winter</option>-->
<!--    </select>-->
<!--    <br>-->
<!---->
<!---->
<!---->
<!---->
<!---->
<!--<p><br>-->
<!--    ClassLocation-->
<!--    <input name="classLocation" type="text" > <br>-->
<!--    CapEnrl-->
<!--    <input name="capEnrl" type="text" />-->
<!--<p><br>-->