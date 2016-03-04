<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 9/23/2015
 * Time: 1:01 AM
 */
include_once "adminView.php";
include_once "../model/deleteOffering.php";
$delete=$_GET['delete'];
if($delete!=null){
    deleteByOid($delete);
}
$con=mysql_connect("localhost:3306","root","5656123ljx");
if(!$con){
    die('Could not connect: ' . mysql_error());
}
$cid=$_GET['cid'];
mysql_select_db("capstone",$con);
$sql="select oid,classNum,courseTitle from Offering where cid='".$cid."'";
//echo $sql;
$result=mysql_query($sql);
?>
<!--<table border="1">-->
<!--    <th>Offering ID</th>-->
<!--    <th>Class Number</th>-->
<!--    <th>Course Title</th>-->
<!--    <th>details</th>-->
<!--    --><?php
//    while($row = mysql_fetch_array($result)){
//        echo "<tr><td>";
//        echo $row['oid'];
//        echo  "</td><td>";
//        echo $row['classNum'];
//        echo  "</td><td>";
//        echo $row['courseTitle'];
//        echo  "</td><td>";
//        ?>
<!--        <a href="showOfferingDetails.php?oid=--><?php //echo $row['oid'];?><!--">details</a>-->
<!--    --><?php
//        echo "</td></tr>";
//    }
//
//
//    ?>
<!--</table>-->
<form action="../model/saveCourse.php" method="post" name="saveCourse">
            <?php echo $_GET['title'];
            ?>
                <table border="1" align="center" width="100%" class='table table-striped'>
                    <th>Offering ID</th>
                    <th>Course Title</th>
                    <th>Details</th>
                    <th>Delete</th>
                    <?php
                    while($row = mysql_fetch_array($result)){
                        echo "<tr><td>";
                        echo $row['oid'];
//                        echo  "</td><td>";
//                        echo $row['classNum'];
                        echo  "</td><td>";
                        echo $row['courseTitle'];
                        echo  "</td><td>";
                        ?>
                        <a href="../view/showOfferingDetails.php?oid=<?php echo $row['oid'];?>"><h3 style="color: #006600">Details</h3></a>
                    <?php
                        echo  "</td><td>";
                        ?>
                        <input type="button" value="delete" class="btn btn-default" onclick="del(<?php echo $row['oid'];?>,'<?php echo $cid;?>')">
                        <?php
                        echo "</td></tr>";
                    }


                    ?>
                </table>
    </form>
</div>
<script>
    function del(oid,cid){
        //alert(oid);
        if(confirm("Are you Sure you want to delete this offering")){
            window.location="showOfferingBrief.php?delete="+oid+"&cid="+cid;
        }
    }
</script>
</body>
</html>
