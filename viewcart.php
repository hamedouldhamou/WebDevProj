<?php

session_start();

include_once('db.php');

//Go to home page if no user is logged in
if (isset($_SESSION['username']) == "") {
    header("Location: login.php");
}
$total = 0;
$_SESSION['total'] = $total;

?>

<!DOCTYPE html>
<html>
<head>
    <title>View Cart</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="navbar.css"/>

    <style>
        body {
            background: url("airport_home.jpg");
            background-size: cover;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content-head">
        <h1>Cart</h1>
        <ul>
            <?php if (isset($_SESSION['username'])) { ?>
                <li><a href="main.php">Home</a></li>
                <li><a href="flightPick.php">Flight</a></li>
                <li><a href="prePayParking.php">Parking</a></li>
                <li style="float:right"><a class="active" href="#">User: <?php echo $_SESSION['username']; ?></a></li>
                <li style="float:right"><a href="logout.php">Logout</a></li>

            <?php } else { ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Sign Up</a></li>
            <?php } ?>
        </ul>
        <br/><br/>
    </div>

    <div class="content-main">
        <?php

        echo "Hello <b>" . $_SESSION["username"] . "</b> this is your current cart. <br><br>";

        $id = $_SESSION["userID"];

        if (isset($_POST['submit'])) {
            $item = $_POST['radio'];  //  Displaying Selected Value

            $firstletter = substr($item, 0, 1);
//            echo "</br>";
//            echo $firstletter;
          
            if ($firstletter == "P") {
//                echo "goin here?";
                $query = "INSERT INTO Cart(UserID, Spot) VALUES($id,'$item') ON DUPLICATE KEY UPDATE UserID='$id', Spot='$item'";
                $response = mysqli_query($con, $query);
            } else {
//                echo "flight????";
                $query = "INSERT INTO Cart(UserID, Plane) VALUES($id,'$item') ON DUPLICATE KEY UPDATE UserID='$id', Plane='$item'";
                $response = mysqli_query($con, $query);
            }

            $total = 0;

            $query = "SELECT * From Cart WHERE UserID=$id";
            $response = mysqli_query($con, $query);
            $row = mysqli_fetch_row($response);
            $spot = $row[1];
            $plane = $row[2];

            echo "</br>";

            $query = "SELECT * From Plane WHERE SeatID='$plane'";
            $response = mysqli_query($con, $query);
            $row = mysqli_fetch_row($response);
            echo "<b>Plane Number: </b>" . $plane . "<br>";
            echo "<b>Plane:</b> ";
            echo $row[1] . " at " . $row[3] . "<br>";
            echo "<b>Price:</b> $" . $row[5] . "<br><br>";
            $total += $row[5];

          

            echo "</br>";

            $query = "SELECT * From Parking WHERE ParkingID='$spot'";
            $response = mysqli_query($con, $query);
            $row = mysqli_fetch_row($response);
            echo "<b>Parking Spot:</b> ";
            echo $row[1] . " at " . $row[3] . "<br>";
            echo "<b>Price:</b> $" . $row[5] . "<br><br>";
            $total += $row[5];

            $_SESSION['total'] = $total;


            $query = "UPDATE Cart SET Price = '$total' WHERE USERID = '$id'";
            $response = mysqli_query($con, $query);

        }


        echo "<br><br><br>";
        ?>

        <a href="card.php">
            <button class="button-main">Proceed to checkout</button>
        </a>

    </div>
</div>


</body>
</html>
