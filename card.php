<?php

session_start();

include_once('db.php');

//Go to home page if no user is logged in
if (isset($_SESSION['username']) == "") {
    header("Location: login.php");
}
?>

<html>
<head>
    <title>Payment</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="navbar.css"/>
</head>
<style>
    body {
        background-color: cornflowerblue;
        font-size: medium;
    }

    .content-body {
        background: #f1f5f8;
        padding: 12px 12px 12px 24px;
        border-radius: 2px;
    }

    #main {
        font-weight: bold;
    }

    #fieldStyle {
        text-align: left;

    }

    table {
        background-color: darkgray;
    }

    .name {
        float: left;
    }

</style>
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
                <li style="float:right"><a href="viewcart.php">Cart</a></li>
            <?php } else { ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Sign Up</a></li>
            <?php } ?>
        </ul>
        <br/><br/>
    </div>

    <div class="content-body">
        <h1>Passenger information and payment</h1>

        <div id="main">
            <form action="flightConf.php" method="POST">
                <?php

//                if (isset($_POST['send1'])) {
//                    $flyConf = $_POST['flight'];
//                    echo $flyConf . "<br/><br/>";
//
//                }
                ?>
                Enter First Name:<input type="text" name="fname"/><br/><br/>
                Enter Last Name:<input type="text" name="lname"/><br/><br/>
                Enter Date of birth:<input type="text" name="birth"/><br/><br/>
                <div>
                    <h2>Pay with debit or credit card</h2>
                    <hr/>
                    <div style="text-align: center;"><h3>Billing Information</h3></div>
                    <input type="hidden" name="paymentType" value="Sale"/>
                    <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>"/>
                    <table style="width:100%">
                        <tr>
                            <td id="fieldStyle">First name :</td>
                            <td><input type="text" name="firstName" class="name" placeholder="enter first name"></td>

                        </tr>
                        <tr>
                            <td id="fieldStyle">Last name :</td>
                            <td><input type="text" name="lastName" class="name" placeholder="enter last name"></td>

                        </tr>
                        <tr>
                            <td id="fieldStyle">Card type :</td>
                            <td>
                                <select name="creditCardType">
                                    <option value="Visa" selected="selected">Visa</option>
                                    <option value="MasterCard">MasterCard</option>
                                    <option value="Discover">Discover</option>
                                    <option value="Amex">American Express</option>
                                </select>
                            </td>

                        </tr>
                        <tr>

                            <td id="fieldStyle">Card number :</td>
                            <td><input type="text" name="creditCardNumber" id="cardno" placeholder="enter card number"
                                       required="true"></td>
                        </tr>

                        <tr>
                            <td id="fieldStyle">Expiry date :</td>
                            <td>
                                <div id="date-div"><select name="expDateMonth">
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12" SELECTED="">12</option>
                                    </select></div>
                                <div id="year-div">
                                    <select name="expDateYear">
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td id="fieldStyle">CVV :</td>
                            <td><input type="text" name="cvv2Number" id="cvv" placeholder="cvv" required="true"></td>
                        </tr>
                        <tr>
                            <td id="fieldStyle">Amount( USD ) :</td>
                            <td><input type="text" name="amount" id="name" placeholder="enter amount "
                                       value="<?php echo $_SESSION['total']; ?>" disabled="true"></td>

                        </tr>
                        <tr>
                            <td id="fieldStyle">Address 1 :</td>
                            <td><input type="text" name="address1" id="name" placeholder="enter address "></td>
                        </tr>
                        <tr>
                            <td id="fieldStyle">Address 2 :</td>
                            <td><input type="text" name="address2" id="name" placeholder="enter address"></td>

                        </tr>
                        <tr>
                            <td id="fieldStyle">City :</td>
                            <td><input type="text" name="city" id="name" placeholder="enter city name"></td>

                        </tr>
                        <tr>
                            <td id="fieldStyle">State :</td>
                            <td>
                                <div id="date-div">
                                    <select id="state" name="state">
                                        <option value=""></option>
                                        <option value="AL">ALABAMA</option>
                                        <option value="AK">ALASKA</option>
                                        <option value="AR">ARKANSAS</option>
                                        <option value="AZ">ARIZONA</option>
                                        <option value="CA">CALIFORNIA</option>
                                        <option value="CO">COLORADO</option>
                                        <option value="CT">CONNECTICUT</option>
                                        <option value="DE">DELAWARE</option>
                                        <option value="DC">DISTRICT OF COLOMBIA</option>
                                        <option value="FL">FLORIDA</option>
                                        <option value="GA" SELECTED="">GEORGIA</option>
                                        <option value="HI">HAWAI</option>
                                        <option value="ID">IDAHO</option>
                                        <option value="IL">ILLINOIS</option>
                                        <option value="IN">INDIANA</option>
                                        <option value="IA">IOWA</option>
                                        <option value="KS">KANSAS</option>
                                        <option value="KY">KENTUCKY</option>
                                        <option value="LA">LOUISIANA</option>
                                        <option value="ME">MAINE</option>
                                        <option value="MD">MARYLAND</option>
                                        <option value="MA">MASSACHUSETTS</option>
                                        <option value="MI">MICHIGAN</option>
                                        <option value="MN">MINNESOTA</option>
                                        <option value="MS">MISSISSIPPI</option>
                                        <option value="MO">MISSOURI</option>
                                        <option value="MT">MONTANA</option>
                                        <option value="NE">NEBRASKA</option>
                                        <option value="NV">NEVADA</option>
                                        <option value="NH">NEW HAMPSHIRE</option>
                                        <option value="NJ">NEW JERSEY</option>
                                        <option value="NM">NEW MEXICO</option>
                                        <option value="NY">NEW YORK</option>
                                        <option value="NC">NORTH CAROLINA</option>
                                        <option value="ND">NORTH DAKOTA</option>
                                        <option value="OH">OHIO</option>
                                        <option value="OK">OKLAHOMA</option>
                                        <option value="OR">OREGON</option>
                                        <option value="PA">PENNSYLVANIA</option>
                                        <option value="RI">RHODE ISLAND</option>
                                        <option value="SC">SOUTH CAROLINA</option>
                                        <option value="SD">SOUTH DAKOTA</option>
                                        <option value="TN">TENNESSEE</option>
                                        <option value="TX">TEXAS</option>
                                        <option value="UT">UTAH</option>
                                        <option value="VT">VERMONT</option>
                                        <option value="VA">VIRGINIA</option>
                                        <option value="WA">WASHINGTON</option>
                                        <option value="WV">WEST VIRGINIA</option>
                                        <option value="WI">WISCONSIN</option>
                                        <option value="WY">WYOMING</option>
                                    </select>

                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td id="fieldStyle">Zip code :</td>
                            <td>
                                <input type="text" name="zip" id="name" placeholder="enter zip code">
                            </td>
                        </tr>
                        <tr>
                        </tr>
                        <tr>
                            <td id="fieldStyle">Phone Number :</td>
                            <td><input type="text" name="phone" id="name" placeholder="enter Phone number"></td>
                        </tr>
                    </table>
                    <br>
                    <div style="text-align: center;"><input class="button-main" style=" width: 20%;" type="submit"
                                                            id="buynow" name="payment"
                                                            value="Pay Now"></div>
                    <br>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>
