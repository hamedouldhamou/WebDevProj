<?php
session_start();

include_once ('db.php')
?>

<html>
<head class="header"><title>Final Project</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="navbar.css"/>
</head>
<style>
    body {
        background-image: url("carRental.jpg");
        background-size: cover;
    }

</style>
<body>
<div class="container">
    <div class="content-head">
        <h1>Rent-a-Car</h1>
        <ul>
            <?php if (isset($_SESSION['username'])) { ?>
                <li><a href="main.php">Home</a></li>
                <li><a href="flightPick.php">Flight</a></li>
                <li><a href="carRentPick.php">Rent Car</a></li>
                <li><a href="prePayParking.php">Parking</a></li>
                <li style="float:right"><a class="active" href="#">User: <?php echo $_SESSION['username'];?></a></li>
                <li style="float:right"><a href="logout.php">Logout</a></li>
                <li style="float:right"><a href="viewcart.php">Cart</a></li>

            <?php } else { ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Sign Up</a></li>
            <?php } ?>
        </ul>
        <br/><br/>
    </div>

    <div class="content-main">
        <form action="carRent.php" method="post">
            <h3>Select a location </h3>
            <select name="Location">
                <option value="Atlanta">Atlanta, GA</option>
                <option value="Chicago">Chicago, IL</option>
                <option value="San Fransisco">San Fransisco, CA</option>
                <option value="Denver">Denver, CO</option>
                <option value="Seattle">Seattle, WA</option>
                <option value="Houston">Houston, TX</option>
                <option value="Boston">Boston, MA</option>
                <option value="Miami">Miami, FL</option>
            </select>
            <br/>
            <h3>Enter A Date</h3>
            <label>Date</label>
            <input type="date" name="date"/>
            <input type="submit" name="submit" value="Submit"/>
        </form>
    </div>
</div>

</body>
</html>
