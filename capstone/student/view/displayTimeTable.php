<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/10/22
 * Time: 0:16
 */
include_once "../model/getTimeTable.php";

session_start();
$sid=$_SESSION['sid'];
$timeTable=getOfferingBySidOrderByAscent($sid);
$timeTableArray=getOfferingTimeTable($sid);
//print_r($timeTableArray);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="keywords" content="jquery,ui,easy,easyui,web">
    <meta name="description" content="easyui help you build your web page easily!">
    <title>Creating a School Timetable - jQuery EasyUI Demo</title>


    <style type="text/css">

        .right{
            float:right;
            width:900px;
        }
        .right table{
            background:#E0ECFF;
            width:100%;
        }
        .right td{
            background:#fafafa;
            text-align:center;
            padding:2px;
        }
        .right td{
            background:#E0ECFF;
        }
        .right td.drop{
            background:#fafafa;
            width:100px;
        }
        .right td.over{
            background:#FBEC88;
        }
        .item{
            text-align:center;
            border:1px solid #499B33;
            background:#fafafa;
            width:100px;
        }
        .nocolor{
            width:
        }


    </style>
    <script>

    </script>
</head>
<body>

<div class="demo-info" style="margin-bottom:30px">

</div>

<div style="width:1200px;">

    <div class="right" style="position:relative; left:200px; top:10px; ">
        <table height="800" width="1200">
            <tr>
                <td class="blank"></td>
                <td class="title">Monday</td>
                <td class="title">Tuesday</td>
                <td class="title">Wednesday</td>
                <td class="title">Thursday</td>
                <td class="title">Friday</td>
                <td class="title">Saturday</td>
                <td class="title">Sunday</td>
            </tr>
            <tr>
                <td class="time">07:00-8:00</td>
                <td class="drop" height="60px"></td>
                <td class="drop" height="60px"></td>
                <td class="drop" height="60px"></td>
                <td class="drop" height="60px"></td>
                <td class="drop" height="60px"></td>
                <td class="drop" height="60px"></td>
                <td class="drop" height="60px"></td>
            </tr>
            <tr>
                <td class="time">8:00-09:00</td>
                <td class="drop" height="60"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
            </tr>
            <tr>
                <td class="time">9:00-10:00</td>
                <td class="drop" height="60"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
            </tr>
            <tr>
                <td class="time">10:00-11:00</td>
                <td class="drop" height="60"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
            </tr>
            <tr>
                <td class="time">11:00-12:00</td>
                <td class="drop" height="60"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
            </tr>
            <tr>
                <td class="time">12:00-13:00</td>

                <td class="drop" height="60"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
            </tr>
            <tr>
                <td class="time">13:00-14:00</td>
                <td class="drop" height="60"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
            </tr>
            <tr>
                <td class="time">14:00-15:00</td>
                <td class="drop" height="60"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
            </tr>
            <tr>
                <td class="time">16:00-17:00</td>
                <td class="drop" height="60"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
            </tr>
            <tr>
                <td class="time">18:00-19:00</td>
                <td class="drop" height="60"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
            </tr>
            <tr>
                <td class="time">20:00-21:00</td>
                <td class="drop" height="60"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
            </tr>

        </table>
    </div>
    <div id="nocolor" style="position:absolute; left:664px; top:113px;">

        <table height="733"  style=" border-color: #00aeef;" border="0px"  width="742">

            <?php
           // print_r($timeTable);
//            for($x=0;$x<count($timeTable);$x++){
//                echo $timeTable[$x]['cid'];
//            }
            $count=array(0,0,0,0,0,0,0);
            $flag=array(0,0,0,0,0,0,0);
//            echo $timeTableArray[1][10];
//            echo $timeTableArray[1][11];
//           print_r( $timeTableArray);
            for($x=0;$x<11*12;$x+=2){
//                if($x<15) {
//                    echo $flag[1];
//                }

                echo "<tr>\n";
                for($y=0;$y<7;$y++) {
                    if ($timeTableArray[$y][$x] == "x" || $timeTableArray[$y][$x + 1]=="x") {
                        if ($flag[$y] >0) {
                                $flag[$y] --;
                        } else {

                            $offeringRow = $timeTable[$y][$count[$y]];
                            $rowSpan=calculateOfferingPeriod($offeringRow);
                            echo "<td class='title' align='center'  height='8px'  width='75' rowspan='" . $rowSpan . "'     style='border:1px solid; border-color:#1e90ff; '  bgcolor='#1e90ff'>" .
                                $offeringRow['cid']."\n".$offeringRow['TimeStart']."-".$offeringRow['TimeEnd'] . "</td>\n";
                            $flag[$y] = $rowSpan-1;
                            $count[$y]++;
                        }
                    } else {
                        echo "<td align='center' class='drop' height='8px' width='75'  ></td>\n";
                    }
                }

                ?>

            <?php
           echo "</tr>\n";
            }
            ?>



        </table>
    </div>
</div>
</body>
</html>