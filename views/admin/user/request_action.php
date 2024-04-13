<div class="take-action-popup">
    <?php
    $user_id = $_GET["id"];
    echo '
    <a href="requests.php?id=' . $user_id . '" class="take-action-close">
        <img src="../../../images/close.png" alt="" />
    </a>
    ';
    ?>
    <form action="requests.php?id=<?php echo $user_id ?>" method="post">
        <div class="take-action-title">Take Action</div>
        <hr />
        <div class="take-action-form-table">
            <div class="table-header">Remark:</div>
            <div class="table-content remark-content">
                <textarea name="remark" id="remark" placeholder="Remark"></textarea>
            </div>
            <div class="table-header">Assign to:</div>
            <div class="table-content">
                <select name="assign_to" id="assign-to">
                    <option value="none">Assign To</option>
                    <?php
                    $sql = "SELECT * FROM drivers";
                    $result = mysqli_query($conn, $sql);
                    $rows = mysqli_num_rows($result);
                    for ($i = 0; $i < $rows; $i++) { 
                        $driver = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $driver_id = $driver["driver_id"];
                        $first_name = $driver["first_name"];
                        $last_name = $driver["last_name"];
                        echo '<option value="' . $driver_id . '">' . $first_name . ' ' . $last_name .  '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="table-header">Assign Date</div>
            <div class="table-content">
                <input type="datetime" name="assign_date" value="<?php echo date("Y-m-d H:i:s") ?>" />
            </div>
        </div>
        <hr />
        <div class="take-action-buttons">
            <button type="submit" name="take_action" id="update-form">
            Update
            </button>
        </div>
    </form>
</div>