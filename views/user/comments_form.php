<div class="content-title">Add Comment</div>
<div class="comment-form">
    <?php 
    if (isset($_POST["send_feedback"])) {
        $category = $_POST["comments_category"];
        $message = $_POST["comment"];
        $username = $user["username"];
        $position = "user";

        if ($message == "") {
            echo '
            <div class="form-warning">
                <img src="../../images/error.png" alt="" />
                <span>please enter a message</span>
            </div>
            ';
        } else {
            require_once "../../db/database.php";
            $sql = "INSERT INTO comments (
                position,
                person,
                category,
                feedback
            ) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            $prepare_stmt = mysqli_stmt_prepare($stmt, $sql);
            if ($prepare_stmt) {
                mysqli_stmt_bind_param(
                  $stmt, 
                  "ssss", 
                  $position, 
                  $username, 
                  $category, 
                  $message
                );
                mysqli_stmt_execute($stmt);
                header("Location: comments.php");
            }
        }
    }
    ?>
    <form action="" method="post">
        <div class="comments-title">Feedback</div>
        <div class="comments-inputs">
        <select name="comments_category" id="comments-category">
            <option value="feedback">feedback</option>
            <option value="complaints">complaints</option>
        </select>
        <textarea
            name="comment"
            id="comment"
            placeholder="Comment"
        ></textarea>
        <button type="submit" name="send_feedback">send</button>
        </div>
    </form>
</div>