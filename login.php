<?php

// Start session
session_start();

//Call the database connection
include_once 'db.php';

if(isset($_SESSION['username'])!="") {
    header("Location: main.php");
}

if (isset($_POST["username"])) {
    $username = stripslashes($_REQUEST['username']);
    $password = stripslashes($_REQUEST['password']);
    $query = "SELECT UserID From Users Where Username= '$username' AND Password='$password'";
    $response = mysqli_query($con, $query);
    $rows = mysqli_num_rows($response);
    if ($rows == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $row['id'];
        $row = mysqli_fetch_row($response);
        $_SESSION['userID'] = $row[0];
        header("Location: main.php");
    } else {
        echo "Nope";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css"/>

    <style>
        body {
            background: url("airport_home.jpg");
            background-size: cover;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="form-style form-bg">
            <form name="login" method="post">
                    <h3>Login</h3>
                    <div class="form-group">
                        <label for="name">Username </label>
                        <input type="text" name="username" id="username" placeholder="Username" required/></div>

                    <div class="form-group">
                        <label for="name">Password </label>
                        <input type="password" name="password" id="password" placeholder="Password" required/>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" id="login" value="Login" class="button-main"/>
                    </div>
                    <div class="form-group">
                        <p>Haven't registered yet? <a href="register.php"> Register here </a></p>
                    </div>
            </form>
        </div>
    </div>

</div>
</body>
</html>
