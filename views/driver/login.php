<?php 
session_start();
if (isset($_SESSION["driver"])) {
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../css/driver/driver.css">
    <title>Driver Login</title>
</head>
<body>
    <main>
            <div class="project-title">Garbage Collection Management System</div>
            <?php 
            if (isset($_POST["login"])) {
                $driver_id = $_POST["driver_id"];
                $password = $_POST["password"];

                if ($driver_id == "") {
                    echo '
                    <div class="form-warning">
                        <img src="../../images/error.png" alt="">
                        <span>Please enter your email</span>
                    </div>';
                } else if ($password == "") {
                    echo '
                    <div class="form-warning">
                        <img src="../../images/error.png" alt="">
                        <span>Please enter your password</span>
                    </div>';
                } else {
                    require_once "../../db/database.php";
                    $sql = "SELECT * FROM drivers where email='$driver_id' AND password='$password'";
                    $results = mysqli_query($conn, $sql);
                    $driver = mysqli_fetch_array($results, MYSQLI_ASSOC);
                    if ($driver) {
                        $_SESSION["driver"] = $driver;
                        header("Location: dashboard.php");
                    } else {
                        echo '
                        <div class="form-warning">
                            <img src="../../images/error.png" alt="">
                            <span>User with that username does not exist</span>
                        </div>';
                    }
                }
            }
            ?>
            <form action="" method="post">
                <div class="form-heading">Log into your Account</div>
                <div>
                <?php 
                if (isset($_POST["login"])) {
                    if ($driver_id == "") {
                        echo '<input type="text" name="driver_id" id="driver-id" placeholder="Email" />';
                    } else {
                        echo '<input type="text" name="driver_id" id="driver-id" placeholder="Email" value="' . $driver_id . '" />';
                    }
                } else {
                    echo '<input type="text" name="driver_id" id="driver-id" placeholder="Driver Email" />';
                }
                ?>
                </div>
                <div>
                <?php 
                if (isset($_POST["login"])) {
                    if ($password == "") {
                        echo '<input type="password" name="password" id="password" placeholder="Password" />';
                    } else {
                        echo '<input type="password" name="password" id="password" placeholder="Password" value="' . $password . '" />';
                    }
                } else {
                    echo '<input type="password" name="password" id="password" placeholder="Password" />';
                }
                ?>
                </div>
                <div><button type="submit" name="login">LOGIN</button></div>
                <ul>
                    <li><a href="../../index.php">Back to Home</a></li>
                </ul>
            </form>

    </main>
    
</body>
</html>