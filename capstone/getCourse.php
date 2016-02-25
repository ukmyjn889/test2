<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 9/28/2015
 * Time: 10:16 PM
 */
$cid=$_GET["cid"];
$key=$_GET["key"];
$con=mysql_connect("localhost:3306","root","5656123ljx");
if(!$con){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("capstone",$con);
$sql="";
if($key==1){
    $sql="select * from Course where cid ='" . $cid . "'";
}else {
    $sql = "select * from Course where cid like'" . $cid . "%' limit 0,6";
}
$result=mysql_query($sql);
//$row = mysql_fetch_array($result);
$response="";

while($row=mysql_fetch_array($result)){
    $response.=$row['cid']." ";
}
echo $response;
?>
<?php
///**
// * Created by PhpStorm.
// * User: Liu
// * Date: 8/6/2015
// * Time: 7:24 PM
// */
//
//$username=$_GET["username"];
//$con=mysql_connect("localhost:3306","root","5656123ljx");
//if(!$con){
//    $response="gg";
//    die('could not connect:'.mysql_error());
//
//}
//mysql_select_db("cs549",$con);
//$result=mysql_query("select * from participant");
//
////while($row=mysql_fetch_array($result)){
////    echo $row[0];
////}
//$row=mysql_fetch_array($result);
//$temp=$row[1];
////echo $temp;
//if($temp=="$username"){
////echo 11;
//    $response="pass";
//}else{
//    //  echo 5;
//    $response="fail";
//}
//echo $response;
//?>