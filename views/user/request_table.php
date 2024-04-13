<div class="collection-table">
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
                require_once "../../db/database.php";
                $username = $user["username"];
                $sql = "SELECT * FROM requests WHERE username='$username' ORDER BY id DESC";
                $result = mysqli_query($conn, $sql);
                $rows = mysqli_num_rows($result);
                for ($i = 0; $i < $rows; $i++) { 
                    $collections = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $region = $collections["region"];
                    $county = $collections["county"];
                    $landmark = $collections["landmark"];
                    $route = $collections["route"];
                    $load = $collections["load_size"];
                    $cycle = $collections["cycle"];
                    $package = $collections["package"];
                    $amount = $collections["payment_amount"];
                    $payment_id = $collections["payment_id"];
                    $dated = $collections["dated"];
                    $status = $collections["status"];
                    if($cycle == "Additional"){
                        echo '
                        <tr style="background-color: peru;">
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
                    else{
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
      <form action="" method="post">
        <button class="new-request" type="submit" name="new_request">New request</button>
      </form>
    </div>