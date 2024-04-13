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

if (isset($_GET["id"])) {
  $request_number = $_GET["id"];
  $sql = "SELECT * FROM requests WHERE payment_id='$request_number'";
  $result = mysqli_query($conn, $sql);
  $request = mysqli_fetch_array($result, MYSQLI_ASSOC);

  $request_username = $request["username"];
  $sql = "SELECT * FROM users WHERE username='$request_username'";
  $result = mysqli_query($conn, $sql);
  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
}

?>

<?php 
$title = "Requests";
$styles = "../../../css/admin/requests.css";
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
                  <a href="../driver/add_driver.php"><li>- add driver</li></a>
                  <a href="../driver/manage_driver.php"><li>- manage driver</li></a>
              </ul>
          </li>
          <a href="./registered_users.php">
          <li>
              <i class="fa-solid fa-user"></i>
              <span>user</span>
          </li>
          </a>
          <a href="./requests.php">
            <li class="active">
                <i class="fa-solid fa-clipboard-question"></i>
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
        <div class="content-title">requests</div>
        <div class="content">
            <?php 
            if (isset($_GET["id"])) {
              include_once "request_details.php";
            } else {
              include_once "request_table.php";
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
  </body>
</html>

