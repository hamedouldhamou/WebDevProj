<?php

session_start();
?>

<!DOCTYPE html>
<html>
<head>
<body>
  <a href="login.php">Logout</a>

<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "vpatel52";

$r = mysqli_connect($host, $user, $pass, $db);
if(mysqli_connect_errno()){
  echo "chasdas" . mysqli_connect_error;
}

$id =$_SESSION["userID"];
$total = $_SESSION['total'];
echo $total;
$query = "INSERT INTO Checkout(UserID, Spot, Plane, Price) SELECT UserID, Spot, Plane, Price FROM Cart Where UserID = $id";
$response = mysqli_query($r, $query);
$query="INSERT INTO Checkout(Price) '$total' WHERE UserID = '$id'";
$query = "SELECT * From Checkout WHERE UserID=$id";
$response = mysqli_query($r, $query);
$row = mysqli_fetch_row($response);
$spot = $row[2];
echo $spot;
$plane = $row[3];


$query = "UPDATE Parking SET Available = 0 WHERE ParkingID =  '$spot'";
$response = mysqli_query($r, $query);
$query = "UPDATE Plane SET Available = 0 WHERE SeatID =  '$plane'";
$response = mysqli_query($r, $query);








 ?>

</body>
</html>
