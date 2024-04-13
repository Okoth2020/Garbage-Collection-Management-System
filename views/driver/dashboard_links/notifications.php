<?php 
require_once "../../../db/database.php";
$sent_to = $_GET["to"];
$person = $_GET["person"];
$message = $_GET["message"];
$redirect = $_GET["redirect"];
$category = $_GET["category"];
$date = date("Y-m-d H:i:s");

$sql = "INSERT INTO notifications (
    notification,
    datetime_sent,
    sent_to,
    person,
    category,
    agent
) VALUES ('$message', '$date', '$sent_to', '$person', '$category','driver')";
$results = mysqli_query($conn, $sql);
if ($results) {
    header("Location: " . $redirect);
} else {
    echo $message;
    die("Database query error");
}
?>