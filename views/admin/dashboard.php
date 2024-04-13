<?php 
    session_start();
    if (isset($_SESSION["id"])) {
        require_once "../../db/database.php";
        $id = $_SESSION["id"];
        $sql = "SELECT * FROM admin_auth WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        $admin = mysqli_fetch_array($result, MYSQLI_ASSOC);
    } else {
        header("Location: login.php");
    }
?>

<?php 
$title = "Admin Dashboard";
$styles = "../../css/admin/dashboard.css";
$navbar_script = "../../js/navbar.js";
ob_start();
include_once "./header.php";
$buffer = ob_get_contents();
ob_end_clean();
$buffer = str_replace("%TITLE%", $title, $buffer);
$buffer = str_replace("%STYLESHEET%", $styles, $buffer);
$buffer = str_replace("%SCRIPT%", $navbar_script, $buffer);
echo $buffer;
?>
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
          <div class="profile-title">Admin</div>
          <div class="profile-name"><?php echo $admin["first_name"] . " " . $admin["last_name"] ?></div>
          <div class="profile-email"><?php echo $admin["email"] ?></div>
        </div>
        <ul class="side-links">
          <a href="dashboard.php">
            <li class="active">
                <i class="fa-solid fa-house"></i>
                <span>dashboard</span>
            </li>
          </a>
            <li>
                <i class="fa-solid fa-id-card"></i>
                <span>driver</span>
                <ul>
                    <a href="driver/add_driver.php"><li>- add driver</li></a>
                    <a href="driver/manage_driver.php"><li>- manage driver</li></a>
                </ul>
            </li>
          <a href="user/registered_users.php">
            <li>
                <i class="fa-solid fa-user"></i>
                <span>user</span>
            </li>
          </a>
          <a href="user/requests.php">
            <li>
                <i class="fa-solid fa-clipboard-question"></i>
                <span>requests</span>
            </li>
          </a>
          <a href="comments.php">
            <li>
              <i class="fa-solid fa-comment"></i>
              <a href="comments.php">Comments</a>
            </li>
          </a>
        </ul>
      </div>
      <div class="container">
        <div class="content-title">dashboard</div>
        <div class="content">
            <div class="summary-cards">
              <div class="summary-card">
                  <div class="summary-title">Users</div>
                  <div class="summary-count"><?php 
                      $users_sql = "SELECT * FROM users";
                      $users_results = mysqli_query($conn, $users_sql);
                      echo mysqli_num_rows($users_results);
                  ?></div>
                  <div class="summary-link">
                      <a href="user/registered_users.php">more details</a>
                  </div>
              </div>
              <div class="summary-card">
                  <div class="summary-title">Drivers</div>
                  <div class="summary-count"><?php 
                      $drivers_sql = "SELECT * FROM drivers";
                      $drivers_results = mysqli_query($conn, $drivers_sql);
                      echo mysqli_num_rows($drivers_results);
                  ?></div>
                  <div class="summary-link">
                      <a href="driver/manage_driver.php">more details</a>
                  </div>
              </div>
              <div class="summary-card">
                  <div class="summary-title">Requests</div>
                  <div class="summary-count"><?php 
                      $requests_sql = "SELECT * FROM requests";
                      $requests_results = mysqli_query($conn, $requests_sql);
                      echo mysqli_num_rows($requests_results);
                  ?></div>
                  <div class="summary-link">
                      <a href="user/requests.php">more details</a>
                  </div>
              </div>
            </div>
        </div>
      </div>
    </main>
  </body>
</html>

