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
$title = "Comments";
$styles = "../../css/admin/feedback.css";
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
            <li>
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
            <li class="active">
              <i class="fa-solid fa-comment"></i>
              <span>Comments</span>
            </li>
          </a>
      </ul>
      </div>
      <div class="container">
      <?php 
        if (isset($_GET["add"])) {
            include_once "comments_form.php";
        } else {
            if (isset($_GET["reply"])) {
                include_once "comments_reply_form.php";
            } else {
                include_once "comments_list.php";
            }
        }
        ?>
      </div>
    </main>
  </body>
</html>

