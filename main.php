<?php
session_start();

include_once('db.php')
?>

<!DOCTYPE html>
<html>
<head class="header"><title>Final Project</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="navbar.css"/>
</head>
<style>
    body {
        background-image: url("airport_home.jpg");
        background-size: cover;
    }
</style>
<body>
<div class="container">
    <div class="content-head">
        <h1>Final Project</h1>
        <ul>
            <?php if (isset($_SESSION['username'])) { ?>
                <li><a href="flightPick.php">Flight</a></li>
                <li><a href="carRentPick.php">Rent Car</a></li>
                <li><a href="prePayParking.php">Parking</a></li>
                <li style="float:right"><a class="active" href="#">User: <?php echo $_SESSION['username']; ?></a></li>
                <li style="float:right"><a href="logout.php">Logout</a></li>
                <li style="float:right"><a href="viewcart.php">Cart</a></li>

            <?php } else { ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            <?php } ?>
        </ul>
        <br/><br/>
    </div>

    <div class="content-main">

        <?php if (isset($_SESSION['username']) != "") {
            echo "<h4>Welcome " . $_SESSION['username'] . "</h4>";
            echo " <p>Please make a selection from one of the options on the nav bar.</p>";
        } else {
            echo "<h4>Welcome Guest</h4>";
            echo "<p>Please register at the top.</p>";
        }

        ?>


        <p>Today is <?php echo date("m/d/Y"); ?></p>


    </div>

</div>

</body>
</html>