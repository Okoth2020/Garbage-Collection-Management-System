<?php 
session_start();
if (isset($_SESSION["driver"])) {
    unset($_SESSION["driver"]);
    header("Location: login.php");
}
?>