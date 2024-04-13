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
            <div class="table-header">Date</div>
            <div class="table-content">
                <input type="datetime" name="assign_date" value="<?php echo date("Y-m-d H:i:s") ?>" />
            </div>
            <div class="table-header">Status:</div>
            <div class="table-content">
                <select name="status" id="status">
                    <option value="on the way">On the Way</option>
                    <option value="completed">Completed</option>
                </select>
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