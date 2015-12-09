<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 10/6/2015
 * Time: 9:39 PM
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
    <meta charset="UTF-8" >



    <script language="JavaScript">

        function check(){

            if(document.getElementById("sid").value=="" || document.getElementById("sid").value=="please enter student id"){

                document.getElementById("siderror").innerHTML="error"
                return;
            }else if(document.getElementById("major").value=="" || document.getElementById("major").value=="please enter major"){

                document.getElementById("majorerror").innerHTML="error"
                return;
            }else if(document.getElementById("sname").value=="" || document.getElementById("sname").value=="please enter student name"){

                document.getElementById("snameerror").innerHTML="error"
                return;
            }
            else if(document.getElementById("grade").value=="" || document.getElementById("grade").value=="please enter grade"){

                document.getElementById("gradeerror").innerHTML="error"
                return;
            }

            else{
                alert("success")
                addstudentprof.submit();
            }

        }
    </script>





    <title>Home Page</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <link rel="stylesheet" href="../../css/mm_health_nutr.css" type="text/css" />

    <style type="text/css">
        <!--
        .STYLE1 {font-size: 16px}
        -->
    </style>
</head>
<body bgcolor="#F4FFE4">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr bgcolor="#D5EDB3">
            <td colspan="3" rowspan="2"><img src="../../images/mm_health_photo.jpg" alt="Header image" width="382" height="101" border="0" /></td>
            <td height="50" colspan="3" id="logo" valign="bottom" align="center" nowrap="nowrap">Admin manage interface</td>
            <td width="657">&nbsp;</td>
        </tr>

        <tr bgcolor="#D5EDB3">
            <td height="51" colspan="3" id="tagline" valign="top" align="center">add student prof</td>
            <td width="657">&nbsp;</td>
        </tr>

        <tr>
            <td colspan="7" bgcolor="#5C743D"><img src="../../images/mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
        </tr>

        <tr>
            <td colspan="7" bgcolor="#99CC66" background="../../images/mm_dashed_line.gif"><img src="../../images/mm_dashed_line.gif" alt="line decor" width="4" height="3" border="0" /></td>
        </tr>

        <tr bgcolor="#99CC66">
            <td colspan="7" id="dateformat" height="20">&nbsp;&nbsp;<script language="JavaScript" type="text/javascript">
                    document.write(TODAY);	</script>	</td>
        </tr>
        <tr>
            <td colspan="7" bgcolor="#99CC66" background="../../images/mm_dashed_line.gif"><img src="../../images/mm_dashed_line.gif" alt="line decor" width="4" height="3" border="0" /></td>
        </tr>

        <tr>
            <td colspan="7" bgcolor="#5C743D"><img src="../../images/mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
        </tr>

        <tr>
            <td width="165" height="974" valign="top" bgcolor="#5C743D">
                <table border="0" cellspacing="0" cellpadding="0" width="165" id="navigation">
                    <tr>
                        <td width="165">&nbsp;<br />
                            &nbsp;<br /></td>
                    </tr>
                    <tr>
                        <td width="165"><a href="javascript:;" class="navText">saveCourse</a></td>
                    </tr>
                    <tr>
                        <td width="165"><a href="javascript:;" class="navText">saveOffering</a></td>
                    </tr>
                    <tr>
                        <td width="165"><a href="javascript:;" class="navText">addstudentprof</a></td>
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
            <td width="350"></td>
            <td  valign="top" width="450px" height="100%" ><img src="../../images/mm_spacer.gif" alt="" width="305" height="1" border="0" /><br />
                &nbsp;<br />
                &nbsp;<br />




