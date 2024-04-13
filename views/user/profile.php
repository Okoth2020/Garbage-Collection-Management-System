<?php 
session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
} else {
    header("Location: login.php");
}

$user_first_name = $user["first_name"];
$user_last_name = $user["last_name"];
$user_number = $user["phone_number"];
$user_email = $user["email"];
$user_username = $user["username"];
$user_password = $user["password"];
$title = "Profile";
$styles = "../../css/user/profile.css";
ob_start();
include_once "partials/header.php";
include_once "partials/navbar.php";
$buffer = ob_get_contents();
ob_end_clean();
$buffer = str_replace("%TITLE%", $title, $buffer);
$buffer = str_replace("%STYLESHEET%", $styles, $buffer);
echo $buffer;
?>
    <main>
      <div class="side-bar">
        <?php include_once "partials/profile.php" ?>
          <div class="side-links">
            <ul>
                <li>
                    <i class="fa-solid fa-house"></i> 
                    <a href="dashboard.php">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa-solid fa-user"></i>
                    <a href="profile.php">Profile</a>
                </li>
                <li>
                    <i class="fa-solid fa-clipboard-question"></i>
                    <a href="requests.php">Requests</a>
                </li>
                <li>
                    <i class="fa-solid fa-comment"></i>
                    <a href="comments.php">Comments</a>
                </li>
            </ul>
          </div>
      </div>
      <div class="main-content">
        <div class="content-title">Profile</div>
        <div class="content">
            <div class="content-wrapper">
                <?php
                if (isset($_POST["update_user"])) {
                    $first_name = $_POST["first_name"];
                    $last_name = $_POST["last_name"];
                    $number = $_POST["number"];
                    $email = $_POST["email"];
                    $username = $_POST["username"];
                    $password = $_POST["password"];

                    if ($first_name == "") {
                        echo '<div class="form-warning">Please enter your first name</div>';
                    } else if ($last_name == "") {
                        echo '<div class="form-warning">Please enter your last name</div>';
                    } else if ($number == "") {
                        echo '<div class="form-warning">Please enter your mobile number</div>';
                    } else if ($email == "") {
                        echo '<div class="form-warning">Please enter your email</div>';
                    } else if ($username == "") {
                        echo '<div class="form-warning">Please enter your username</div>';
                    } else if ($password == "") {
                        echo '<div class="form-warning">Please enter your password</div>';
                    } else {
                        $user_sql = "UPDATE users SET 
                        first_name='$first_name', 
                        last_name='$last_name',
                        phone_number='$number', 
                        email='$email',
                        username='$username',
                        password='$password'
                        WHERE username='$user_username'";
                        $results = mysqli_query($conn, $user_sql);
                        if ($results) {
                            echo '<div class="form-success">profile updated</div>';
                            $query_user_sql = "SELECT * FROM users WHERE username='$username'";
                            $query_user_results = mysqli_query($conn, $query_user_sql);
                            $query_user = mysqli_fetch_array($query_user_results, MYSQLI_ASSOC);
                            if ($query_user) {
                                $_SESSION["user"] = $query_user;
                            } else {
                                echo '<div class="form-warning">something went wrong in querying</div>';    
                            }
                        } else {
                            echo '<div class="form-warning">something went wrong in updating</div>';
                        }
                    }
                }
                ?>
                <form action="" method="post">
                    <?php 
                    if (isset($_POST["update_user"])) {
                        if ($first_name == "") {
                            echo '<label for="first-name">First Name</label>
                            <div><input type="text" name="first_name"></div>';
                        } else {
                            echo '<label for="first-name">First Name</label>
                            <div><input type="text" name="first_name" value="' . $first_name . '"></div>';
                        }
                    } else {
                        echo '<label for="first-name">First Name</label>
                        <div><input type="text" name="first_name" value="' . $user_first_name . '"></div>';
                    }
                    ?>
                    <?php 
                    if (isset($_POST["update_user"])) {
                        if ($last_name == "") {
                            echo '<label for="last-name">Last Name</label>
                            <div><input type="text" name="last_name"></div>';
                        } else {
                            echo '<label for="last-name">Last Name</label>
                            <div><input type="text" name="last_name" value="' . $last_name . '"></div>';
                        }
                    } else {
                        echo '<label for="last-name">Last Name</label>
                        <div><input type="text" name="last_name" value="' . $user_last_name . '"></div>';
                    }
                    ?>
                    <?php 
                    if (isset($_POST["update_user"])) {
                        if ($number == "") {
                            echo '<label for="number">Mobile Number</label>
                            <div><input type="tel" name="number"></div>';
                        } else {
                            echo '<label for="number">Mobile Number</label>
                            <div><input type="tel" name="number" value="' . $number . '"></div>';
                        }
                    } else {
                        echo '<label for="number">Mobile Number</label>
                        <div><input type="tel" name="number" value="' . $user_number . '"></div>';
                    }
                    ?>
                    <?php 
                    if (isset($_POST["update_user"])) {
                        if ($email == "") {
                            echo '<label for="email">Email</label>
                            <div><input type="email" name="email"></div>';
                        } else {
                            echo '<label for="email">Email</label>
                            <div><input type="email" name="email" value="' . $email . '"></div>';
                        }
                    } else {
                        echo '<label for="email">Email</label>
                        <div><input type="email" name="email" value="' . $user_email . '"></div>';
                    }
                    ?>
                    <?php 
                    if (isset($_POST["update_user"])) {
                        if ($username == "") {
                            echo '<label for="username">Username</label>
                            <div><input type="text" name="username"></div>';
                        } else {
                            echo '<label for="username">Username</label>
                            <div><input type="text" name="username" value="' . $username . '"></div>';
                        }
                    } else {
                        echo '<label for="username">Username</label>
                        <div><input type="text" name="username" value="' . $user_username . '"></div>';
                    }
                    ?>
                    <?php 
                    if (isset($_POST["update_user"])) {
                        if ($password == "") {
                            echo '<label for="password">Password</label>
                            <div><input type="password" name="password"></div>';
                        } else {
                            echo '<label for="password">Password</label>
                            <div><input type="password" name="password" value="' . $password . '"></div>';
                        }
                    } else {
                        echo '<label for="password">Password</label>
                        <div><input type="password" name="password" value="' . $user_password . '"></div>';
                    }
                    ?>
                    <button type="submit" name="update_user">Update</button>
                </form>
                
            </div>
        </div>
    </div>
</main>
<?php include_once "partials/footer.php" ?>