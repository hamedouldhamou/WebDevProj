<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head class="header"><title>Final Project</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="navbar.css"/>
</head>
<style>
    body{
        background-image: url("airport_home.jpg");
        background-size: cover;
    }
</style>
<body>
<div class="container">
    <div class="content-head">
        <h1>Final Project</h1>
        <ul>
            <li><a href="flight.html">Flight</a></li>
            <li><a href="prePaid.html">Parking</a></li>
            <li style="float:right"><a class="active" href="#about">About</a></li>
        </ul>
        <br/><br/>
    </div>

    <div class="content-main">
        <h4>Welcome <?php echo $_SESSION['username']?></h4>


        <p>The time is now <?php echo date("h:i:s")?></p>

        <p>Please make a selection from one of the options on the nav bar.</p>
    </div>

</div>

</body>
</html>
