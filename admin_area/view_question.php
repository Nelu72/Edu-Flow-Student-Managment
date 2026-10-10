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
                            <h4 class="card-title text-center">question</h4>
                            <div class="table-responsive">
                              <table class="table table-bordered text-center">
                                <thead>
                                  <tr>
                                    <th> ID </th>
                                    <th> User ID </th>
                                    <th> Name </th>
                                    <th> Mobile Number </th>
                                    <th> Teacher </th>
                                    <th> Comment </th>
                                    <th> Status </th>
                                    <th> Date </th>
                                    <th> Delete </th>
                                  </tr>
                                </thead>
                                <tbody>
                                          <?php
                                              $select_query = "SELECT * FROM question ORDER BY nt_id DESC";
                                              $result_query = mysqli_query($conn,$select_query);
                                              while($row = mysqli_fetch_assoc($result_query)){
                                                $nt_id = $row['nt_id'];
                                                $user_id = $row['user_id'];
                                                $nt_name = $row['nt_name'];
                                                $nt_no = $row['nt_no'];
                                                $teach_id = $row['teach_id'];
                                                $nt_comment = $row['nt_comment'];
                                                $status = $row['status'];
                                                $str = $row['date'];
                                                $date = date('g:i A, l - d M Y', strtotime($str));
                                                echo "
                                                    <tr>
                                                        <td>$nt_id</td>
                                                        <td>$user_id</td>
                                                        <td><a href='notifyview.php?nt_id=$nt_id' class='text-decoration-none'>$nt_name</a></td>
                                                        <td>$nt_no</td>
                                                        <td>$teach_id</td>
                                                        <td>$nt_comment</td>
                                                        <td>$status</td>
                                                        <td>$date</td>
                                                        <td>
                                                            <form action='code.php' method='POST' class='d-inline'>
                                                                <button type='submit' name='delete_notification' value='$nt_id' class='btn btn-danger btn-sm p-2 mx-1'><i class='fa-solid fa-trash mx-1'></i></button>
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