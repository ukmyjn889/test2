<?php
include_once "studentView.php";
?>
<div>
    <br><br><br><br>
    <h3 class="text-center">
        How many semesters would you prefer ?
    </h3><br><br><br>
    <div style="text-align:center">
        <form action="displayAutoplan.php" method="post">
            <fieldset>
                <label>please input number:</label><input type="text" name="semesters"/>
                <input type="hidden" name="term1" value="15">;
                <input type="hidden" name="term2" value="0">;
                <span class="help-block">you can input numbers for how many semseters for finishing all courses required.</span>  <br><button type="submit" class="btn">submit</button>
            </fieldset>
        </form>

    </div>
</div>
<?php
include_once "studentViewEnd.php";
?>