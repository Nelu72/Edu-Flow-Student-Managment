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
              <div class="col-lg-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-center">Insert Grade Categories</h4>

                    <form action="code.php" method="post">

                    <!-- Grade Name -->
                        <div class="input-group w-90 mb-2 mt-3">
                          <span class="input-group-text bg-success" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
                          <input type="text" class="form-control text-white" name="grade_name" placeholder="Insert Grade Category" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
        
                        <div class="input-group w-10 mb-2">
                          <input type="submit" class="bg-success border-0 p-2 my-3" style="border-radius: 4px;" name="insert_gradeCtg" value="Insert Category" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
        
                    </form>
                    
                  </div>
                </div>
              </div>

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-center">Added Carousel</h4>
                    <div class="table-responsive">
                      <table class="table table-bordered text-center">
                        <thead>
                          <tr>
                            <th> ID </th>
                            <th> Grade Name </th>
                            <th> Delete </th>
                          </tr>
                        </thead>
                        <tbody>
                                  <?php
                                      $select_query = "SELECT * FROM grade_cat";
                                      $result_query = mysqli_query($conn,$select_query);
                                      while($row = mysqli_fetch_assoc($result_query)){
                                        $grade_id = $row['grade_id'];
                                        $grade_name = $row['grade_name'];
                                        echo "
                                          <tr>
                                              <td>$grade_id</td>
                                              <td>$grade_name</td>
                                              <td>
                                                  <form action='code.php' method='POST' class='d-inline'>
                                                      <button type='submit' name='delete_grade' value='$grade_id' class='btn btn-danger btn-sm p-2 mx-2'><i class='fa-solid fa-trash mx-1'></i></button>
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