<?php 
session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
} else {
    header("Location: login.php");
}
$title = "Dashboard";
$styles = "../../css/user/dashboard.css";
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
              <li class="active">
                <i class="fa-solid fa-house"></i> 
                <a href="dashboard.php">Dashboard</a>
              </li>
              <li>
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
      <div class="container">
        <div class="content-title">Dashboard</div>
        <div class="content">
        <div class="content-name">
              Welcome <span id="user-name"><?php echo $user["first_name"] ?></span>
            </div>
            <a href="profile.php"><button id="user-profile">View Profile</button></a>
            <div class="content-cards">
              <div class="content-card">
                <div class="content-card-title">Garbage requests</div>
                <div class="content-card-count">
                  <?php 
                  require_once "../../db/database.php";
                  $username = $user["username"];
                  $sql = "SELECT * FROM requests WHERE username='$username'";
                  $result = mysqli_query($conn, $sql);
                  echo mysqli_num_rows($result);
                  ?>
                </div>
                <div class="content-card-details">
                  <a href="./requests.php">View Details</a>
                </div>
              </div>
            </div>
        </div>
      </div>
    </main>
<?php include_once "partials/footer.php" ?>