<?php 
session_start();
if (isset($_SESSION["user"])) {
    header("Location: dashboard.php");
} else {
    $first_name = "";
    $last_name = "";
    $username = "";
    $phone_number = "";
    $email = "";
    $password = "";

    if (isset($_POST["signup"])) {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $username = $_POST["username"];
        $phone_number = $_POST["phone_number"];
        $email = $_POST["email"];
        $password = $_POST["password"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="../../images/favicon.ico"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="../../css/user/usersignup.css" />
    <title>User Signup</title>
  </head>
  <body>
    <main>
        <div class="project-title">Garbage Collection Management System</div>
        <?php 
        if (isset($_POST["signup"])) {
            if ($first_name == "") {
                echo '
                <div class="form-warning">
                    <img src="../../images/error.png" alt="">
                    <span>Please enter your first name</span>
                </div>';
            } else if ($last_name == "") {
                echo '
                <div class="form-warning">
                    <img src="../../images/error.png" alt="">
                    <span>Please enter your last name</span>
                </div>';
            } else if ($username == "") {
                echo '
                <div class="form-warning">
                    <img src="../../images/error.png" alt="">
                    <span>Please enter your username</span>
                </div>';
            } else if ($phone_number == "") {
                echo '
                <div class="form-warning">
                    <img src="../../images/error.png" alt="">
                    <span>Please enter your phone number</span>
                </div>';
            }else if(!preg_match('/^[0-9]{10}+$/', $phone_number)){
                echo '
                <div class="form-warning">
                    <img src="../../images/error.png" alt="">
                    <span>Invalid phone number</span>
                </div>';
            }
             else if ($email == "") {
                echo '
                <div class="form-warning">
                    <img src="../../images/error.png" alt="">
                    <span>Please enter your email</span>
                </div>';
            }
            else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo '
                <div class="form-warning">
                    <img src="../../images/error.png" alt="">
                    <span>Invalid email format</span>
                </div>';
              }
             else if ($password == "") {
                echo '
                <div class="form-warning">
                    <img src="../../images/error.png" alt="">
                    <span>Please enter your password</span>
                </div>';
            }else if(strlen($password) < 8){
                echo '
                <div class="form-warning">
                    <img src="../../images/error.png" alt="">
                    <span>Your password should have atleast 8 characters</span>
                </div>';
            }
             else {
                require_once "../../db/database.php";
                $password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (
                    first_name, 
                    last_name, 
                    username, 
                    phone_number, 
                    email, 
                    password
                ) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $prepare_stmt = mysqli_stmt_prepare($stmt, $sql);
                if ($prepare_stmt) {
                    mysqli_stmt_bind_param($stmt, "ssssss", $first_name, $last_name, $username, $phone_number, $email, $password);
                    mysqli_stmt_execute($stmt);
                    $user_sql = "SELECT * FROM users WHERE username='$username'";
                    $results = mysqli_query($conn, $user_sql);
                    $user = mysqli_fetch_array($results);
                    $_SESSION["user"] = $user;
                    header("Location: dashboard.php");
                } else {
                    die("Database Query Error");
                }
            }
        }
        ?>
      <form action="" method="POST">
        <div class="form-heading">Register with us</div>
        <div>
        <?php 
        if (isset($_POST["signup"])) {
            if ($first_name == "") {
                echo '<input type="text" name="first_name" id="first-name" placeholder="First Name" />';
            } else {
                echo '<input type="text" name="first_name" id="first-name" value="' . $first_name . '" />';
            }
        } else {
            echo '<input type="text" name="first_name" id="first-name" placeholder="First Name" />';
        }
        ?>
        </div>
        <div>
        <?php 
        if (isset($_POST["signup"])) {
            if ($last_name == "") {
                echo '<input type="text" name="last_name" id="last-name" placeholder="Last Name" />';
            } else {
                echo '<input type="text" name="last_name" id="last-name" value="' . $last_name . '" />';
            }
        } else {
            echo '<input type="text" name="last_name" id="last-name" placeholder="Last Name" />';
        }
        ?>
        </div>
        <div>
        <?php 
        if (isset($_POST["signup"])) {
            if ($username == "") {
                echo '<input type="text" name="username" id="username" placeholder="Username" />';
            } else {
                echo '<input type="text" name="username" id="username" placeholder="Username" value="' . $username . '" />';
            }
        } else {
            echo '<input type="text" name="username" id="username" placeholder="Username" />';
        }
        ?>
        </div>
        <div>
        <?php 
        if (isset($_POST["signup"])) {
            if ($phone_number == "") {
                echo '<input type="tel" name="phone_number" id="phone-number" placeholder="Phone" />';
            } else {
                echo '<input type="tel" name="phone_number" id="phone-number" placeholder="Phone" value="' . $phone_number . '" />';
            }
        } else {
            echo '<input type="tel" name="phone_number" id="phone-number" placeholder="Phone" />';
        }
        ?>
        </div>
        <div>
        <?php 
        if (isset($_POST["signup"])) {
            if ($email == "") {
                echo '<input type="email" name="email" id="email" placeholder="Email" />';
            } else {
                echo '<input type="email" name="email" id="email" placeholder="Email" value="' . $email . '" />';
            }
        } else {
            echo '<input type="email" name="email" id="email" placeholder="Email" />';
        }
        ?>
        </div>
        <div>
        <?php 
        if (isset($_POST["signup"])) {
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
        <div><button type="submit" name="signup">Signup</button></div>
        <ul>
          <li>Already have an account? <a href="login.php">Sign in</a></li>
          <li><a href="../../index.php">Back to Home</a></li>
        </ul>
      </form>
    </main>
  </body>
</html>
