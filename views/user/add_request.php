<div class="content">
      <?php 
        if (isset($_POST["request"])) {
          $region = $_POST["region"];
          $county = $_POST["county"];
          $landmark = $_POST["landmark"];
          $route = $_POST["route"];
          $load = $_POST["load"];
          $cycle = $_POST["cycle"];
          $package = $_POST["package"];
          $photo = $_POST["photo"];
          $payment_method = $_POST["payment_method"];
          $payment_id = $_POST["payment_id"];

          if ($region == "") {
            echo '
              <div class="form-warning">
                  <img src="../../images/error.png" alt="">
                  <span>Please enter the region your are located</span>
              </div>';
          } else if ($county == "") {
            echo '
            <div class="form-warning">
                <img src="../../images/error.png" alt="">
                <span>Please enter the county your are located</span>
            </div>';
          } else if ($landmark == "") {
            echo '
            <div class="form-warning">
                <img src="../../images/error.png" alt="">
                <span>Please enter the landmark that is easy to spot</span>
            </div>';
          } else if ($route == "") {
            echo '
            <div class="form-warning">
                <img src="../../images/error.png" alt="">
                <span>Please enter the route that your buses take</span>
            </div>';
          } else if ($photo == "") {
            echo '
            <div class="form-warning">
                <img src="../../images/error.png" alt="">
                <span>Please upload a photo of the garbage</span>
            </div>';
          }
        }
        if (isset($_POST["save"])) {
            if ($payment_method == "") {
                echo '
                <div class="form-warning">
                    <img src="../../images/error.png" alt="">
                    <span>Please enter the payment method details or click make payment</span>
                </div>';
            } else if ($payment_id == "") {
                echo '
                <div class="form-warning">
                    <img src="../../images/error.png" alt="">
                    <span>Please enter the payment id details or click make payment</span>
                </div>';
            }
        }
      ?>
      <form action="" method="post">
        <div>
          <label for="region">Region</label>
          <?php 
          if (isset($_POST["request"])) {
            if ($region == "") {
                echo '<input type="text" name="region" id="region" />';
            } else {
                echo '<input type="text" name="region" id="region" value="' . $region . '" />';
            }
          } else {
            echo '<input type="text" name="region" id="region" />';
          }
          ?>
        </div>
        <div>
          <label for="county">County</label>
          <?php 
          if (isset($_POST["request"])) {
            if ($county == "") {
                echo '<input type="text" name="county" id="county" />';
            } else {
                echo '<input type="text" name="county" id="county" value="' . $county . '" />';
            }
          } else {
            echo '<input type="text" name="county" id="county" />';
          }
          ?>
        </div>
        <div>
          <label for="landmark">Landmark</label>
          <?php 
          if (isset($_POST["request"])) {
            if ($landmark == "") {
                echo '<input type="text" name="landmark" id="landmark" />';
            } else {
                echo '<input type="text" name="landmark" id="landmark" value="' . $landmark . '" />';
            }
          } else {
            echo '<input type="text" name="landmark" id="landmark" />';
          }
          ?>
        </div>
        <div>
          <label for="route">Bus route address</label>
          <?php 
          if (isset($_POST["request"])) {
            if ($route == "") {
                echo '<input type="text" name="route" id="route" />';
            } else {
                echo '<input type="text" name="route" id="route" value="' . $route . '" />';
            }
          } else {
            echo '<input type="text" name="route" id="route" />';
          }
          ?>
        </div>
        <div>
          <label for="load">Load size</label>
          <?php 
          if (isset($_POST["request"])) {
            if ($load == "") {
                echo '<select name="load" id="load">
                  <option value="dustbin">dustbin size</option>
                  <option value="tank">tank size</option>
                  <option value="pickup">pickup size</option>
                  <option value="truck">truck size</option>
                </select>';
            } else {
                if ($load == "tank") {
                  echo '<select name="load" id="load">
                    <option value="dustbin">dustbin size</option>
                    <option value="tank" selected>tank size</option>
                    <option value="pickup">pickup size</option>
                    <option value="truck">truck size</option>
                  </select>';
                } else if ($load == "pickup") {
                  echo '<select name="load" id="load">
                    <option value="dustbin">dustbin size</option>
                    <option value="tank">tank size</option>
                    <option value="pickup" selected>pickup size</option>
                    <option value="truck">truck size</option>
                  </select>';
                } else if ($load == "truck") {
                  echo '<select name="load" id="load">
                    <option value="dustbin">dustbin size</option>
                    <option value="tank">tank size</option>
                    <option value="pickup">pickup size</option>
                    <option value="truck" selected>truck size</option>
                  </select>';
                } else {
                  echo '<select name="load" id="load">
                    <option value="dustbin">dustbin size</option>
                    <option value="tank">tank size</option>
                    <option value="pickup">pickup size</option>
                    <option value="truck">truck size</option>
                  </select>';
                }
            }
          } else {
            echo '<select name="load" id="load">
              <option value="dustbin">dustbin size</option>
              <option value="tank">tank size</option>
              <option value="pickup">pickup size</option>
              <option value="truck">truck size</option>
            </select>';
          }
          ?>
        </div>
        <div>
          <label for="cycle">Period of cycle</label>
          <?php 
          if (isset($_POST["request"])) {
            if ($cycle == "") {
                echo '<select name="cycle" id="cycle">
                  <option value="everyday">Everyday</option>
                  <option value="weekly">Once a week</option>
                  <option value="monthly">Once a month</option>
                  <option value="Additional">Additional</option>
                  <option value="once">One time only</option>
                </select>';
            } else {
                if ($cycle == "weekly") {
                  echo '<select name="cycle" id="cycle">
                    <option value="everyday">Everyday</option>
                    <option value="weekly" selected>Once a week</option>
                    <option value="monthly">Once a month</option>
                    <option value="Additional">Additional</option>
                    <option value="once">One time only</option>
                  </select>';
                } else if ($cycle == "monthly") {
                  echo '<select name="cycle" id="cycle">
                    <option value="everyday">Everyday</option>
                    <option value="weekly">Once a week</option>
                    <option value="monthly" selected>Once a month</option>
                    <option value="Additional">Additional</option>
                    <option value="once">One time only</option>
                  </select>';
                } else if ($cycle == "once") {
                  echo '<select name="cycle" id="cycle">
                    <option value="everyday">Everyday</option>
                    <option value="weekly">Once a week</option>
                    <option value="monthly">Once a month</option>
                    <option value="Additional">Additional</option>
                    <option value="once" selected>One time only</option>
                  </select>';
                } else {
                    echo '<select name="cycle" id="cycle">
                    <option value="everyday">Everyday</option>
                    <option value="weekly">Once a week</option>
                    <option value="monthly">Once a month</option>
                    <option value="Additional">Additional</option>
                    <option value="once">One time only</option>
                  </select>';
                }
            }
          } else {
            echo '<select name="cycle" id="cycle">
              <option value="everyday">Everyday</option>
              <option value="weekly">Once a week</option>
              <option value="monthly">Once a month</option>
              <option value="Additional">Additional</option>
              <option value="once">One time only</option>
            </select>';
          }
          ?>
        </div>
        <div>
          <label for="package">Payment Package</label>  
          <?php 
          if (isset($_POST["request"])) {
            if ($package == "") {
                echo '<select name="package" id="package">
                  <option value="residential">Residential - $30</option>
                  <option value="business">Business - $100</option>
                  <option value="industrial">Industrial - $150</option>
                  <option value="construction">Construction Site - $200</option>
                </select>';
            } else {
                if ($package == "business") {
                  echo '<select name="package" id="package">
                    <option value="residential">Residential - $30</option>
                    <option value="business" selected>Business - $100</option>
                    <option value="industrial">Industrial - $150</option>
                    <option value="construction">Construction Site - $200</option>
                  </select>';
                } else if ($package == "industrial") {
                  echo '<select name="package" id="package">
                    <option value="residential">Residential - $30</option>
                    <option value="business">Business - $100</option>
                    <option value="industrial" selected>Industrial - $150</option>
                    <option value="construction">Construction Site - $200</option>
                  </select>';
                } else if ($package == "construction") {
                  echo '<select name="package" id="package">
                    <option value="residential">Residential - $30</option>
                    <option value="business">Business - $100</option>
                    <option value="industrial">Industrial - $150</option>
                    <option value="construction" selected>Construction Site - $200</option>
                  </select>';
                } else {
                  echo '<select name="package" id="package">
                    <option value="residential">Residential - $30</option>
                    <option value="business">Business - $100</option>
                    <option value="industrial">Industrial - $150</option>
                    <option value="construction">Construction Site - $200</option>
                  </select>';
                }
            }
          } else {
            echo '<select name="package" id="package">
              <option value="residential">Residential - $30</option>
              <option value="business">Business - $100</option>
              <option value="industrial">Industrial - $150</option>
              <option value="construction">Construction Site - $200</option>
            </select>';
          }
          ?>
        </div>
        <div>
          <label for="photo">Upload photo of garbage site</label>
          <?php 
          if (isset($_POST["request"])) {
            if ($photo == "") {
                echo '<input type="file" name="photo" id="photo" />';
            } else {
                echo '<input type="file" name="photo_file" id="photo" /><input type="text" name="photo" value="' . $photo . '" />';
            }
          } else {
            echo '<input type="file" name="photo" id="photo" />';
          }
          ?>
        </div>
        <div>
            <label for="payment">Payment Details</label>
            <input type="text" name="payment_method" id="payment-method">
            <input type="text" name="payment_id" id="payment-id">
            <input type="text" name="payment_amount" id="payment-amount">
        </div>
        <div class="button-submit">
            <button type="submit" name="request">Make payment</button>
            <button type="submit" name="save" id="save" disabled>Save</button>
        </div>
      </form>
    </div>