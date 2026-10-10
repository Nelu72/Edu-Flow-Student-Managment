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
                        <h4 class="card-title text-center">Registered Teachers</h4>
                        <div class="table-responsive">
                          <table class="table table-bordered text-center">
                            <thead>
                              <tr>
                                <th> Teach ID </th>
                                <th> Teacher Name </th>
                                <th> Email </th>
                                <th> Teacher Image </th>
                                <th> Contact No </th>
                                <th> No of institute </th>
                                <th> Date </th>
                                <th> Delete </th>
                              </tr>
                            </thead>
                            <tbody>
                                      <?php
                                          $select_query = "SELECT * FROM teacher_table";
                                          $result_query = mysqli_query($conn,$select_query);
                                          while($row = mysqli_fetch_assoc($result_query)){
                                            $teach_id = $row['teach_id'];
                                            $teach_name = $row['teach_name'];
                                            $teach_email = $row['teach_email'];
                                            $teach_img = $row['teach_img'];
                                            $teach_telNo = $row['teach_telNo'];
                                            $noOf_instute = $row['noOf_instute'];
                                            $str = $row['date'];
                                            $date = date('g:i A, l - d M Y', strtotime($str));
                
                                            echo "
                                                <tr>
                                                    <td>$teach_id</td>
                                                    <td>$teach_name</td>
                                                    <td>$teach_email</td>
                                                    <td><img src='../teachers/teach_images/$teach_img' class='card-img-top mx-5' style='height:80px; width:170px; object-fit:cover; border-radius:4px;'></td>
                                                    <td>$teach_telNo</td>
                                                    <td>$noOf_instute</td>
                                                    <td>$date</td>
                                                    <td>
                                                        <form action='code.php' method='POST' class='d-inline'>
                                                            <button type='submit' name='delete_teach' value='$teach_id' class='btn btn-danger btn-sm p-2 mx-1'><i class='fa-solid fa-trash mx-1'></i></button>
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