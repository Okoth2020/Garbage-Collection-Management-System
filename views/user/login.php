<?php 
session_start();
if (isset($_SESSION["user"])) {
    header("Location: dashboard.php");
} else {
    if (isset($_POST["login"])) {
        $username = $_POST["username"];
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
    <link rel="stylesheet" href="../../css/user/userlogin.css" />
    <title>Login</title>
  </head>
  <body>
    <main>
      <div class="project-title">Garbage Collection Management System</div>
      <?php 
        if (isset($_POST["login"])) {
            if ($username == "") {
                echo '
                <div class="form-warning">
                    <img src="../../images/error.png" alt="">
                    <span>Please enter your username</span>
                </div>';
            } else if ($password == "") {
                echo '
                <div class="form-warning">
                    <img src="../../images/error.png" alt="">
                    <span>Please enter your password</span>
                </div>';
            } else {
                require_once "../../db/database.php";

                $sql = "SELECT * FROM users WHERE username='$username'";
                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if ($user) {
                    $hashed_user_password = $user['password'];
                    $user_password = password_verify($password, $hashed_user_password);
                    if($user_password){
                        $_SESSION["user"] = $user;
                        header("Location: dashboard.php");
                    }
                    else{
                        echo '
                        <div class="form-warning">
                            <img src="../../images/error.png" alt="">
                            <span>Wrong password</span>
                        </div>';  
                    }
                    
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
      <form action="" method="POST">
        <div class="form-heading">Log into your Account</div>
        <div>
        <?php 
        if (isset($_POST["login"])) {
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
        <div>
          <input type="checkbox" name="remember" id="remember" />Remember me
        </div>
        <div><button type="submit" name="login">LOGIN</button></div>
        <ul>
          <li><a href="./forgot.php">Forgot password?</a></li>
          <li>Don't have an account? <a href="signup.php">Signup</a></li>
          <li><a href="../../index.php">Back to Home</a></li>
        </ul>
      </form>
    </main>
  </body>
</html>
