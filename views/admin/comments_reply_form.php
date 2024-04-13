<div class="content-title">Reply comment from <?php 
    $id = $_GET["id"];
    $sql = "SELECT * FROM comments WHERE id=$id";
    $results = mysqli_query($conn, $sql);
    $comments = mysqli_fetch_array($results, MYSQLI_ASSOC);
    $person = $comments["person"];
    $position = $_GET["position"];
    $name = "";
    if ($position == "user") {
        $sql = "SELECT * FROM users WHERE username='$person'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $first_name = $user["first_name"];
        $last_name = $user["last_name"];
        $name = $first_name . " " . $last_name . " a " . $position;
    } else {
        $sql = "SELECT * FROM drivers WHERE driver_id='$person'";
        $result = mysqli_query($conn, $sql);
        $driver = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $first_name = $driver["first_name"];
        $last_name = $driver["last_name"];
        $name = $first_name . " " . $last_name . " a " . $position;
    }
    echo $name;
?></div>
<div class="comment-form">
    <?php 
    if (isset($_POST["send_feedback"])) {
        $category = $_POST["comments_category"];
        $message = $_POST["comment"];
        $username = $user["username"];

        if ($message == "") {
            echo '
            <div class="form-warning">
                <img src="../../images/error.png" alt="" />
                <span>please enter a message</span>
            </div>
            ';
        } else {
            require_once "../../db/database.php";
            $sql = "UPDATE comments SET status='responded', responses='$message' WHERE id=$id";
            $results = mysqli_query($conn, $sql);
            if ($results) {
                header("Location: notifications.php?to=" . $position . "&person=" . $person . "&message=" . $message . "&category=feedback&redirect=comments.php");
            }
        }
    }
    ?>
    <form action="" method="post">
        <div class="comments-title">Response</div>
        <div class="comments-inputs">
        <textarea
            name="comment"
            id="comment"
            placeholder="Comment"
        ></textarea>
        <button type="submit" name="send_feedback">send</button>
        </div>
    </form>
</div>