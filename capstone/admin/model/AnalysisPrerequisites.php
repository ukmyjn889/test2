<?php
//$con=mysql_connect("localhost:3306","root","5656123ljx");
//if(!$con){
//    die('Could not connect: ' . mysql_error());
//}
//mysql_select_db("capstone",$con);
//$sql="select prerequisites from Course WHERE cid='"."CHM325L"."'";
//
//$result=mysql_query($sql);
//$row=mysql_fetch_array($result);
//$prerequisites=$row[0];
$prerequisites=$_POST["prerequisites"];
//echo $prerequisites;
if($prerequisites!=null) {
 echo printStack(analysis($prerequisites));
}
function analysis($prerequisites){
    $array=explode(" ",$prerequisites);
    //print_r($array);
    $stack=array();
    $i=0;

    do{
        if($array[$i]=="("){
            array_push($stack,"(");
        }else if($array[$i]=="∧"||$array[$i]=="∨"){
            array_push($stack,$array[$i]);
        }else if($array[$i]==")") {

            $temp = array_pop($stack);

            $p = array_pop($stack);

            //remove parentheses
            $flag=0;
            $flag = count($stack);

            if($flag==0){
                array_push($stack,$temp);
            }else{

                if(!($p=="∧"||$p=="∨")){


                    if(count($stack)!=0){
                        // $p=array_pop($stack);
                        //判断是否前面以为是and 或or
                        $flag=0;
                        if($p="("){
                            if(count($stack)!=0) {
                                $p = array_pop($stack);
                                $flag=1;

                            }
                        }
                        if($p=="∧"||$p=="∨"){
                            $ATemp=array_pop($stack);
                            if($flag==0) {
                                array_pop($stack);
                            }
                            if(gettype($ATemp)!="array"){
                                $x=array();
                                $x[0]=$ATemp;
                                $ATemp=$x;
                            }if(gettype($temp)!="array"){
                                $x=array();
                                $x[0]=$temp;
                                $temp=$x;
                            }
                            if($p=="∧"){
                                for($x=0;$x<count($temp);$x++){
                                    array_push($ATemp,$temp[$x]);
                                }


                            }else if($p=="∨"){
                                $max=0;
                                if(count($temp)>count($ATemp)){
                                    for($x=0;$x<count($ATemp);$x++){
                                        for($y=0;$y<count($temp);$y++){
                                            $temp[$y]=$temp[$y]." ∨ ".$ATemp[$x];
                                        }
                                    }
                                    $ATemp=$temp;
                                }else{
                                    for($x=0;$x<count($temp);$x++){
                                        for($y=0;$y<count($ATemp);$y++){
                                            $ATemp[$y]=$ATemp[$y]." ∨ ".$temp[$x];
                                        }
                                    }
                                }


                            }
                            array_push($stack,$ATemp);
                        }else{
                            array_push($stack,$p);
                            array_push($stack,$temp);
                        }
                    }
                }else{

                    $anotherTemp=array_pop($stack);
                    array_pop($stack);
                    if(gettype($anotherTemp)!="array"){
                        $x=array();
                        $x[0]=$anotherTemp;
                        $anotherTemp=$x;
                    }if(gettype($temp)!="array"){
                        $x=array();
                        $x[0]=$temp;
                        $temp=$x;
                    }
                    if($p=="∧"){
                        for($x=0;$x<count($temp);$x++){
                            array_push($anotherTemp,$temp[$x]);
                        }


                    }else if($p=="∨"){
                        for($x=0;$x<count($temp);$x++){
                            for($y=0;$y<count($anotherTemp);$y++){
                                $anotherTemp[$y]=$anotherTemp[$y]." ∨ ".$temp[$x];
                            }
                        }

                    }
                    if(count($stack)!=0){
                        $p=array_pop($stack);
                        //判断是否前面以为是and 或or
                        if($p=="∧"||$p=="∨"){
                            $ATemp=array_pop($stack);
                            array_pop($stack);
                            if(gettype($ATemp)!="array"){
                                $x=array();
                                $x[0]=$ATemp;
                                $ATemp=$x;
                            }if(gettype($anotherTemp)!="array"){
                                $x=array();
                                $x[0]=$anotherTemp;
                                $anotherTemp=$x;
                            }
                            if($p=="∧"){
                                for($x=0;$x<count($anotherTemp);$x++){
                                    array_push($ATemp,$anotherTemp[$x]);
                                }
                            }else if($p=="∨") {
                                if (count($anotherTemp) > count($ATemp)) {
                                    for ($x = 0; $x < count($anotherTemp); $x++) {
                                        for ($y = 0; $y < count($ATemp); $y++) {
                                            $anotherTemp[$y] = $anotherTemp[$y] . " ∨ " . $ATemp[$x];
                                        }
                                    }
                                    $ATemp=$anotherTemp;

                                }else{
                                    for ($x = 0; $x < count($anotherTemp); $x++) {
                                        for ($y = 0; $y < count($ATemp); $y++) {
                                            $ATemp[$y] = $ATemp[$y] . " ∨ " . $anotherTemp[$x];
                                        }
                                    }
                                }
                            }
                            array_push($stack,$ATemp);
                        }else{
                            array_push($stack,$p);
                            array_push($stack,$anotherTemp);
                        }
                    }

                }
            }


        }else{
            if(count($stack)==0){
                $x=array();
                $x[0]=$array[$i];
                array_push($stack,$x);
            }else{
                $p=array_pop($stack);

                if(!($p=="∧"||$p=="∨")){

                    array_push($stack,$p);
                    array_push($stack,$array[$i]);
                }else{

                    $temp=array_pop($stack);
                    if(gettype($temp)!="array"){
                        $x=array();
                        $x[0]=$temp;
                        $temp=$x;
                    }
                    if($p=="∧"){
                        array_push($temp,$array[$i]);
                        array_push($stack,$temp);
                    }else if($p=="∨"){
                        for($x=0;$x<count($temp);$x++){
                            $temp[$x].=" ∨ ".$array[$i];
                        }
                        array_push($stack,$temp);
                    }

                }
            }
        }
        $i++;
    }while($i<count($array));
    return $stack;
}
function printStack($stack){
    $response="";
        for($x=0;$x<count($stack[0]);$x++){
        $response.= ($x+1).".";
        $response.= $stack[0][$x];
        $response.= "<br/>";
    }
    return $response;
}



//mysql_close();
?>