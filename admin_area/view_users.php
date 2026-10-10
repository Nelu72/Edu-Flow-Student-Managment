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
                            <h4 class="card-title text-center">Registered Users</h4>
                            <div class="table-responsive">
                              <table class="table table-bordered text-center">
                                <thead>
                                  <tr>
                                    <th> User ID </th>
                                    <th> Username </th>
                                    <th> User Email </th>
                                    <th> Signup Date/Time </th>
                                    <th> Delete </th>
                                  </tr>
                                </thead>
                                <tbody>
                                          <?php
                                              $select_query = "SELECT * FROM user_table";
                                              $result_query = mysqli_query($conn,$select_query);
                                              while($row = mysqli_fetch_assoc($result_query)){
                                                $user_id = $row['user_id'];
                                                $username = $row['username'];
                                                $user_email = $row['user_email'];
                                                $str = $row['date'];
                                                $date = date('g:i A, l - d M Y', strtotime($str));
                                                echo "
                                                    <tr>
                                                        <td>$user_id</td>
                                                        <td>$username</td>
                                                        <td>$user_email</td>
                                                        <td>$date</td>
                                                        <td>
                                                            <form action='code.php' method='POST' class='d-inline'>
                                                                <button type='submit' name='delete_user' value='$user_id' class='btn btn-danger btn-sm p-2 mx-1'><i class='fa-solid fa-trash mx-1'></i></button>
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