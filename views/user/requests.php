<?php 
session_start();

if (isset($_SESSION["user"])) {
  $user = $_SESSION["user"];
} else {
  header("Location: login.php");
}
if (isset($_GET['read'])){
  require_once "../../db/database.php";
  $id = $_GET['id'];
  $query = "UPDATE notifications SET view_status = 'read' WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if($result){
    header("Location: requests.php");
  }
  
}

if (isset($_POST["save"])) {
  $region = $_POST["region"];
  $county = $_POST["county"];
  $landmark = $_POST["landmark"];
  $route = $_POST["route"];
  $load = $_POST["load"];
  $cycle = $_POST["cycle"];
  $package = $_POST["package"];
  $photo = $_POST["photo"];
  $payment_method = $_POST["payment_method"];
  $payment_id = $_POST["payment_id"];
  $amount = $_POST["payment_amount"];
  $date = date("Y-m-d H:i:s");

  require_once "../../db/database.php";
  $sql = "INSERT INTO requests (
    region, 
    county, 
    landmark, 
    route, 
    load_size, 
    cycle, 
    package,
    photo,
    payment_method,
    payment_id,
    payment_amount,
    username,
    dated
  ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = mysqli_stmt_init($conn);
  $prepare_stmt = mysqli_stmt_prepare($stmt, $sql);
  if ($prepare_stmt) {
      mysqli_stmt_bind_param(
        $stmt, 
        "sssssssssssss", 
        $region, 
        $county, 
        $landmark, 
        $route, 
        $load, 
        $cycle, 
        $package, 
        $photo, 
        $payment_method, 
        $payment_id, 
        $amount,
        $user["username"],
        $date
      );
      mysqli_stmt_execute($stmt);
  }
}

$title = "Requests";
$styles = "../../css/user/requests.css";
$client_id = "Ae-meZBj-64UyaKCzYlj3PvEjlZB1AUeYvrDR0ebu3fjoLnoRgO0DS1yRvdyJSFZFMcElvMTsewPZFcS";
ob_start();
include_once "partials/header.php";
include_once "partials/navbar.php";
$buffer = ob_get_contents();
ob_end_clean();
$buffer = str_replace("%TITLE%", $title, $buffer);
$buffer = str_replace("%STYLESHEET%", $styles, $buffer);
$buffer = str_replace("%CLIENT_ID%", $client_id, $buffer);
echo $buffer;
?>
<main>
  <div class="side-bar">
    <?php include_once "partials/profile.php" ?>
    <div class="side-links">
      <ul>
        <li>
          <i class="fa-solid fa-house"></i>
          <a href="dashboard.php">Dashboard</a>
        </li>
        <li>
          <i class="fa-solid fa-user"></i>
          <a href="profile.php">Profile</a>
        </li>
        <li class="active">
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
    <div class="content-title">Garbage collection</div>
    <?php
    if (isset($_POST["save"])) {
      echo '<div class="success">You have successfully made a request, we will notify you when we are ready to collect</div>';
    }
    ?>
    <?php 
    if (isset($_POST["new_request"]) || isset($_POST["request"]) && !isset($_GET["status"])) {
      include_once "add_request.php";
    } else if (isset($_GET["id"])) {
      include_once "request_details.php";
    } else {
      include_once "request_table.php";
    }
    ?>
  </div>
  <?php 
  if (isset($_POST["request"])) {
    if ($region != "" && $county != "" && $landmark != "" && $route != "" && $photo != "") {
      include_once "partials/payment.php";
    }
  }
  ?>
</main>
<?php include_once "partials/footer.php" ?>
