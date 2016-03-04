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
<!--    <a href="displayMajorProfile.php?major=--><?php //echo $row['majorName']?><!--" style="font-size: medium">--><?php //echo $row['majorFullName']?><!--</a><br>-->


    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <ul class="thumbnails">
                    <li class="span4">
                        <div class="thumbnail">

                            <div class="caption">
                                <h3>
                                    <a href="displayMajorProfile.php?major=<?php echo $row['majorName']?>" style="font-size: medium"><?php echo $row['majorFullName']?></a><br>
                                </h3>
                                <p>Computer science is the scientific and practical approach to computation and its applications. It is the systematic study of the feasibility, structure, expression, and mechanization of the methodical procedures (or algorithms) that underlie the acquisition, representation, processing, storage, communication of, and access to information. An alternate, more succinct definition of computer science is the study of automating algorithmic processes that scale. A computer scientist specializes in the theory of computation and the design of computational systems
</p>
                            </div>
                        </div>
                    </li>
                    <li class="span4">

    </div>






<?php
}
include_once "adminViewEnd.php";
?>