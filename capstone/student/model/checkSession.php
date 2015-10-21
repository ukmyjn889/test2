<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 10/13/2015
 * Time: 12:02 AM
 */
session_start();
if($_SESSION['sid']==null){
    header("location:invalidUser.html");
}
?>