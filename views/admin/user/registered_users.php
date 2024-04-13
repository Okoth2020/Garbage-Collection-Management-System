<?php 
    session_start();
    if (isset($_SESSION["id"])) {
        require_once "../../../db/database.php";
        $id = $_SESSION["id"];
        $sql = "SELECT * FROM admin_auth WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        $admin = mysqli_fetch_array($result, MYSQLI_ASSOC);
    } else {
        header("Location: login.php");
    }
?>

<?php 
$title = "Registered users";
$styles = "../../../css/admin/user/registered_users.css";
$navbar_script = "../../../js/navbar.js";
ob_start();
include_once "../header.php";
$buffer = ob_get_contents();
ob_end_clean();
$buffer = str_replace("%TITLE%", $title, $buffer);
$buffer = str_replace("%STYLESHEET%", $styles, $buffer);
$buffer = str_replace("%SCRIPT%", $navbar_script, $buffer);
echo $buffer;
?>
<body>
<?php 
    $logout = "../logout.php";
    ob_start();
    include_once "../navbar.php";
    $buffer = ob_get_contents();
    ob_end_clean();
    $buffer = str_replace("%LOGOUT%", $logout, $buffer);
    echo $buffer;
    ?>
    <main>
    <div class="side-bar">
        <div class="profile-summary">
          <div class="profile-image">
            <img src="../../../images/avatar.jpeg" alt="" />
          </div>
          <div class="profile-title">Admin</div>
          <div class="profile-name"><?php echo $admin["first_name"] . " " . $admin["last_name"] ?></div>
          <div class="profile-email"><?php echo $admin["email"] ?></div>
        </div>
        <ul class="side-links">
          <a href="../dashboard.php">
          <li>
              <i class="fa-solid fa-house"></i>
              <span>dashboard</span>
          </li>
          </a>
          <li>
              <i class="fa-solid fa-id-card"></i>
              <span>driver</span>
              <ul>
                  <a href="../driver/add_driver.php"><li>- add driver</li></a>
                  <a href="../driver/manage_driver.php"><li>- manage driver</li></a>
              </ul>
          </li>
          <a href="./registered_users.php">
          <li class="active">
              <i class="fa-solid fa-user"></i>
              <span>user</span>
          </li>
          </a>
          <a href="./requests.php">
          <li>
              <i class="fa-solid fa-clipboard-question"></i>
              <span>requests</span>
          </li>
          </a>
      </ul>
      </div>
        <div class="container">
            <div class="content-title">Registered Users</div>
            <div class="content">
                <div class="content-wrapper">
                    <div class="entries-search">
                        <div class="entries">
                            <label for="entries">Show</label>
                            <span>
                                <select name="entries" id="entries">
                                    <option value="">10</option>
                                </select>
                            </span>
                            <span>entries</span>
                        </div>
                        <div class="search">
                            <label for="search">Search: </label>
                            <input type="search" name="search" id="search">
                        </div>
                    </div>
                    <div class="search-table">
                        <table>
                            <thead>
                                    <th>S.No</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Mobile Number</th>
                                    <th>Email</th>
                            </thead>
                            <tbody>
                            <?php 
                                $sql = "SELECT * FROM users";
                                $result = mysqli_query($conn, $sql);
                                $rows = mysqli_num_rows($result);
                                for ($i = 0; $i < $rows; $i++) { 
                                    $users = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    $first_name = $users["first_name"];
                                    $last_name = $users["last_name"];
                                    $phone_number = $users["phone_number"];
                                    $email = $users["email"];
                    
                                    echo '
                                    <tr>
                                        <td>' . $i + 1 . '</td>
                                        <td>' . $first_name . '</td>
                                        <td>' . $last_name . '</td>
                                        <td>' . $phone_number . '</td>
                                        <td>' . $email . '</td>
                                    </tr>
                                    ';
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="bottom-content">
                            <label for="entries">Showing <span>1</span> to <span>4</span> of <span>4 </span>entries</label>
                            <div class="page-entries-nav">
                                <button>Previous</button>
                                <button>1</button>
                                <button>Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</html>