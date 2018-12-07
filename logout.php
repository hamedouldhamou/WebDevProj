<?php
session_start();

include_once('db.php');

if(isset($_SESSION['username'])!="") {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['userID']);
    header("Location: main.php");
} else {
    header("Location: main.php");
}
?>