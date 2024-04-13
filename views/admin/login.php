<?php 
    session_start();
    
    if (isset($_SESSION["id"])) {
        header("Location: dashboard.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <script
      src="https://kit.fontawesome.com/5f6453ff01.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../../css/admin/login.css" />
  </head>
  <body>
    <nav>
    <div class="logo">
        <a href="../../index.php">garbage collection management</a>
      </div>
    </nav>
    <main>
        <?php 
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            if (empty($email)) {
                echo '<div class="login-error">Please enter your email</div>';
            } else if (empty($password)) {
                echo '<div class="login-error">Please enter your password</div>';
            } else {
                require_once "../../db/database.php";
                $sql = "SELECT * FROM admin_auth WHERE email='$email'";
                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if ($user) {
                    if ($password == $user["password"]) {
                        $_SESSION["id"] = $user["id"];
                        header("Location: dashboard.php");
                        exit();
                    } else {
                        echo '<div class="login-error">Wrong password</div>';
                    }
                } else {
                    echo '<div class="login-error">Email does not exist</div>';
                }
            }
        }
        ?>
        
        <div class="login-container">
            <form action="" method="POST">
                <h2 class="form-title">Login As Admin</h2>
                <div class="form-input" id="info">
                    <span><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" name="email" id="email" placeholder="Email" />
                </div>
                <div class="form-input" id="info">
                    <span><i class="fa-solid fa-lock"></i></span>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Password"
                    />
                </div>
                <div class="submission">
                    <input type="submit" name="login" id="login" value="Login">
                </div>
            </form>
        </div>
    </main>
  </body>
</html>
