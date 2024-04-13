<?php 
require_once "../../../db/database.php";
$driver_id = $_GET["id"];
$sql = "SELECT * FROM drivers WHERE driver_id='$driver_id'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($result);
$driver = mysqli_fetch_array($result, MYSQLI_ASSOC);
$driver_first_name = $driver["first_name"];
$driver_last_name = $driver["last_name"];
$driver_number = $driver["mobile_number"];
$driver_email = $driver["email"];
$driver_address = $driver["address"];
$driver_password = $driver["password"];
?>

<div class="main-content">
    <div class="content-title">Add Driver</div>
    <div class="content">
        <div class="content-wrapper">
            <?php
            if (isset($_POST["update_driver"])) {
                $first_name = $_POST["first_name"];
                $last_name = $_POST["last_name"];
                $number = $_POST["number"];
                $email = $_POST["email"];
                $address = $_POST["address"];
                $password = $_POST["password"];

                if ($first_name == "") {
                    echo '<div class="form-warning">Please enter driver first name</div>';
                } else if ($last_name == "") {
                    echo '<div class="form-warning">Please enter driver last name</div>';
                } else if ($number == "") {
                    echo '<div class="form-warning">Please enter driver mobile number</div>';
                } else if ($email == "") {
                    echo '<div class="form-warning">Please enter driver email</div>';
                } else if ($address == "") {
                    echo '<div class="form-warning">Please enter driver address</div>';
                } else if ($password == "") {
                    echo '<div class="form-warning">Please enter driver password</div>';
                } else {
                    $driver_sql = "UPDATE drivers SET 
                    first_name='$first_name', 
                    last_name='$last_name',
                    mobile_number='$number', 
                    email='$email',
                    address='$address',
                    password='$password'
                    WHERE driver_id='$driver_id'";
                    $results = mysqli_query($conn, $driver_sql);
                    if ($results) {
                        echo '<div class="form-success">driver updated</div>';
                    } else {
                        echo '<div class="form-warning">something went wrong in updating</div>';
                    }
                }
            }
            ?>
            <form action="" method="post">
                <?php 
                if (isset($_POST["update_driver"])) {
                    if ($first_name == "") {
                        echo '<label for="first-name">First Name</label>
                        <div><input type="text" name="first_name"></div>';
                    } else {
                        echo '<label for="first-name">First Name</label>
                        <div><input type="text" name="first_name" value="' . $first_name . '"></div>';
                    }
                } else {
                    echo '<label for="first-name">First Name</label>
                    <div><input type="text" name="first_name" value="' . $driver_first_name . '"></div>';
                }
                ?>
                <?php 
                if (isset($_POST["update_driver"])) {
                    if ($last_name == "") {
                        echo '<label for="last-name">Last Name</label>
                        <div><input type="text" name="last_name"></div>';
                    } else {
                        echo '<label for="last-name">Last Name</label>
                        <div><input type="text" name="last_name" value="' . $last_name . '"></div>';
                    }
                } else {
                    echo '<label for="last-name">Last Name</label>
                    <div><input type="text" name="last_name" value="' . $driver_last_name . '"></div>';
                }
                ?>
                <?php 
                if (isset($_POST["update_driver"])) {
                    if ($number == "") {
                        echo '<label for="number">Mobile Number</label>
                        <div><input type="tel" name="number"></div>';
                    } else {
                        echo '<label for="number">Mobile Number</label>
                        <div><input type="tel" name="number" value="' . $number . '"></div>';
                    }
                } else {
                    echo '<label for="number">Mobile Number</label>
                    <div><input type="tel" name="number" value="' . $driver_number . '"></div>';
                }
                ?>
                <?php 
                if (isset($_POST["update_driver"])) {
                    if ($email == "") {
                        echo '<label for="email">Email</label>
                        <div><input type="email" name="email"></div>';
                    } else {
                        echo '<label for="email">Email</label>
                        <div><input type="email" name="email" value="' . $email . '"></div>';
                    }
                } else {
                    echo '<label for="email">Email</label>
                    <div><input type="email" name="email" value="' . $driver_email . '"></div>';
                }
                ?>
                <?php 
                if (isset($_POST["update_driver"])) {
                    if ($address == "") {
                        echo '<label for="address">Address</label>
                        <div><input type="text" name="address"></div>';
                    } else {
                        echo '<label for="address">Address</label>
                        <div><input type="text" name="address" value="' . $address . '"></div>';
                    }
                } else {
                    echo '<label for="address">Address</label>
                    <div><input type="text" name="address" value="' . $driver_address . '"></div>';
                }
                ?>
                <?php 
                if (isset($_POST["update_driver"])) {
                    if ($password == "") {
                        echo '<label for="password">Password</label>
                        <div><input type="password" name="password"></div>';
                    } else {
                        echo '<label for="password">Password</label>
                        <div><input type="password" name="password" value="' . $password . '"></div>';
                    }
                } else {
                    echo '<label for="password">Password</label>
                    <div><input type="password" name="password" value="' . $driver_password . '"></div>';
                }
                ?>
                <button type="submit" name="update_driver">Update</button>
            </form>
            
        </div>
    </div>
</div>