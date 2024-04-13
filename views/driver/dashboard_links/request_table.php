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
                <th>Request Number</th>
                <th>Region</th>
                <th>County</th>
                <th>Date</th>
                <th>Landmark</th>
                <th>Bus route</th>
                <th>Load</th>
                <th>Period of cycle</th>
                <th>Package</th>                                  
                <th>amount</th>                                  
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php 
                for ($i=0; $i < $row_count; $i++) { 
                    $actions = mysqli_fetch_array($results);
                    $username = $actions["username"];
                    $requests_sql = "SELECT * FROM requests WHERE username='$username'";
                    if (isset($_GET["category"])) {
                        $category = $_GET["category"];
                        if ($category == "progressing") {
                            $requests_sql = "SELECT * FROM requests WHERE username='$username' AND status='approved' OR status='on the way'";
                        } else {
                            $requests_sql = "SELECT * FROM requests WHERE username='$username' AND status='completed'";
                        }
                    }
                    $requests_results = mysqli_query($conn, $requests_sql);
                    $requests_row_count = mysqli_num_rows($requests_results);
                    for ($j=0; $j < $requests_row_count; $j++) { 
                        $requests = mysqli_fetch_array($requests_results, MYSQLI_ASSOC);
                        $region = $requests["region"];
                        $county = $requests["county"];
                        $landmark = $requests["landmark"];
                        $route = $requests["route"];
                        $load = $requests["load_size"];
                        $cycle = $requests["cycle"];
                        $package = $requests["package"];
                        $amount = $requests["payment_amount"];
                        $payment_id = $requests["payment_id"];
                        $dated = $requests["dated"];
                        $status = $requests["status"];
        
                        echo '
                        <tr>
                            <td>' . $payment_id . '</td>
                            <td>' . $region . '</td>
                            <td>' . $county . '</td>
                            <td>' . $dated . '</td>
                            <td>' . $landmark . '</td>
                            <td>' . $route . '</td>
                            <td>' . $load . '</td>
                            <td>' . $cycle . '</td>
                            <td>' . $package . '</td>                                   
                            <td>' . $amount . '</td>                                   
                            <td>' . $status . '</td>
                            <td>
                            <a href="requests.php?id=' . $payment_id . '">
                                <button type="submit" name="details">View</button>
                            </a>
                            </td>
                        </tr>
                        ';
                    }
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