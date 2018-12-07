<?php
session_start();

include_once 'db.php';

if (isset($_POST['payment'])) {
    $x = $_POST['firstName'];
    $y = $_POST['lastName'];
    $bAddress = $_POST['address1'];
    $ct = $_POST['city'];
//    $flyConf = $_POST['flight'];
    $st = $_POST['state'];
    $zip = $_POST['zip'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pay = $_POST['creditCardNumber'];
    $payFrom = substr($pay, -4);

//    echo "<h4>Payment details</h4>";
//    $bill = $x . " " . $y . "<br/>" . $bAddress . ", " . $ct . "<br/>" . $st . "-" . $zip . "<br/>Credited From: xxxx-xxxx-xxxx-" . $payFrom;
//    echo $bill . "<br/><br/>";
//
//    echo "<h4>Your flight details is mention below</h4>" . $fname . " " . $lname . "<br/>" . $flyConf;
//
//    $random_hash = substr(md5(uniqid(rand(), true)), 16, 16);
//    echo "Configuration number for your booking is: " . $random_hash;

}
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
        <h1>Checkout Processed</h1>
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

        <?php

        echo "<h4>Payment details</h4>";
        $bill = $x . " " . $y . "<br/>" . $bAddress . ", " . $ct . "<br/>" . $st . "-" . $zip . "<br/>Credited From: xxxx-xxxx-xxxx-" . $payFrom;
        echo $bill . "<br/><br/>";

        echo "<h4>Your flight details is mention below</h4>" . $fname . " " . $lname;// . $flyConf;
        echo "<p><b>Amount: </b> $" . $_SESSION['total']  . "<br>";

        $random_hash = substr(md5(uniqid(rand(), true)), 16, 16);
        echo "Configuration number for your booking is: " . $random_hash;

        $id = $_SESSION["userID"];
        $total = $_SESSION['total'];
        echo $total;

        $query = "INSERT INTO Checkout(UserID, Car, Spot, Plane, Price) SELECT UserID, Car, Spot, Plane, Price FROM Cart Where UserID = $id";
        $response = mysqli_query($con, $query);
        $query = "INSERT INTO Checkout(Price) '$total' WHERE UserID = '$id'";
        $query = "SELECT * From Checkout WHERE UserID=$id";
        $response = mysqli_query($con, $query);
        $row = mysqli_fetch_row($response);
        $car = $row[1];
        $spot = $row[2];
        echo $spot;
        $plane = $row[3];

        $query = "UPDATE Car SET Available = 0 WHERE CarID =  '$car'";
        $response = mysqli_query($con, $query);
        $query = "UPDATE Parking SET Available = 0 WHERE ParkingID =  '$spot'";
        $response = mysqli_query($con, $query);
        $query = "UPDATE Plane SET Available = 0 WHERE SeatID =  '$plane'";
        $response = mysqli_query($con, $query);


        ?>

    </div>
</div>
</body>
</html>
