<?php 
session_start();
if (isset($_SESSION["driver"])) {
    $driver = $_SESSION["driver"];
} else {
    header("Location: login.php");
}

require_once "../../../db/database.php";
$driver_id = $driver["driver_id"];
$actions_sql = "SELECT username FROM request_actions WHERE assigned='$driver_id'";
$results = mysqli_query($conn, $actions_sql);
$row_count = mysqli_num_rows($results);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests</title>
    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/5f6453ff01.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../../css/driver/dashboard_links/requests.css">
    <script defer src="../../js/navbar.js"></script>
    <script defer src="../../js/notifications.js"></script>
</head>
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
                <div class="profile-title">Driver</div>
                <div class="profile-name"><?php echo $driver["first_name"] . " " . $driver["last_name"] ?></div>
                <div class="profile-email"><?php echo $driver["email"] ?></div>
            </div>
            <hr>
            <ul class="side-links">
                <a href="../dashboard.php">
                    <li>
                        <i class="fa-solid fa-house"></i>
                        <span>dashboard</span>
                    </li>
                </a>
                <a href="./requests.php">
                    <li class="active">
                        <i class="fa-solid fa-house"></i>
                        <span>requests</span>
                    </li>
                </a>
                <a href="../comments.php">
                    <li>
                        <i class="fa-solid fa-comment"></i>
                        <span>Comments</span>
                    </li>
                </a>
            </ul>
        </div>
        <div class="main-content">
            <div class="content-title">Driver Assigned Requests</div>
            <div class="content">
            <?php 
                if (isset($_GET["id"])) {
                    include_once "./request_details.php";
                } else {
                    include_once "./request_table.php";
                }
            ?>
            </div>
        </div>
    </main>
        <?php 
      if (isset($_GET["action"])) {
        include_once "request_action.php";
      }
      ?>
</html>