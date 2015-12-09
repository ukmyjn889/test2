<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/11/12
 * Time: 5:52
 */
include_once "studentView.php";
include_once "../model/getStu_Plan.php";
?>
    <form action="displayStudentOwnPlan.php" method="get">
        <div class="planner" style="font-size:20px;font-style:oblique;">
            <div class="title" style="font-size:30px;font-style:oblique;font-variant: small-caps;color:#79B6E3">
                <center>
                    Planner

                </center>
            </div>
            <p align="center">
                <?php
                session_start();
                $sid=$_SESSION['sid'];
                $array=array();
                $result=getPlannerIdsBySid($sid);
                $i=1;
                $nickName="";
                ?>
                please select a plan <br>
                <select name="plannerId">
                    <?php while($row=mysql_fetch_array($result)){
                        if($row['nickName']!=null){
                            $nickName=$row['nickName'];
                        }else{
                            $nickName="Planner ".$i;
                        }
                        ?>
                        <option value="<?php echo $row['plannerId']?>"><?php echo $nickName?></option>
                        <?php $i++;}?>
                </select><br>
            </p>
            <p class="info">
            <center>

                please input the year you want <br>
            </center>

            </p>
            <p>
            <center>
                <!--<center><input id="year" type="text" value="" >-->
                <select name="term1" id="select_k1" class="xla_k">

                    <option value="">please choose a year</option>

                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                </select>

            </center>
            </p>

            <p class="info" style="color:#79B6E3">
            <center>
                please choose a term <br>
            </center>
            </p>
            <div id="checkbox" style="position:absolute;top:170px; left:430px;">
                <label>
                    <input type="radio" name="term2" value="spring" id="RadioGroup1_0">
                    SPRING</label>
                <br>
                <label>
                    <input type="radio" name="term2" value="summer" id="RadioGroup1_1">
                    SUMMER</label>
                <br>
                <label>
                    <input type="radio" name="term2" value="fall" id="RadioGroup1_2">
                    FALL</label>
                <br>
                <label>
                    <input type="radio" name="term2" value="winter" id="RadioGroup1_3">
                    WINTER</label>
                <br>




            </div>

        </div>
        <br>
        <br>
        <br>
        <div style="position:absolute;top:320px; left:430px;">
            <center>

                <input type="submit" value="OK">
                <input type="reset" value="clear"><br>

            </center>
        </div>
    </form>

<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/11/12
 * Time: 5:52
 */
include_once "studentViewEnd.php";
?>