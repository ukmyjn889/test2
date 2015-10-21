<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 10/5/2015
 * Time: 11:50 PM
 */
include_once "view/adminViewHead.php";

?>
<form action="saveStudentProfile.php" method="post">
    <table border="0" cellspacing="0" cellpadding="0" width="523">
        <tr>
            <td width="523" class="pageName">please add student info</td>
        </tr>

        <tr>
            <td class="bodyText"><p>
                <table width="510" height="265">
                    <tr>
                        <td width="165"><strong>student id
                            </strong>
                        <td width="165"><input id="sid" type="text" style="color:#999999"
                                               onFocus="if(value==defaultValue){value='';this.style.color='#000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999'}"value="please enter student id" size="45"/><br>
                            <div id="siderror"style="color:red"><span></span></div>
                    </tr>
                    <tr>
                        <td width="165"><strong>major
                            </strong>
                        <td width="165"><input id="major" type="text" style="color:#999999"
                                               onFocus="if(value==defaultValue){value='';this.style.color='#000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999'}"value="please enter major" size="45"/>
                            <div id="majorerror"style="color:red"><span></span></div>
                    </tr>

                    <tr>
                        <td width="165"><strong>student name
                            </strong>
                        <td width="165"><input id="name" type="text" style="color:#999999"
                                               onFocus="if(value==defaultValue){value='';this.style.color='#000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999'}"value="please enter student name" size="45"/>
                            <div id="snameerror"style="color:red"><span></span></div>
                    </tr>
                    <tr>
                        <td width="165"><strong>grade
                            </strong>
                        <td width="165"><input id="grade" type="text" style="color:#999999"
                                               onFocus="if(value==defaultValue){value='';this.style.color='#000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999'}"value="please enter grade" size="45"/>
                            <div id="gradeerror"style="color:red"><span></span></div>
                    </tr>
<!--                    <tr>-->
<!--                        <td width="165"><strong>OTHER-->
<!--                            </strong>-->
<!--                        <td width="165"><input id="other" type="text" style="color:#999999"-->
<!--                                               onFocus="if(value==defaultValue){value='';this.style.color='#000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999'}"value="other" size="45"/>-->
<!--                            <div id="othererror"style="color:red"><span></span></div>-->
<!--                    </tr>-->

                </table>

        </tr>

    </table>
    <p align="center">&nbsp;</p>
    <p align="center"id="subCourse">
        <input name="submit" type="button" value="submit" onclick="check()" />
        <input name="reset" type="reset" value="clear">
    </p>
</form>
<?php
include_once "view/adminViewTail.php";
?>