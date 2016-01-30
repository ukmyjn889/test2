<?php
include_once "adminView.php";
include_once "../model/deleteCourse.php";
$delete=$_GET['delete'];
if($delete!=null){
    deleteByCid($delete);
}
?>

<!--                <table border="0" cellspacing="0" cellpadding="0" width="523">-->
<!--                    <tr>-->
<!--                        <td width="523" class="pageName">please add a course</td>-->
<!--                    </tr>-->
<!--                    -->
<!--                </table>-->
                <?php

                /**
                 * Created by PhpStorm.
                 * User: Liu
                 * Date: 9/16/2015
                 * Time: 10:09 PM
                 */
                echo "<div align='center'>
        <table border='1' width='800' style='height: 400px'>

            <th>id</th>
            <th>title</th>
            <th>prerequisites</th>
            <th>credits</th>
            <th>lab</th>
            <th>add Offering</th>
            <th>show Offering</th>
            <th>delete</th>
        <br>";
                $pageNow=$_GET["pageNow"];
                //echo $pageNow;
                if(!is_numeric($pageNow)){
                    $pageNow=1;
                }
                $pageSize=6;
                $pageCount=($pageNow-1)*$pageSize;
                $con=mysql_connect("localhost:3306","root","5656123ljx");
                if(!$con){
                    die('Could not connect: ' . mysql_error());
                }
                mysql_select_db("capstone",$con);
                $result=mysql_query("select * from Course limit ".$pageCount.",".$pageSize);
                while($row = mysql_fetch_array($result))
                {
                    echo "<tr><td>";
                    echo $row['cid']." ";
                    echo "</td>";
                    echo "<td>";
                    echo $row['title']." ";
                    echo "</td>";
                    echo "<td>";
                    echo $row['prerequisites']." ";
                    echo "</td>";
                    echo "<td>";
                    echo $row['credits'] ." ";
                    echo "</td>";
                    echo "<td>";
                    echo $row['lab']." ";
                    echo "</td>";

                    echo "<td>";
                    ?>
                    <a href="addOffering.php?cid=<?php echo $row['cid'];?>&courseTitle=<?php echo $row['title'] ?>" >Add</a>
                    <?php echo "</td>";
                     echo "<td>";
                    ?>
                    <a href="showOfferingBrief.php?cid=<?php echo $row['cid'];?>&courseTitle=<?php echo $row['title'] ?>" >View</a>
                    <?php echo "</td>";
                    echo "<td>";
                    ?>
                    <a href="showCourse.php?delete=<?php echo $row['cid'];?>&pageNow=<?php echo $pageNow;?> ">Delete</a>
                    <?php echo "</td></tr>";

                }

                ?>
</table>
    <?php
        $result=mysql_query("select count(*) from Course");
        $row=mysql_fetch_array($result);
    if($row[0]<$pageSize) {
        $pageTotal=1;
    }else{

            $pageTotal = ceil($row[0] / $pageSize) ;

    }
    if($pageNow!=1) {
        echo "<a href='showCourse.php?pageNow=" . ($pageNow-1) . "' style='font-size:200%'><--<a>&nbsp";
    }
    for($x=1;$x<=$pageTotal;$x++){
        echo "<a href='showCourse.php?pageNow=".$x."' style='font-size:200%'>".$x."<a> &nbsp";
    }
    if($pageNow<$pageTotal) {
        echo "<a href='showCourse.php?pageNow=" . ($pageNow+1) . "' style='font-size:200%'>--><a>";
    }

    ?>
<!--    <a href="addCourse.php">back</a>-->

</body>
</html>
