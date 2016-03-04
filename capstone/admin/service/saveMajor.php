<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2016/2/24
 * Time: 23:01
 */
//print_r( $_POST['corelist']);
$majorName=$_POST['majorName'];
$mid=getMaxMajorID()+1;
$corelist=$_POST['corelist'];
$credits=0;
foreach($corelist as $key=>$value){
    insertCourse_list($majorName."R",$value,getCreditByCid($value),"");
}
insertRequired($mid,$majorName,"required",$credits,"required",0,$majorName."R","","Core Course");
//$count=1;
for($i=1;$i<=8;$i++){
    $eChoice=$_POST['eChoice'.$i];
    $eChoiceValue=$_POST['eChoiceValue'.$i];
    $electiveList=$_POST['elegrup'.$i];
    if($electiveList==null){
        break;
    }
    foreach($electiveList as $key=>$value){
        insertCourse_list($majorName."".$i,$value,getCreditByCid($value),"");
    }
    insertRequired($mid,$majorName,$eChoice,$eChoiceValue,$eChoice,1,$majorName.$i,"","");
}
?>