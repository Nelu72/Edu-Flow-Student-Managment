<?php include_once('./include/main_header.php');
include_once('../include/conn.php'); 
@session_start();
?>

  <body>
    <div class="container-scroller">
      
      <!-- sidebar.php -->
      <?php include_once('./include/sidebar.php'); ?>

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">

      <!-- header.php -->
      <?php include_once('./include/header.php'); ?> 

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

            <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <?php
                        
                              $query = "SELECT class_id FROM classes ORDER BY class_id";  
                              $query_run = mysqli_query($conn, $query);
                              $row = mysqli_num_rows($query_run);
                              echo "<h3 class='mb-0'>$row</h3>";
                          ?>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-primary ">
                          <span><i class="fa-solid fa-book"></i></span>
                        </div>
                      </div>
                    </div>
                    <a href="view_classes.php" class="text-muted font-weight-normal text-decoration-none">Classes</a>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <?php
                              
                              $query = "SELECT ad_id FROM inst_ad ORDER BY ad_id";  
                              $query_run = mysqli_query($conn, $query);
                              $row = mysqli_num_rows($query_run);
                              echo "<h3 class='mb-0'>$row</h3>";
                          ?>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-primary">
                          <span><i class="fa-solid fa-building-columns"></i></span>
                        </div>
                      </div>
                    </div>
                    <a href="view_instPost.php" class="text-muted font-weight-normal text-decoration-none">Institute Post</a>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <?php
                                
                                $query = "SELECT teach_id FROM teacher_table ORDER BY teach_id";  
                                $query_run = mysqli_query($conn, $query);
                                $row = mysqli_num_rows($query_run);
                                echo "<h3 class='mb-0'>$row</h3>";
                          ?>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-primary">
                          <span><i class="fa-solid fa-person-circle-check"></i></span>
                        </div>
                      </div>
                    </div>
                    <a href="view_teachers.php" class="text-muted font-weight-normal text-decoration-none">Teachers</a>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">200</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-primary ">
                          <span><i class="fa-solid fa-message"></i></span>
                        </div>
                      </div>
                    </div>
                    <a href="view_booking.php" class="text-muted font-weight-normal text-decoration-none">Messages</a>
                  </div>
                </div>
              </div>
            </div>

    <!-- content-wrapper ends -->

          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

<?php include_once('./include/footer.php'); ?>