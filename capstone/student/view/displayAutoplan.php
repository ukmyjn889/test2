<!--<script>-->
<!--    var arr=new Array(0);-->
<!--    function checkVaild(value,currentSemester){-->
<!--        if(document.getElementById(value).checked){-->
<!--            arr.push(value);-->
<!--        }else{-->
<!--            //remove value-->
<!--            var temp=new Array(0);-->
<!--            for(var x=0;x<arr.length;x++){-->
<!--                if(arr[x]!=value){-->
<!--                    temp.push(arr[x]);-->
<!--                }-->
<!--            }-->
<!---->
<!--            var str="";-->
<!--            for(var i=0;i<temp.length-1;i++){-->
<!--                str+=temp[i]+",";-->
<!--            }-->
<!--            str+=temp[temp.length-1];-->
<!--            var xhttp = new XMLHttpRequest();-->
<!--            xhttp.onreadystatechange = function() {-->
<!--                if (xhttp.readyState == 4 && xhttp.status == 200) {-->
<!--                    if(xhttp.responseText=="true"){-->
<!--                        arr=temp;-->
<!--                    }else{-->
<!--                        alert("can not cancel this course because "+xhttp.responseText+" requires this course");-->
<!--                        document.getElementById(value).checked=true;-->
<!--                    }-->
<!--                }-->
<!--            }-->
<!--            xhttp.open("POST", "/capstone/student/model/AjaxPlan.php", true);-->
<!--            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");-->
<!--            xhttp.send("cids="+str+"&&method=1");-->
<!--        }-->
<!--    }-->
<!--</script>-->
<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/11/29
 * Time: 17:25
 */
include_once "../model/AutoPlan.php";
include_once "studentView.php";
$semesters=$_POST['semesters'];
$term1=$_POST['term1'];
$term2=$_POST['term2'];
//echo $semesters;
session_start();
$sid=$_SESSION['sid'];
$result=getKasiPlan($semesters,$sid);

//print_r($result);
if($result=="error"){
    echo "You cant finish these courses within ".$semesters." semesters";
    echo "<br><a href=\"javascript:history.go(-1)\">Back</a>";
}else {
    echo "<h3></h3>";
    echo "<table border='0' style='border-collapse: collapse' width='400' >";

    for ($i = 0; $i < count($result); $i++) {
        if($result[$i]==null){

        }else {
            echo "<tr>";
            echo "<td style='font-weight: bolder'>";
            $t=(int)(($term2+$i)/2)+$term1;
            if(($term2+$i)%2!=0) {
                echo "20".$t ." FALL";
            }else{
                echo "20".$t ." SPRING";
            }
            echo "</td>";
            echo "</tr>";
        }
        for ($j = 0; $j < count($result[$i]); $j++) {
            echo "<tr>";
            echo "<td>";
            echo $result[$i][$j]['cid'];
            echo "</td><td>";
            echo $result[$i][$j]['credits'];
            echo "</td><td>";
            echo $result[$i][$j]['available'];
            echo "</td>";
//            for ($k = 0; $k < count($result[$i][$j]); $k++) {
//                if ($result[$i][$j][$k] != null) {
//                    echo "<td>";
//                    echo $result[$i][$j][$k];
//                    echo "</td>";
//                }
//            }

            echo "</tr>";
        }
    }
    echo "</table>";
?>
    <input type="button" value="Go to Set your Plan>>" onclick="window.location.href='selectAutoPlan.php?semester=<?php echo $semesters?>&&term=<?php echo ($term1*2+$term2)?>'">
<?php
}
include_once "studentViewEnd.php";
?>
