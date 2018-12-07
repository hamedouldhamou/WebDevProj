<?php
//connect to mysql database

$host = "localhost";
$user = "houldhamou1";
$pass = "houldhamou1";
$db = "houldhamou1";

$con = mysqli_connect($host, $user, $pass, $db) or die("Connection Error " . mysqli_error($con));
