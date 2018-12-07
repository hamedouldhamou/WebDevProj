<?php

session_start();

include_once('db.php');

//Go to home page if no user is logged in
if(isset($_SESSION['username'])=="") {
    header("Location: login.php");
}

//if (isset($_POST['submit'])) {
//    $location = mysqli_real_escape_string($con, $_POST["Location"]);
//    echo "You have selected:" . $location;
//
//    $date = $_POST["date"];
//    echo "You have entered" . $date;
//
//    $endDate = date('Y-m-d', strtotime($date . '+30 days'));
//    echo $endDate;
//}
//$query = "SELECT * FROM Car WHERE Location ='$location' AND Available = 1";
//
//$response = mysqli_query($con, $query);
//
//
//if ($response == null) {
//    echo "this is not possibel";
//} else {
//    echo "<form action='viewcart.php' method='post'>";
//    if ($response->num_rows > 0) {
//
//        while ($row = $response->fetch_assoc()) {
//            echo "<input type='radio' name='radio' value='" . $row['CarID'] . " ' />" . $row['Car'] . " " . $row['Price'];
//            echo "</br>";
//        }
//    }
//    echo "<input type='submit' name='submit' value='submit'/>";
//    echo "</form>";
//
//}

?>

<html>
<head class="header"><title>Final Project</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="navbar.css"/>
</head>
<style>
    body {
        background-image: url("carparking.jpg");
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
                <li><a href="register.php">Register</a></li>
            <?php } ?>
        </ul>
        <br/><br/>
    </div>

    <div class="content-main">
        <?php
        $location = mysqli_real_escape_string($con, $_POST["Location"]);
        $flightDate = $_POST["date"];

        $query = "SELECT * FROM Car WHERE Location ='$location' AND Available = 1";

        $response = mysqli_query($con, $query);


        echo "You have selected location: " . $location . '.<br><br>';
        echo "Date: " . $flightDate . '<br><br>';

        $endDate = date('Y-m-d', strtotime($flightDate . '+5 days'));
        echo "Current available cars:" .'<br><br>';

        if ($response == null) {
            echo "this is not possible";
        } else {
            echo "<form action='viewcart.php' method='post'>";
            if ($response->num_rows > 0) {
                while ($row = $response->fetch_assoc()) {
                    echo "<input class='form-group' type='radio' name='radio' value='" . $row['CarID'] . " ' />".
                        $row['Car']  . " - $" . $row['Price'];;
                    echo "</br>";
                }
            }
            echo "<input class='button-main' type='submit' name='submit' value='submit'/>";
            echo "</form>";

        }
        ?>
    </div>
</div>

</body>
</html>
