<?php 
require_once "../../../db/database.php";
$driver_id = $_GET["id"];
$sql = "DELETE FROM drivers WHERE driver_id='$driver_id'";
$results = mysqli_query($conn, $sql);
if ($results) {
    header("Location: manage_driver.php");
} else {
    echo "something went wrong";
}
?>