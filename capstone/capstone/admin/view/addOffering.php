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
include_once "adminVIew.php";
?>

<form action="../model/saveOffering.php" method="post" name="saveOffering">
                <table border="0" cellspacing="0" cellpadding="0" width="523">
                    <tr>
                        <td width="523" class="pageName">Please add a Offering</td>
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
            <td width="657">&nbsp;</td>
    </form>
 <?php
 include_once "adminViewEnd.php"
 ?>
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
<!--    <!--                            <p><br>-->
<!--    <!--                                StartDate-->
<!--    <!--                                <input type="date" name="startDate"/>-->
<!--    <!--                            <p><br>-->
<!--    <!--                                EndDate-->
<!--    <!--                                <input type="date" name="endDate"/>-->
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