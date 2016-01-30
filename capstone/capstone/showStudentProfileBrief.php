<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 10/5/2015
 * Time: 11:51 PM
 */
$con=mysql_connect("localhost:3306","root","5656123ljx");
if(!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("capstone",$con);
$sql="select * from student";
$result=mysql_query($sql);
?>
<table border="1" align="center" width="500px">
    <th>sid</th>
    <th>name</th>
    <th>major</th>
    <th>grade</th>
    <?php
    while($row = mysql_fetch_array($result)){
        echo "<tr><td>";
        echo $row['sid'];
        echo  "</td><td>";
        echo $row['name'];
        echo  "</td><td>";
        echo $row['major'];
        echo  "</td><td>";
        echo $row['grade'];
        echo  "</td><td>";
        ?>
        <a href="">edit</a>
        <?php
        echo "</td></tr>";
    }


    ?>
</table>