<html>
<style>
    .bor {
        border: 3px solid red;
        background-color: green;
        margin: auto;
    }

    th {
        border-right: 2px solid red;
    }

    .ticket {
        border: solid 1px darkgray;
        padding-right: 2px;
        margin: auto;
    }
</style>

<?php

session_start();

include_once('db.php');


if (isset($_POST['submit'])) {
    $location = $_POST["Location"];
    echo "You have selected:" . $location;

    $date = $_POST["date"];
    echo "You have entered" . $date;

    $endDate = date('Y-m-d', strtotime($date . '+30 days'));
    echo $endDate;
}
//
$query = "SELECT * FROM Parking WHERE Location ='$location' AND Available = 1";
// $query =  SELECT * FROM Car WHERE NOT (Dates>='$date' OR Dates=<'$endDate');
$response = mysqli_query($con, $query);


if ($response == null) {
    echo "this is not possible";
} else {
    echo "<form action='viewcart.php' method='post'>";
    if ($response->num_rows > 0) {

        while ($row = $response->fetch_assoc()) {
            echo "<input type='radio' name='radio' value='" . $row['ParkingID'] . " ' />" . $row['Spot'];
            echo "</br>";
        }
    }
    echo "<input type='submit' name='submit' value='submit'/>";
    echo "</form>";

}
?>


</html>
