<div class="content-title">Comments</div>
<div class="content">
    <div class="comments">
        <div class="comment-content">
            <?php 
            require_once "../../db/database.php";
            $sql = "SELECT * FROM comments ORDER BY id DESC";
            $results = mysqli_query($conn, $sql);
            $rows = mysqli_num_rows($results);
            for ($i=0; $i < $rows; $i++) { 
                $comments = mysqli_fetch_array($results, MYSQLI_ASSOC);
                $comment_id = $comments["id"];
                $message = $comments["feedback"];
                $position = $comments["position"];
                $person = $comments["person"];
    
                if ($position == "user") {
                    $sql = "SELECT * FROM users WHERE username='$person'";
                    $result = mysqli_query($conn, $sql);
                    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $first_name = $user["first_name"];
                    $last_name = $user["last_name"];
                    $name = $first_name . " " . $last_name;
                } else {
                    $sql = "SELECT * FROM drivers WHERE driver_id='$person'";
                    $result = mysqli_query($conn, $sql);
                    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $first_name = $user["first_name"];
                    $last_name = $user["last_name"];
                    $name = $first_name . " " . $last_name;
                }
    
                echo '
                <div class="comment-card">
                    <div class="comment-person">
                        <div class="name">' . $name . '</div>
                        <div class="title">' . $position . '</div>
                    </div>
                    <div class="comment-details">
                        <div class="message">' . $message . '</div>
                        <div class="message-nav">
                            <a href="comments.php?reply=true&id=' . $comment_id . '&position=' . $position . '" class="reply">
                                <i class="fa-solid fa-reply"></i>
                                <span>reply</span>
                            </a>
                        </div>
                    </div>
                </div>
                ';
            }
            ?>
        </div>
    </div>
</div>