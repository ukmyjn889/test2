<?php
include_once "studentView.php";
?>
<!--<div>-->
<!--    <br><br><br><br>-->
<!--    <h3 class="text-center">-->
<!--        How many semesters would you prefer ?-->
<!--    </h3><br><br><br>-->
<!--    <div style="text-align:center">-->
<!--        <form action="displayAutoplan.php" method="post">-->
<!--            <fieldset>-->
<!--                <label>please input number:</label><input type="text" name="semesters"/>-->
<!--                <input type="hidden" name="term1" value="15">;-->
<!--                <input type="hidden" name="term2" value="0">;-->
<!--                <span class="help-block">you can input numbers for how many semseters for finishing all courses required.</span>  <br><button type="submit" class="btn">submit</button>-->
<!--            </fieldset>-->
<!--        </form>-->
<!---->
<!--    </div>-->
<!--</div>-->
<div class="container" style="width: 100%">
      <h2 align="center">Welcome to use planner!</h2>
    <br><br><br>
<!--      <p align="center">this is a planner please input some details you want at first.</p>-->

<form action="selectAutoPlan.php" method="get">
      <table class="table table-striped table-bordered" width="600px">
         <thead>
           <tr>

             <th>Which Semester you want to start with?</th>
             <th>How many semesters you prefer to finish your plan? </th>
           </tr>
         </thead>
         <tbody>
           <tr>

             <td width="50%"> <select name="term" id="select1" class=" form-control">
                    <option value="32">2016 Spring</option>
                     <option value="33">2016 Fall</option>
                     <option value="34">2017 Spring</option>
                     <option value="35">2017 Fall</option>
                     <option value="36">2018 Spring</option>
                     <option value="37">2018 Fall</option>
                     <option value="38">2019 Spring</option>
                     <option value="39">2019 Fall</option>
                     <option value="40">2020 Spring</option>
                      </select>
    </td>
             <td width="50%">
               <input type="text" name="semesters"class="form-control"> </td>
           </tr>

        </tbody>
      </table>

    <p align="center">
    <input type="submit" class="btn btn-success" value="Confirm">
    <input type="reset" class="btn btn-warning" value="Clear">
    </p>
</form>
</div>
<?php
include_once "studentViewEnd.php";
?>