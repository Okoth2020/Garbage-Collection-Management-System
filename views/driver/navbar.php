<nav>
      <a href="../../../index.php"><div class="logo">garbage collection management</div></a>
      <div class="navbar-navs">
        <div class="notification" title="notifications">
          <div id="bell">
            <i class="fa-solid fa-bell"></i>
            <?php 
            $driver = $_SESSION["driver"];
            $driver_id = $driver["driver_id"];
            $sql = "SELECT notification FROM notifications WHERE person='$driver_id' ORDER BY id DESC";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_num_rows($result);

            echo '<div class="bell-count">' . $rows . '</div>';
            ?>
          </div>
          <div class="notification-container" style="display: none">
          <?php 
          for ($i = 0; $i < $rows; $i++) { 
              $action = mysqli_fetch_array($result, MYSQLI_ASSOC);
              $remark = $action["notification"];
              echo '<div class="message">' . $remark . '</div>';
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