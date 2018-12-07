<?php

// Start session
session_start();

//Connect to the database
include_once('db.php');

if (isset($_REQUEST["username"])) {
    $firstname = mysqli_real_escape_string($con, $_REQUEST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_REQUEST['lastname']);
    $username = mysqli_real_escape_string($con, $_REQUEST['username']);
    $password = mysqli_real_escape_string($con, $_REQUEST['password']);
    $query = "INSERT INTO Users(Username, Password, Firstname, Lastname) VALUES('$username','$password','$firstname','$lastname')";
    $response = mysqli_query($con, $query);
    if ($response) {
        $success = "Register Success! <a href='login.php'>Click here to go to Login</a>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>New User Registration</title>
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
            <form method="post" action="">
                    <h3>New User Registration</h3>
                    <div class="form-group">
                        <label for="name">First Name </label>
                        <input type="text" name="firstname" id="firstname" placeholder="First Name" required/></div>

                    <div class="form-group">
                        <label for="name">Last Name </label>
                        <input type="text" name="lastname" id="lastname" placeholder="Last Name" required/></div>

                    <div class="form-group">
                        <label for="name">Username </label>
                        <input type="text" name="username" id="username" placeholder="Username" required/></div>

                    <div class="form-group">
                        <label for="name">Password </label>
                        <input type="password" name="password" id="password" placeholder="Password" required/>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" id="register" value="Register" class="button-main"/>
                    </div>

            </form>
            <div class="form-group">
                <p>Already registered? <a href="login.php"> Login here </a></p>
            </div>
            <span><?php if (isset($success)) {
                    echo $success;
                } ?></span>
        </div>
    </div>

</div>
</body>
</html>
