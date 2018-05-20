<?php

session_start();
date_default_timezone_set("Asia/Kolkata");
$host = "localhost";
$user = "root";
$pass = "";
$database = "private";
$link = mysqli_connect($host,$user,$pass) or die("Can'\t connect to Server.");

mysqli_select_db($link, $database) or die("Can'\t Find DataBase.");

?>