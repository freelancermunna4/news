<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php 

    $time = time(); 

    $product = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM product"));
    $pending_order = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM orders WHERE status !='Success'"));
    $success_order = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM orders WHERE status='Success'"));
    $customer = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM customer"));
    $moderator = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM admin_info WHERE role='Moderator'"));


    $total_warranty_fee = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(warranty_fee) FROM orders"));    
    $total_delivery_fee = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(delivery_fee) FROM orders"));

    
    $total_warranty_fee = $total_warranty_fee['SUM(warranty_fee)'];
    $total_delivery_fee = $total_delivery_fee['SUM(delivery_fee)'];
    $total_amount = $total_warranty_fee+$total_delivery_fee;
    
    $today = $time-864000;

    $today_our_cost = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(our_cost) FROM orders WHERE time > $today"));
    $total_our_cost = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(our_cost) FROM orders"));
    
    $total_profit = $total_amount - $total_our_cost['SUM(our_cost)'];
   

    $advance_amount = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(advance_amount) FROM orders"));
    $due_amount = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(due_amount) FROM orders"));
    
    $total_advance_amount = $advance_amount['SUM(advance_amount)'];
    $total_due_amount = $due_amount['SUM(due_amount)'];
?>
    <!-- Main Content -->
    <main class="w-full flex bg-gray-100">
      <!-- Side Navbar Links -->
      <?php include('common/sidebar.php')?>
      <!-- Side Navbar Links -->

      <!-- Content -->
      <section class="content_wrapper">
        <h4 class="text-xl font-medium">Dashboard</h4>
        <br />
        <div class="home_content">

           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon bg-gradient-to-r from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers">???<?php echo $total_amount; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">Total Amount</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>

           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers">???<?php echo $total_warranty_fee; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">Total Warranty Fee</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>

           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers">???<?php echo $total_delivery_fee; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">Total Delivery Fee</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>

           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers">???<?php echo $total_advance_amount; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">Total Advance Amount</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>

           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers">???<?php echo $total_due_amount; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">Total Due Amount</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>

           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $pending_order; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">Pendig Order</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>

           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $success_order; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">Success Order</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>

           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $product; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">All Product</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>

           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $customer; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">All Customer</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>

           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $moderator; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">All Moderator</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>
          
        </div>


           <!-- ------Company Total Cost & Profit------ -->
          <div class="our_cost_main">
            <div class="monthly_total_cost our_cost_row">
              <div class="monthly our_cost_box">
                <h2><?php echo $today_our_cost['SUM(our_cost)'];?></h2>
                <p>Monthly Cost</p>
                <!-- <div class="card_line">
                  <div style="width: 100%;height:7px;position:unset" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>  -->
              </div>
              <div class="total our_cost_box">
                <h2><?php echo $total_our_cost['SUM(our_cost)'];?></h2>
                <p>Total Cost</p>
                <!-- <div class="card_line">
                  <div style="width: 100%;height:7px;position:unset" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>  -->
              </div>
            </div>

            <div class="total_profit">
              <div class="profit our_cost_box">
                <h2><?php echo $total_profit;?></h2>
                <p>Total Profit</p>
                <!-- <div class="card_line">
                  <div style="width: 100%;height:7px;position:unset" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>             -->
              </div>
            </div>
          </div>


        
      </section>
      <!-- Content -->
    </main>

<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->