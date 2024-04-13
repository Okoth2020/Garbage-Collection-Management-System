<?php 
session_start();
if (isset($_SESSION["user"])) {
    header("Location: dashboard.php");
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
    <title>Account recovery</title>
  </head>
  <body>
    <main>
      <div class="project-title">Garbage Collection Management System</div>
      <?php 
        if (isset($_POST["forgot"])) {
            $email = $_POST["email"];

            if ($email == "") {
                echo '
                <div class="form-warning">
                    <img src="../../images/error.png" alt="">
                    <span>Please enter your email</span>
                </div>';
            } else {
                require_once "../../db/database.php";
                $sql = "SELECT username FROM users WHERE email='$email'";
                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if ($user) {
                    $username = $user["username"];
                    header("Location: change_password.php?user=" . $username);
                } else {
                    echo '
                    <div class="form-warning">
                        <img src="../../images/error.png" alt="">
                        <span>User with that email does not exist</span>
                    </div>';
                }
            }
        }
        ?>
      <form action="" method="POST">
        <div class="form-heading">Account Recovery</div>
        <div>
        <?php 
        if (isset($_POST["forgot"])) {
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
        <div><button type="submit" name="forgot">Confirm</button></div>
        <ul>
          <li><a href="../../index.php">Back to Home</a></li>
        </ul>
      </form>
    </main>
  </body>
</html>
