<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>div+css+js实现菜单的收缩与展开</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        @import url(../../css/showc.css);

    </style>
    <script type="text/javascript">
        var lastFaqClick=null;
        window.onload=function(){
            var faq=document.getElementById("faq");
            var dls=faq.getElementsByTagName("dl");
            for (var i=0,dl;dl=dls[i];i++){
                var dt=dl.getElementsByTagName("dt")[0];//取得标题
                dt.id = "faq_dt_"+(Math.random()*100);
                dt.onclick=function(){
                    var p=this.parentNode;//取得父节点
                    if (lastFaqClick!=null&&lastFaqClick.id!=this.id){
                        var dds=lastFaqClick.parentNode.getElementsByTagName("dd");
                        for (var i=0,dd;dd=dds[i];i++)
                            dd.style.display='none';
                    }
                    lastFaqClick=this;
                    var dds=p.getElementsByTagName("dd");//取得对应子节点，也就是说明部分
                    var tmpDisplay='none';
                    if (gs(dds[0],'display')=='none')
                        tmpDisplay='block';
                    for (var i=0;i<dds.length;i++)
                        dds[i].style.display=tmpDisplay;
                }
            }
        }

        function gs(d,a){
            if (d.currentStyle){
                var curVal=d.currentStyle[a]
            }else{
                var curVal=document.defaultView.getComputedStyle(d, null)[a]
            }
            return curVal;
        }
        function showSem(value){



            for(var i=1;i<10-value;i++){

                var a="sem0"+(10-i);

                document.getElementById(a).style.display="none"


            }





        }
    </script>
</head>
<body>
<input type="button" value="123" onclick="showSem(5)">
<ul id="faq">

    <li id="sem01">
        <dl>
            <dt>semester1</dt>
            <dd>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br></dd>
        </dl>
    </li>

    <li id="sem02">
        <dl>
            <dt>semester2</dt>
            <dd> 123<input type="checkbox"><br>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br></dd>
        </dl>
    </li>
    <li id="sem03">
        <dl>
            <dt>semester3</dt>
            <dd>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br></dd>
        </dl>
    </li>
    <li id="sem04">
        <dl>
            <dt>semester4</dt>
            <dd>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br></dd>
        </dl>
    </li>
    <li id="sem05">
        <dl>
            <dt>semester5</dt>
            <dd>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br></dd>
        </dl>
    </li>
    <li id="sem06">
        <dl>
            <dt>semester6</dt>
            <dd>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br></dd>
        </dl>
    </li>
    <li id="sem07">
        <dl>
            <dt>semester7</dt>
            <dd>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br></dd>
        </dl>
    </li>
    <li id="sem08">
        <dl>
            <dt>semester8</dt>
            <dd>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br></dd>
        </dl>
    </li>
    <li id="sem09">
        <dl>
            <dt>semester9</dt>
            <dd>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br>
                123<input type="checkbox"><br></dd>
        </dl>
    </li>
</ul><br><br>
<div id="creditinfo" stylr=vertical-align: middle>
    <center>
        According to your major profile:<br>
        the total credit you need is <input id="totalc" type="text"><br>
        which contains <input id="ccourse" type="text">credits for core courses<br>
        which conains<input id="ecourse" type="text">credits for elective courses
    </center>
</div><br><br>
<div id="currinfo">
    <center>
        currents status:<br>
        you already choosed<input id="currc" type="text">credits for core courses<br>
        you already choosed<input id="curre" type="text">credits for elective courses

    </center>
</div>
</body>
</html>