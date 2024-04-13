<div class="container">
    <div class="content-title">Manage Driver</div>
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
                            <th>Employee ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Mobile Number</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Action</th>
                    </thead>
                    <tbody>
                    <?php 
                        require_once "../../../db/database.php";
                        $sql = "SELECT * FROM drivers";
                        $result = mysqli_query($conn, $sql);
                        $rows = mysqli_num_rows($result);
                        for ($i = 0; $i < $rows; $i++) { 
                            $driver = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            $driver_id = $driver["driver_id"];
                            $first_name = $driver["first_name"];
                            $last_name = $driver["last_name"];
                            $number = $driver["mobile_number"];
                            $email = $driver["email"];
                            $address = $driver["address"];
            
                            echo '
                            <tr>
                                <td>' . $driver_id . '</td>
                                <td>' . $first_name . '</td>
                                <td>' . $last_name . '</td>
                                <td>' . $number . '</td>
                                <td>' . $email . '</td>
                                <td>' . $address . '</td>
                                <td>
                                    <div>
                                        <a href="manage_driver.php?edit=true&id=' . $driver_id . '">
                                            <button type="submit" name="edit">Edit</button>
                                        </a>
                                        <a href="manage_driver.php?delete=true&id=' . $driver_id . '">
                                            <button type="submit" name="delete">Delete</button>
                                        </a>
                                    </div>
                                </td>
                                </td>
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