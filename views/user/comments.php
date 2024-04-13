<?php 
session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
} else {
    header("Location: login.php");
}

$user_first_name = $user["first_name"];
$user_last_name = $user["last_name"];
$user_number = $user["phone_number"];
$user_email = $user["email"];
$user_username = $user["username"];
$user_password = $user["password"];
$title = "Profile";
$styles = "../../css/user/feedback.css";
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
            <li>
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
            <li class="active">
                <i class="fa-solid fa-comment"></i>
                <a href="comments.php">Comments</a>
            </li>
        </ul>
        </div>
    </div>
    <div class="container">
        <?php 
        if (isset($_GET["add"])) {
            include_once "comments_form.php";
        } else {
            include_once "comments_list.php";
        }
        ?>
    </div>
</main>
<?php include_once "partials/footer.php" ?>