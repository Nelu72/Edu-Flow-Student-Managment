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
                        <h4 class="card-title text-center">Registered Institutes</h4>
                        <div class="table-responsive">
                          <table class="table table-bordered text-center">
                            <thead>
                              <tr>
                                <th> Inst ID </th>
                                <th> Institute Name </th>
                                <th> Email </th>
                                <th> Address </th>
                                <th> Contact No </th>
                                <th> Main Image </th>
                                <th> Image 1 </th>
                                <th> Image 2 </th>
                                <th> Image 3 </th>
                                <th> No of halls </th>
                                <th> No of teachers </th>
                                <th> Date </th>
                                <th> Delete </th>
                              </tr>
                            </thead>
                            <tbody>
                                      <?php
                                          $select_query = "SELECT * FROM institute_table";
                                          $result_query = mysqli_query($conn,$select_query);
                                          while($row = mysqli_fetch_assoc($result_query)){
                                            $inst_id = $row['inst_id'];
                                            $inst_name = $row['inst_name'];
                                            $inst_email = $row['inst_email'];
                                            $inst_address = $row['inst_address'];
                                            $inst_telNo = $row['inst_telNo'];
                                            $inst_mainImg = $row['inst_mainImg'];
                                            $inst_img1 = $row['inst_img1'];
                                            $inst_img2 = $row['inst_img2']; 
                                            $inst_img3 = $row['inst_img3']; 
                                            $noOf_halls = $row['noOf_halls'];
                                            $noOf_teach = $row['noOf_teach'];
                                            $str = $row['date'];
                                            $date = date('g:i A, l - d M Y', strtotime($str));
                
                                            echo "
                                                <tr>
                                                    <td>$inst_id</td>
                                                    <td>$inst_name</td>
                                                    <td>$inst_email</td>
                                                    <td>$inst_address</td>
                                                    <td>$inst_telNo</td>
                                                    <td><img src='../institutes/inst_images/$inst_mainImg' class='card-img-top mx-5' style='height:80px; width:170px; object-fit:cover; border-radius:4px;'></td>
                                                    <td><img src='../institutes/inst_images/$inst_img1' class='card-img-top mx-5' style='height:80px; width:170px; object-fit:cover; border-radius:4px;'></td>
                                                    <td><img src='../institutes/inst_images/$inst_img2' class='card-img-top mx-5' style='height:80px; width:170px; object-fit:cover; border-radius:4px;'></td>
                                                    <td><img src='../institutes/inst_images/$inst_img3' class='card-img-top mx-5' style='height:80px; width:170px; object-fit:cover; border-radius:4px;'></td>
                                                    <td>$noOf_halls</td>
                                                    <td>$noOf_teach</td>
                                                    <td>$date</td>
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