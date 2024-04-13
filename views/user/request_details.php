<?php 
require_once "../../db/database.php";

$request_number = $_GET["id"];
$sql = "SELECT * FROM requests WHERE payment_id='$request_number'";
$result = mysqli_query($conn, $sql);
$request = mysqli_fetch_array($result, MYSQLI_ASSOC);
$user = $_SESSION["user"];

?>
<div class="details-container">
    <div class="details-title">Details</div>
    <div class="details-table">
    <div class="table-header">Request Number</div>
    <div><?php echo $_GET["id"] ?></div>
    <div class="table-header">Name</div>
    <div><?php echo $user["first_name"] . " " . $user["last_name"] ?></div>
    <div class="table-header">Email</div>
    <div><?php echo $user["email"] ?></div>
    <div class="table-header">Mobile Number</div>
    <div><?php echo $user["phone_number"] ?></div>
    <div class="table-header">Bus Route</div>
    <div><?php echo $request["route"] ?></div>
    <div class="table-header">Region</div>
    <div><?php echo $request["region"] ?></div>
    <div class="table-header">County</div>
    <div><?php echo $request["county"] ?></div>
    <div class="table-header">Landmark</div>
    <div><?php echo $request["landmark"] ?></div>
    <div class="table-header">Status</div>
    <div><?php echo $request["status"] ?></div>
    <div class="table-header garbage-image-header">Image</div>
    <div class="garbage-image">
        <?php echo '<img src="../../images/' . $request["photo"] . '" alt="" />' ?>
    </div>
    <div class="table-header">Assign To</div>
    <div><?php
    $sql = "SELECT * FROM request_actions WHERE agent='admin' ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    $action = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ($action && $action['assigned']) {
        $driver_id = $action['assigned'];
        $sql = "SELECT * FROM drivers WHERE driver_id='$driver_id'";
        $result = mysqli_query($conn, $sql);
        $driver = mysqli_fetch_array($result, MYSQLI_ASSOC);
        echo $driver['first_name'] . " " . $driver['last_name'];
    }
    ?></div>
    <div class="table-header">Request Date</div>
    <div><?php 
    $sql = "SELECT * FROM request_actions WHERE agent='admin' ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    $action = mysqli_fetch_array($result, MYSQLI_ASSOC);
    echo $action ? $action['assign_date'] : "";
    ?></div>
    <div class="table-header">Complain Final Status</div>
    <div><?php 
    $sql = "SELECT * FROM request_actions ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    $action = mysqli_fetch_array($result, MYSQLI_ASSOC);
    echo $action ? $action['remarks'] : "";
    ?></div>
    <div class="table-header">Driver Remark</div>
    <div><?php
    $sql = "SELECT * FROM request_actions WHERE agent='driver' ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    $action = mysqli_fetch_array($result, MYSQLI_ASSOC);
    echo $action ? $action['remarks'] : "";
    ?></div>
    </div>
    <div class="tracking-history-table">
        <div class="tracking-history-title">Tracking History</div>
        <div class="table-header">#</div>
        <div class="table-header">Remark</div>
        <div class="table-header">Status</div>
        <div class="table-header">Time</div>
        <?php 
        $sql = "SELECT * FROM request_actions ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($result);
        for ($i = 0; $i < $rows; $i++) { 
            $action = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $remark = $action["remarks"];
            $assign_to = $action["assigned"];
            $assign_date = $action["assign_date"];
            $status = $action["status"];
            $request_id = $action["request_id"];

            if ($request_id == $request_number) {
                echo '<div>' . $i + 1 . '</div>
                <div>' . $remark . '</div>
                <div>' . $status . '</div>
                <div>' . $assign_date . '</div>';
            }
        }
        ?>
    </div>
</div>
