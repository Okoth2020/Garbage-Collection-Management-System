<?php 
    session_start();
    require_once "../../../db/database.php";

    if (isset($_SESSION["id"])) {
        $id = $_SESSION["id"];
        $sql = "SELECT * FROM admin_auth WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        $admin = mysqli_fetch_array($result, MYSQLI_ASSOC);
    } else {
        header("Location: login.php");
    }
?>

<?php 
$title = "Requests";
$styles = "../../../css/admin/driver/add_driver.css";
$navbar_script = "../../../js/navbar.js";
ob_start();
include_once "../header.php";
$buffer = ob_get_contents();
ob_end_clean();
$buffer = str_replace("%TITLE%", $title, $buffer);
$buffer = str_replace("%STYLESHEET%", $styles, $buffer);
$buffer = str_replace("%SCRIPT%", $navbar_script, $buffer);
echo $buffer;
?>
<body>
<?php 
    $logout = "../logout.php";
    ob_start();
    include_once "../navbar.php";
    $buffer = ob_get_contents();
    ob_end_clean();
    $buffer = str_replace("%LOGOUT%", $logout, $buffer);
    echo $buffer;
    ?>
    <main>
        <div class="side-bar">
            <div class="profile-summary">
            <div class="profile-image">
                <img src="../../../images/avatar.jpeg" alt="" />
            </div>
            <div class="profile-title">Admin</div>
            <div class="profile-name"><?php echo $admin["first_name"] . " " . $admin["last_name"] ?></div>
            <div class="profile-email"><?php echo $admin["email"] ?></div>
            </div>
            <ul class="side-links">
                <a href="../dashboard.php">
                <li>
                    <i class="fa-solid fa-house"></i>
                    <span>dashboard</span>
                </li>
                </a>
                <li>
                    <i class="fa-solid fa-id-card"></i>
                    <span>driver</span>
                    <ul>
                        <a href="./add_driver.php"><li class="active">- add driver</li></a>
                        <a href="./manage_driver.php"><li>- manage driver</li></a>
                    </ul>
                </li>
                <a href="../user/registered_users.php">
                <li>
                    <i class="fa-solid fa-user"></i>
                    <span>user</span>
                </li>
                </a>
                <a href="../user/requests.php">
                <li>
                    <i class="fa-solid fa-clipboard-question"></i>
                    <span>requests</span>
                </li>
                </a>
            </ul>
        </div>
        <div class="container">
            <div class="content-title">Add Driver</div>
            <div class="content">
                <div class="content-wrapper">
                    <?php
                    if (isset($_POST["add_driver"])) {
                        $driver_id = strtoupper(uniqid());
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
                            $driver_sql = "INSERT INTO drivers (
                                driver_id,
                                first_name, 
                                last_name,
                                mobile_number, 
                                email, 
                                address, 
                                password
                            ) VALUES ('$driver_id', '$first_name', '$last_name', '$number', '$email', '$address', '$password')";
                            $committed = mysqli_query($conn, $driver_sql);
                            if ($committed) {
                                header("Location: manage_driver.php");
                            } else {
                                die("Database Query Error");
                            }
                        }
                    }
                    ?>
                    <form action="" method="post">
                        <?php 
                        if (isset($_POST["add_driver"])) {
                            if ($first_name == "") {
                                echo '<label for="first-name">First Name</label>
                                <div><input type="text" name="first_name"></div>';
                            } else {
                                echo '<label for="first-name">First Name</label>
                                <div><input type="text" name="first_name" value="' . $first_name . '"></div>';
                            }
                        } else {
                            echo '<label for="first-name">First Name</label>
                            <div><input type="text" name="first_name"></div>';
                        }
                        ?>
                        <?php 
                        if (isset($_POST["add_driver"])) {
                            if ($last_name == "") {
                                echo '<label for="last-name">Last Name</label>
                                <div><input type="text" name="last_name"></div>';
                            } else {
                                echo '<label for="last-name">Last Name</label>
                                <div><input type="text" name="last_name" value="' . $last_name . '"></div>';
                            }
                        } else {
                            echo '<label for="last-name">Last Name</label>
                            <div><input type="text" name="last_name"></div>';
                        }
                        ?>
                        <?php 
                        if (isset($_POST["add_driver"])) {
                            if ($number == "") {
                                echo '<label for="number">Mobile Number</label>
                                <div><input type="tel" name="number"></div>';
                            } else {
                                echo '<label for="number">Mobile Number</label>
                                <div><input type="tel" name="number" value="' . $number . '"></div>';
                            }
                        } else {
                            echo '<label for="number">Mobile Number</label>
                            <div><input type="tel" name="number"></div>';
                        }
                        ?>
                        <?php 
                        if (isset($_POST["add_driver"])) {
                            if ($email == "") {
                                echo '<label for="email">Email</label>
                                <div><input type="email" name="email"></div>';
                            } else {
                                echo '<label for="email">Email</label>
                                <div><input type="email" name="email" value="' . $email . '"></div>';
                            }
                        } else {
                            echo '<label for="email">Email</label>
                            <div><input type="email" name="email"></div>';
                        }
                        ?>
                        <?php 
                        if (isset($_POST["add_driver"])) {
                            if ($address == "") {
                                echo '<label for="address">Address</label>
                                <div><input type="text" name="address"></div>';
                            } else {
                                echo '<label for="address">Address</label>
                                <div><input type="text" name="address" value="' . $address . '"></div>';
                            }
                        } else {
                            echo '<label for="address">Address</label>
                            <div><input type="text" name="address"></div>';
                        }
                        ?>
                        <?php 
                        if (isset($_POST["add_driver"])) {
                            if ($password == "") {
                                echo '<label for="password">Password</label>
                                <div><input type="password" name="password"></div>';
                            } else {
                                echo '<label for="password">Password</label>
                                <div><input type="password" name="password" value="' . $password . '"></div>';
                            }
                        } else {
                            echo '<label for="password">Password</label>
                            <div><input type="password" name="password"></div>';
                        }
                        ?>
                        <button type="submit" name="add_driver">Add</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </main>
</html>