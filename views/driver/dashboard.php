<?php 
session_start();
if (isset($_SESSION["driver"])) {
    $driver = $_SESSION["driver"];
} else {
    header("Location: login.php");
}

require_once "../../db/database.php";
$driver_id = $driver["driver_id"];
$actions_sql = "SELECT status FROM request_actions WHERE assigned='$driver_id'";
$assgined_count = 0;
$progress_count = 0;
$completed_count = 0;
$results = mysqli_query($conn, $actions_sql);
$row_count = mysqli_num_rows($results);
for ($i=0; $i < $row_count; $i++) { 
    $actions = mysqli_fetch_array($results);
    if ($actions["status"] == "approved") {
        $assgined_count += 1;
    } else if ($actions["status"] == "on the way") {
        $progress_count += 1;
    } else {
        $completed_count += 1;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Dashboard</title>
    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../css/driver/dashboard.css">
    <script src="https://kit.fontawesome.com/5f6453ff01.js" crossorigin="anonymous"></script>
    <script defer src="../../js/navbar.js"></script>
    <script defer src="../../js/notifications.js"></script>
</head>
<body>
    <?php 
    $logout = "./logout.php";
    ob_start();
    include_once "./navbar.php";
    $buffer = ob_get_contents();
    ob_end_clean();
    $buffer = str_replace("%LOGOUT%", $logout, $buffer);
    echo $buffer;
    ?>
    <main>
        <div class="side-bar">
            <div class="profile-summary">
                <div class="profile-image">
                    <img src="../../images/avatar.jpeg" alt="" />
                </div>
                <div class="profile-title">Driver</div>
                <div class="profile-name"><?php echo $driver["first_name"] . " " . $driver["last_name"] ?></div>
                <div class="profile-email"><?php echo $driver["email"] ?></div>
            </div>
            <hr>
            <ul class="side-links">
                <a href="dashboard.php">
                    <li class="active">
                        <i class="fa-solid fa-house"></i>
                        <span>dashboard</span>
                    </li>
                </a>
                <a href="./dashboard_links/requests.php">
                    <li>
                        <i class="fa-solid fa-house"></i>
                        <span>requests</span>
                    </li>
                </a>
                <a href="comments.php">
                    <li>
                        <i class="fa-solid fa-comment"></i>
                        <span>Comments</span>
                    </li>
                </a>
            </ul>
        </div>
        <div class="main-content">
            <div class="content-title">Dashboard</div>
            <div class="content">
                <div class="content-wrapper">
                    <div class="content-name">Welcome <span id="user-name"><?php echo $driver["first_name"] . " " . $driver["last_name"] ?></span></div>
                    <div class="content-cards">
                            <div class="content-card">
                            <div class="content-card-title">Total Assigned Requests</div>
                            <div class="content-card-count"><?php echo $assgined_count ?></div>
                            <div class="content-card-details">
                            <a href="dashboard_links/requests.php">View Details</a></div>
                            </div>
                            <!-- Other cards -->
                            <div class="content-card">
                            <div class="content-card-title">Inprogress Requsts</div>
                            <div class="content-card-count"><?php echo $progress_count ?></div>
                            <div class="content-card-details">
                            <a href="dashboard_links/requests.php?category=progressing">View Details</a></div>
                            </div>
                            <div class="content-card">
                            <div class="content-card-title">Completed Requests</div>
                            <div class="content-card-count"><?php echo $completed_count ?></div>
                            <div class="content-card-details">
                            <a href="dashboard_links/requests.php?category=completed">View Details</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</html>