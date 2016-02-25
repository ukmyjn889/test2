<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <title>Bootstrap Example</title>-->
<!--    <meta charset="utf-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->
<!--    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
<!--</head>-->
<!--<body>-->
<?php
include_once "adminView.php"?>
<br><br><br>
<a href="#" data-toggle="tooltip" title="Hooray!">Hover over me</a>


<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<?php include_once "adminViewEnd.php"?>
