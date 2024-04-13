<?php

define("HOST", "localhost");
define("DB_USER", "root");
define("DB_NAME", "garbage_collection_management");
define("DB_PASSWORD", "");

$conn = mysqli_connect(HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$conn) {
    die("Something went wrong, try again");
}

?>