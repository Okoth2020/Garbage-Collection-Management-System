<nav>
      <a href="../../../index.php"><div class="logo">garbage collection management</div></a>
      <div class="navbar-navs">
        <div class="notification" title="notifications">
          <div id="bell">
            <i class="fa-solid fa-bell"></i>
            <?php 
            require_once "../../db/database.php";
            $user = $_SESSION["user"];
            $username = $user["username"];
            $sql = "SELECT id,notification,view_status,agent FROM notifications WHERE person='$username' AND view_status='Unread' ORDER BY id DESC";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_num_rows($result);

            echo '<div class="bell-count">' . $rows . '</div>';
            ?>
          </div>
          <div class="notification-container" style="display: none">
          <?php 
          $sql = "SELECT id,notification,view_status,agent FROM notifications WHERE person='$username' ORDER BY id DESC";
          $result = mysqli_query($conn, $sql);
          $rows = mysqli_num_rows($result);
          for ($i = 0; $i < $rows; $i++) { 
              $action = mysqli_fetch_array($result, MYSQLI_ASSOC);
              $id = $action["id"];
              $remark = $action["notification"];
              $status = $action["view_status"];
              $agent = $action["agent"];

              if ($status == 'Unread') {
                echo '<a href="requests.php?read=true&id=' . $id . '" style="font-weight: bold; color: black;"><div class="message">' . $agent . ': ' . $remark . '</div></a>';
              } else {
                echo '<a href="requests.php" style="color: black;"><div class="message">' . $agent . ': ' . $remark . '</div></a>';
              }
          }
          ?>
          </div>
        </div>
        <div class="profile" title="profile">
          <i class="fa-solid fa-user"></i>
          <div class="profile-nav" style="display: none">
            <a href="logout.php">
              <div class="item logout">Logout</div>
            </a>
          </div>
        </div>
      </div>
    </nav>