<div class="comments">
    <div class="comment-nav">
        <div class="comments-title">Comments</div>
        <a href="comments.php?add=true">
            <button id="add-comments">New Comment</button>
        </a>
    </div>
    <div class="comment-content">
        <?php 
        require_once "../../db/database.php";
        $driver_id = $driver["driver_id"];
        $sql = "SELECT * FROM comments WHERE person='$driver_id'";
        $results = mysqli_query($conn, $sql);
        $comments = mysqli_fetch_array($results, MYSQLI_ASSOC);
        if ($comments) {
            $message = $comments["feedback"];
            echo '
            <div class="comment-card">
                <div class="comment-details">
                    <div class="message">' . $message . '</div>
                    <div class="message-nav">
                        <a href="comments.php?edit=true" class="reply">
                            <i class="fa-solid fa-pen-to-square"></i>
                            <span>edit</span>
                        </a>
                        <a href="comments.php?delete=true" class="reply">
                            <i class="fa-solid fa-trash"></i>
                            <span>delete</span>
                        </a>
                    </div>
                </div>
            </div>
            ';

            $sql = "SELECT * FROM admin_auth";
            $results = mysqli_query($conn, $sql);
            $admin = mysqli_fetch_array($results);
            $admin_name = $admin["first_name"] . " " . $admin["last_name"];
            $department = $admin["department"];
    
            echo '
            <div class="comment-card" style="background-color: #0000ff4d">
                <div class="comment-person">
                    <div class="name">' . $admin_name . '</div>
                    <div class="title">' . $department . '</div>
                </div>
                <div class="comment-details">
                    <div class="message">' . $message . '</div>
                </div>
            </div>
            ';
        }
        ?>
    </div>
</div>