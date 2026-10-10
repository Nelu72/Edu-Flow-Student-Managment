<?php 
session_start();
include ('../include/conn.php') ; 
?>

<?php include_once('./include/main_header.php'); ?>

<body>
    <div class="container-scroller">
      
      <!-- sidebar.php -->
      <?php include_once('./include/sidebar.php'); ?>

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">

      <!-- Header Start -->
      <?php include_once('./include/header.php'); ?>
        <!-- Header End -->
      
        <!-- partial -->
        <div class="main-panel">
        <?php include('./message.php'); ?>
            <div class="content-wrapper">

                <div class="row">

                    <div class="col-lg-8 m-auto grid-margin stretch-card">
                        <div class="card">
                          <?php notify_details() ; ?>
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