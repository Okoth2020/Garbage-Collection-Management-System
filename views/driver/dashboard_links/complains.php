<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/5f6453ff01.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../../css/driver/dashboard_links/complains.css">
    <script defer src="../../js/navbar.js"></script>
</head>
<body>
<nav>
      <div class="logo">
        <a href="../../index.php">garbage collection management</a>
      </div>
      <div class="navbar-navs">
        <div class="notification" title="notifications">
          <i class="fa-solid fa-bell"></i>
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
    <main>
        <div class="side-bar">
            <div class="personal-info">
                <img src="../../../images/person.jpeg" alt="">
                <div class="name">Admin</div>
                <div class="email">Email</div>
            </div>
            <hr>
            <div class="side-links">
            <ul>
                    <li><a href="../dashboard.php">Dashboard</a></li>
                    <li></i> <a href="./assigned_requests.php">Assigned Requsts</a></li>
                    <li><a href="./complains.php">Complains</a></li>
                    <li> <a href="">Report</a></li>
                    <li><a href="">Search</a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="content-title">Driver Complains</div>
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
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                    <th>Action</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Test1</td>
                                    <td>Driver</td>
                                    <td>email@gmail.com</td>
                                    <td>23/23/23</td>
                                    <td>
                                        <button>Edit</button>
                                        <button>View</button>
                                        <button>Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Test2</td>
                                    <td>User</td>
                                    <td>email@gmail.com</td>
                                    <td>9/2/24</td>
                                    <td>
                                        <button>Edit</button>
                                        <button>View</button>
                                        <button>Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Test3</td>
                                    <td>Driver</td>
                                    <td>email@gmail.com</td>
                                    <td>23/12/23</td>
                                    <td>
                                        <button>Edit</button>
                                        <button>View</button>
                                        <button>Delete</button>
                                    </td>
                                </tr>
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