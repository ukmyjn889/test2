<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/11/5
 * Time: 7:36
 */
include_once "adminView.php";
include "../model/getMajor.php";
?>
<?php
$result=getAllMajor();
while($row=mysql_fetch_array($result)) {
    ?>
    <a href="displayMajorProfile.php?major=<?php echo $row['majorName']?>" style="font-size: medium"><?php echo $row['majorFullName']?></a><br>
<?php
}
include_once "adminViewEnd.php";
?>