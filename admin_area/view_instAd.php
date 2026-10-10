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

      <!-- header.php -->
      <?php include_once('./include/header.php'); ?> 
      
        <!-- partial -->
        <div class="main-panel">
        <?php include('message.php'); ?>
            <div class="content-wrapper">

            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title text-center">Posted Institute Ads</h4>
                        <div class="table-responsive">
                          <table class="table table-bordered text-center">
                            <thead>
                              <tr>
                                <th> Ad ID </th>
                                <th> Inst ID </th>
                                <th> Institute Name </th>
                                <th> Address </th>
                                <th> Availble Halls </th>
                                <th> Email </th>
                                <th> Contact No </th>
                                <th> Display Image </th>
                                <th> Date </th>
                                <th> Status </th>
                                <th> Approval </th>
                                <th> Delete </th>
                              </tr>
                            </thead>
                            <tbody>
                                      <?php
                                          $select_query = "SELECT * FROM inst_ad";
                                          $result_query = mysqli_query($conn,$select_query);
                                          while($row = mysqli_fetch_assoc($result_query)){
                                            $ad_id = $row['ad_id'];
                                            $inst_id = $row['inst_id'];
                                            $inst_name = $row['inst_name'];
                                            $inst_address = $row['inst_address'];
                                            $hall_avb = $row['hall_avb'];
                                            $inst_email = $row['inst_email'];
                                            $inst_telNo = $row['inst_telNo'];
                                            $disp_img = $row['disp_img'];
                                            $str = $row['date'];
                                            $date = date('g:i A, l - d M Y', strtotime($str));
                                            $status = $row['status'];
                
                                            echo "
                                                <tr>
                                                    <td>$ad_id</td>
                                                    <td>$inst_id</td>
                                                    <td>$inst_name</td>
                                                    <td>$inst_address</td>
                                                    <td>$hall_avb</td>
                                                    <td>$inst_email</td>
                                                    <td>$inst_telNo</td>
                                                    <td><img src='../institutes/inst_images/$disp_img' class='card-img-top mx-5' style='height:80px; width:170px; object-fit:cover; border-radius:4px;'></td>
                                                    <td>$date</td>
                                                    <td>$status</td>
                                                    <td>
                                                        <form action='code.php' method='post' class='float-right'>
                                                          <input type='hidden' name='ad_id' value='$ad_id' >
                                                                  
                                                            <div class='input-group w-25 mt-2 mx-4'>
                                                              <input type='checkbox' class='form-control text-light' name='status' value='$status' aria-label='Username' aria-describedby='basic-addon1' required='required'>
                                                            </div>
                                                            
                                                            <div class='input-group w-10 mb-2'>
                                                              <input type='submit' class='btn btn-danger' name='update_instAdStatus' value='Approve' aria-label='Username' aria-describedby='basic-addon1'>
                                                            </div>
                                                                  
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form action='code.php' method='POST' class='d-inline'>
                                                            <button type='submit' name='delete_inst' value='$inst_id' class='btn btn-danger btn-sm p-2 mx-1'><i class='fa-solid fa-trash mx-1'></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                              "; 
                                            }
                                      ?>
                            </tbody>
                          </table>
                        </div>
                    </div>
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