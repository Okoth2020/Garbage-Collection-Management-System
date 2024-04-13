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
        if (isset($_POST["change_password"])) {
            $username = $_GET["user"];
            $new_password = $_POST["new_password"];
            $confirm_password = $_POST["confirm_password"];

            if ($new_password == "") {
                echo '
                <div class="form-warning">
                    <img src="../../images/error.png" alt="">
                    <span>Please enter your new password</span>
                </div>';
            } else if ($confirm_password == "") {
                echo '
                <div class="form-warning">
                    <img src="../../images/error.png" alt="">
                    <span>Please confirm your new password</span>
                </div>';
            } else if ($new_password != $confirm_password) {
                echo '
                <div class="form-warning">
                    <img src="../../images/error.png" alt="">
                    <span>Passwords do not match</span>
                </div>';
            } else {
                require_once "../../db/database.php";
                $sql = "UPDATE users SET password='$new_password' WHERE username='$username'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    header("Location: login.php");
                } else {
                    echo '
                    <div class="form-warning">
                        <img src="../../images/error.png" alt="">
                        <span>Error in updating password</span>
                    </div>';
                }
            }
        }
        ?>
      <form action="" method="POST">
        <div class="form-heading">Change Password</div>
        <div>
        <?php 
        if (isset($_POST["change_password"])) {
            if ($new_password == "") {
                echo '<input type="password" name="new_password" id="new-password" placeholder="New Password" />';
            } else {
                echo '<input type="password" name="new_password" id="new-password" placeholder="New Password" value="' . $new_password . '" />';
            }
        } else {
            echo '<input type="password" name="new_password" id="new-password" placeholder="New Password" />';
        }
        ?>
        </div>
        <div>
        <?php 
        if (isset($_POST["change_password"])) {
            if ($confirm_password == "") {
                echo '<input type="password" name="confirm_password" id="confirm-password" placeholder="Confirm Password" />';
            } else {
                echo '<input type="password" name="confirm_password" id="confirm-password" placeholder="Confirm Password" value="' . $confirm_password . '" />';
            }
        } else {
            echo '<input type="password" name="confirm_password" id="confirm-password" placeholder="Confirm Password" />';
        }
        ?>
        </div>
        <div><button type="submit" name="change_password">Update</button></div>
        <ul>
          <li><a href="../../index.php">Back to Home</a></li>
        </ul>
      </form>
    </main>
  </body>
</html>
