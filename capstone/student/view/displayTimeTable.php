<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 2015/10/22
 * Time: 0:16
 */
include_once "../model/getTimeTable.php";
include_once "studentView.php";
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
            border:skyblue solid 1px;
        }
        .right td.drop{
            background:#fafafa;
            width:100px;
        }
        .right td.over{
            background:#FBEC88;
        }
        .right table{




        }



    </style>
    <script>

    </script>
</head>
<body>

<div  class="demo-info" style="margin-bottom:30px">

</div>

<div style="width:1200px;">


    <div class="right" style="position:absolute; left:10px; top:5px; ">




        <table height="400" width="1200"  >
            <tr>
                <td class="title"> Class Timings</td>
                <td class="title" height="30">Monday</td>
                <td class="title">Tuesday</td>
                <td class="title">Wednesday</td>
                <td class="title">Thursday</td>
                <td class="title">Friday</td>
                <td class="title">Saturday</td>
            </tr>
            <tr>
                <td class="time">07:00 AM-8:00 AM</td>
                <td class="drop" height="30px"></td>
                <td class="drop" height="30px"></td>
                <td class="drop" height="30px"></td>
                <td class="drop" height="30px"></td>
                <td class="drop" height="30px"></td>
                <td class="drop" height="30px"></td>
            </tr>
            <tr>
                <td class="time">8:00 AM-09:00 AM</td>
                <td class="drop" height="30"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
            </tr>
            <tr>
                <td class="time">9:00 AM-10:00 AM</td>
                <td class="drop" height="30"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
            </tr>
            <tr>
                <td class="time">10:00 AM-11:00 AM</td>
                <td class="drop" height="30"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
            </tr>
            <tr>
                <td class="time">11:00 AM-12:00 AM</td>
                <td class="drop" height="30"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
            </tr>
            <tr>
                <td class="time">12:00 PM-13:00 PM</td>

                <td class="drop" height="30"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
            </tr>
            <tr>
                <td class="time">1:00 PM-2:00 PM</td>
                <td class="drop" height="30"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
            </tr>
            <tr>
                <td class="time">2:00 PM-3:00 PM</td>
                <td class="drop" height="30"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
            </tr>
            <tr>
                <td class="time">3:00 PM-4:00 PM</td>
                <td class="drop" height="30"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
            </tr>
            <tr>
                <td class="time">4:00 PM-5:00 PM</td>
                <td class="drop" height="30"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
            </tr>
            <tr>
                <td class="time">5:00 PM-6:00 PM</td>
                <td class="drop" height="30"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
            </tr>

        </table>
    </div>
    <div id="nocolor" style="position:absolute; left:310px; top:38px;">

        <table height="400"  CellSpacing="0" style=" border-color: #00aeef; " border="0px"  width="598">

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
                for($y=0;$y<6;$y++) {
                    if ($timeTableArray[$y][$x] == "x" || $timeTableArray[$y][$x + 1]=="x") {
                        if ($flag[$y] >0) {
                                $flag[$y] --;
                        } else {

                            $offeringRow = $timeTable[$y][$count[$y]];
                            $rowSpan=calculateOfferingPeriod($offeringRow);
                            echo "<td class='title' align='center'  height='4px'  width='75' rowspan='" . $rowSpan . "'     style=' border:1px solid; border-color:#1e90ff; '  bgcolor='#1e90ff'><a href='#' style='color: #ffffff;'>" .
                               $offeringRow['cid']. "<a></td>\n";
                            $flag[$y] = $rowSpan-1;
                            $count[$y]++;
                        }
                    } else {
                        echo "<td align='center' class='drop' height='4px' width='75'  ></td>\n";
                    }
                }

                ?>

            <?php
           echo "</tr>\n";
            }
            ?>
<!--            "\n".$offeringRow['TimeStart']."-".$offeringRow['TimeEnd'] .-->


        </table>
    </div>
</div>
</body>
</html>