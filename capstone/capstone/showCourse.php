

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
    <meta charset="UTF-8" >


    <title>Home Page</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <link rel="stylesheet" href="css/mm_health_nutr.css" type="text/css" />

    <style type="text/css">
        <!--
        .STYLE1 {font-size: 16px}
        -->
    </style>
</head>
<body bgcolor="#F4FFE4">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr bgcolor="#D5EDB3">
            <td colspan="3" rowspan="2"><img src="images/mm_health_photo.jpg" alt="Header image" width="382" height="101" border="0" /></td>
            <td height="50" colspan="3" id="logo" valign="bottom" align="center" nowrap="nowrap">Admin manage interface</td>
            <td width="657">&nbsp;</td>
        </tr>

        <tr bgcolor="#D5EDB3">
            <td height="51" colspan="3" id="tagline" valign="top" align="center">save class Offering</td>
            <td width="657">&nbsp;</td>
        </tr>

        <tr>
            <td colspan="7" bgcolor="#5C743D"><img src="images/mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
        </tr>

        <tr>
            <td colspan="7" bgcolor="#99CC66" background="images/mm_dashed_line.gif"><img src="images/mm_dashed_line.gif" alt="line decor" width="4" height="3" border="0" /></td>
        </tr>

        <tr bgcolor="#99CC66">
            <td colspan="7" id="dateformat" height="20">&nbsp;&nbsp;<script language="JavaScript" type="text/javascript">
                    document.write(TODAY);	</script>	</td>
        </tr>
        <tr>
            <td colspan="7" bgcolor="#99CC66" background="images/mm_dashed_line.gif"><img src="images/mm_dashed_line.gif" alt="line decor" width="4" height="3" border="0" /></td>
        </tr>

        <tr>
            <td colspan="7" bgcolor="#5C743D"><img src="images/mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
        </tr>

        <tr>
            <td width="165" height="974" valign="top" bgcolor="#5C743D">
                <table border="0" cellspacing="0" cellpadding="0" width="165" id="navigation">
                    <tr>
                        <td width="165">&nbsp;<br />
                            &nbsp;<br /></td>
                    </tr>
                    <tr>
                        <td width="165"><a href="addCourse.php" class="navText">add Course</a></td>
                    </tr>
                    <tr>
                        <td width="165"><a href="showCourse.php" class="navText">show Course</a></td>
                    </tr>
                    <tr>
                        <td width="165"><a href="showOfferingBrief.php" class="navText">show Offering</a></td>
                    </tr>
                    <tr>
                        <td width="165"><a href="javascript:;" class="navText">guidelink4</a></td>
                    </tr>
                    <tr>
                        <td width="165"><a href="javascript:;" class="navText">guidelink5</a></td>
                    </tr>
                </table>
                ?<br />
                &nbsp;<br />
                &nbsp;<br />
                &nbsp;<br /> 	</td>
            <td width="50"><img src="images/mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
            <td colspan="2" valign="top"><img src="images/mm_spacer.gif" alt="" width="305" height="1" border="0" /><br />
                &nbsp;<br />
                &nbsp;<br />
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
            <th>addOffering</th>
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
                    <a href="addOffering.php?cid=<?php echo $row['cid'];?>&courseTitle=<?php echo $row['title'] ?>" >add</a>
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
    </div>
                <p align="center">&nbsp;</p>
                <p align="center" id="subCourse">

                </p>
                <p><br />
                    &nbsp;<br />
                </p>
                <p>&nbsp;	  </p></td>
            <td width="50"><img src="images/mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
            <td width="347" valign="top"><br />
                &nbsp;<br />
                <table width="262"  border="0" cellpadding="0" cellspacing="0" id="leftcol">

                    <tr>
                        <td width="10"><img src="images/mm_spacer.gif" alt="" width="10" height="1" border="0" /></td>
                        <td width="177" class="smallText"><br />
                            <p><span class="subHeader">course id </span><br />
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam. </p>

                            <p><span class="subHeader">prerequisites</span><br />
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam. </p>

                            <p><span class="subHeader">offering</span><br />
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam. </p>

                            ?<br />
                            &nbsp;<br />          </td>
                        <td width="10">&nbsp;</td>
                    </tr>
                </table>	</td>
            <td width="657">&nbsp;</td>
        </tr>
        <tr>
            <td width="165">&nbsp;</td>
            <td width="50">&nbsp;</td>
            <td width="192">&nbsp;</td>
            <td width="222">&nbsp;</td>
            <td width="50">&nbsp;</td>
            <td width="347">&nbsp;</td>
            <td width="657">&nbsp;</td>
        </tr>
    </table>
</body>
</html>
