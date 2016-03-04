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
                <table border="0" cellspacing="0" cellpadding="0" width="800" align="center">
                    <tr >
                        <td width="523" class="pageName" ><b style="font-weight: 800 ;color:darkgreen;" ><h3 class="text-success">Please add an offering</b><h3</td>
                        <br>
                    </tr>
                    <tr>
                        <td class="bodyText"><p>
                            <p>
<table>
                    <tr>
                        <td width="800" height="50"><h3 class="text-success">Course ID</h3></td>
                        <td width="400"><?php echo $cid; ?></td>
                    </tr>
                                <tr>
                                    <td width="800" height="50"><h3 class="text-success">Course Title</h3></td>
                                    <td><?php echo $_GET['courseTitle']?></td>
                                </tr>
<!--                    <tr>-->
<!--                        <td height="50"><h3 class="text-success">Class Number</h3></td>-->
                        <input name="classNum" type="hidden" class="form-control" value="11111">

<!--                    </tr>-->

                    <tr>
                        <td height="50"><h3 class="text-success">Instructor last name</h3></td>
                        <td><input name="instNameL" type="text" class="form-control"></td>

                    </tr>

                    <tr>
                        <td height="50"> <h3 class="text-success">Instructor first name</h3></td>
                        <td><input name="instNameF" type="text" class="form-control" ></td>
                    </tr>

                    <tr>
                        <td height="50">  <h3 class="text-success">Start Time</h3></td>
                        <td><input type="time" name="timeStart"class="form-control"></td>
                    </tr>

                    <tr>
                        <td height="50"> <h3 class="text-success"> End Time</h3></td>
                        <td> <input type="time" name="timeEnd" class="form-control"></td>
                    </tr>
                    <tr>
                        <td height="50"> <h3 class="text-success"> Week plan</h3></td>
                        <td> <input name="Mon" type="checkbox" value="T" >
                            <b>Monday</b>
                            <input name="Tue" type="checkbox" value="T" >
                            <b> Tuesday</b>
                            <input name="Wed" type="checkbox" value="T" >
                            <b> Wednesday</b><br>
                            <input name="Thu" type="checkbox" value="T" >
                            <b> Thurday</b>
                            <input name="Fri" type="checkbox" value="T" >
                            <b> Friday</b>
                            <input name="Sat" type="checkbox" value="T" >
                            <b> Saturday</b>
                            <input name="Sun" type="checkbox" value="T" style="display: none">
<!--                            <b> Sunday</b>-->

                    </tr>
                                <tr>
                                    <td><h3 class="text-success">Offer Year</h3></td>
                                    <td><select name="offerYear" class="form-control">
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                        </select></td></tr>
                    <tr>
                        <td height="50"> <h3 class="text-success">Semester:</h3></td>
                        <td> <select name="semester" class="form-control">
                                <option value="spring">Spring</option>
                                <option value="fall">Fall</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td height="50">  <h3 class="text-success">Class Location</h3></td>
                        <td> <input name="classLocation" type="text" class="form-control"></td>
                    </tr>
                    <tr>
                        <td height="50">  <h3 class="text-success"> Capacity of Enrollment</h3></td>
                        <td> <input name="capEnrl" type="text" class="form-control"></td>
                    </tr>



                </table>
                            <br>


                            <p align="center"id="subCourse">
                                <input name="submit" type="submit" class="btn btn-success" value="submit"onclick="check()" />
                                <input name="reset" type="reset" class="btn btn-warning" value="clear">
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