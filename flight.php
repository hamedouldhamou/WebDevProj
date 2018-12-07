<?php

session_start();
include_once('db.php');

//Go to home page if no user is logged in
if(isset($_SESSION['username'])=="") {
    header("Location: login.php");
}

//if (isset($_POST['submit'])) {
//    $location = mysqli_real_escape_string($con, $_POST["Location"]);
//
//    $flightDate = $_POST["date"];

//}

//$query = "SELECT * FROM Plane WHERE Location ='$location' AND Available = 1";
//
//$response = mysqli_query($con, $query);


?>
<html>
<head class="header"><title>Final Project</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="navbar.css"/>
</head>
<style>
    body {
        background-image: url("flight.jpg");
        background-size: cover;
    }
</style>
<body>
<div class="container">
    <div class="content-head">
        <h1>Final Project</h1>
        <ul>
            <?php if (isset($_SESSION['username'])) { ?>
                <li><a href="main.php">Home</a></li>
                <li><a href="flightPick.php">Flight</a></li>
                <li><a href="carRentPick.php">Rent Car</a></li>
                <li><a href="prePayParking.php">Parking</a></li>
                <li style="float:right"><a class="active" href="#">User: <?php echo $_SESSION['username']; ?></a></li>
                <li style="float:right"><a href="logout.php">Logout</a></li>
                <li style="float:right"><a href="viewcart.php">Cart</a></li>
            <?php } else { ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Sign Up</a></li>
            <?php } ?>
        </ul>
        <br/><br/>
    </div>

<!--    TODO 1: Create a flight from and To locations-->
<!--    TODO 2: FLights name instead of Plane and seat number-->
    <div class="content-main">
        <?php
        $location = mysqli_real_escape_string($con, $_POST["Location"]);
        $flightDate = $_POST["date"];

        $query = "SELECT * FROM Plane WHERE Location = '$location' AND Available = 1";

        $response = mysqli_query($con, $query);


        echo "You have selected location: " . $location . '.<br><br>';
        echo "Date: " . $flightDate . '<br><br>';

        $endDate = date('Y-m-d', strtotime($flightDate . '+30 days'));
        echo "Available seats for the next 30+ days (" . $endDate . ") from selection" .'<br><br>';

        if ($response == null) {
            echo "this is not possible";
        } else {
            echo "<form action='viewcart.php' method='post'>";
            if ($response->num_rows > 0) {
                while ($row = $response->fetch_assoc()) {
                    echo "<input class='form-group' type='radio' name='radio' value='" . $row['SeatID'] . " ' />" .
                        $row['Seat'] . " - $" . $row['Price'];
                    echo "</br>";
                }
            }
            echo "<input type='submit' name='submit' value='submit'/>";
            echo "</form>";

        }

//        $flyFrom = $_POST['origin'];
//        $flyTo = $_POST['Destination'];
//        $flyDepart = $_POST['departDate'];
//
//
//        $d=strtotime($flyDepart);
//        $d1=strtotime("tomorrow $flyDepart");
//        $d2=strtotime("+2 day $flyDepart");
//        $d3=strtotime("+3 day $flyDepart");
//        $d4=strtotime("+4 day $flyDepart");
//        $d5=strtotime("+5 day $flyDepart");
//
//        $d6=strtotime("+0 hour");
//        $d7=strtotime("+2 hour");
//        $d8=strtotime('+2 hour');
//        $d9=strtotime('+4 hour');
//        $d10=strtotime('+2 hour');
//        $d11=strtotime('+3 hour');
//
//        $arrayName = array("Delta Airlines","American Airlines","United Airlines");
//        shuffle($arrayName);
//
//        $f1=date("h:ia - ", $d6).date("h:ia", $d7)."\t"."2 hrs"."\t"."Non Stop"."<br/><b>\t"
//            .$arrayName[0]."</b>\t".$flyFrom."-".$flyTo;
//
//        $f2=date("h:ia - ", $d8).date("h:ia", $d9)."\t"."2 hrs"."\t"."Non Stop"."<br/><b>"
//            .$arrayName[1]."</b>\t".$flyFrom."-".$flyTo;
//
//        $f3=date("h:ia - ", $d10).date("h:ia", $d11)."\t"."1 hrs"."\t"."Non Stop"."<br/><b>"
//            .$arrayName[2]."</b>\t".$flyFrom."-".$flyTo;
//
//        echo "<h4>Flights for ".date("l, d/m/Y", $d)." are listed below</h4>";
//
//        echo "<form action=\"card.php\" method=\"post\"> <input type=\"radio\" value='$f1' name=\"flight\"><div class=\"ticket\">".$f1."</div><br/><br/>";
//
//        echo "<input type=\"radio\" value='$f2' name=\"flight\"><div class=\"ticket\">".$f2."</table><br/><br/>";
//
//        echo "<input type=\"radio\" name=\"flight\" value='$f3'><div class=\"ticket\">".$f3."</div><br/><br/><input type=\"submit\" name=\"send1\" value=\"Check Out\"/><br/><br/></form>";



        ?>


    </div>
</div>

</body>
</html>
