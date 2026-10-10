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
                        <h4 class="card-title text-center">Added Classes</h4>
                        <div class="table-responsive">
                          <table class="table table-bordered text-center">
                            <thead>
                              <tr>
                                <th> Class ID </th>
                                <th> Teacher Name </th>
                                <th> Subject </th>
                                <th> Grade Category </th>
                                <th> Class Grade </th>
                                <th> Class Day </th>
                                <th> Class Time </th>
                                <th> Keywords </th>
                                <th> Discription </th>
                                <th> Teacher Email </th>
                                <th> Teacher Tel No </th>
                                <th> Disp Image </th>
                                <th> Date </th>
                                <th> Delete </th>
                                <th> Status </th>
                                <th> Approval </th>
                              </tr>
                            </thead>
                            <tbody>
                                      <?php
                                          $select_query = "SELECT * FROM classes ORDER BY class_id DESC";
                                          $result_query = mysqli_query($conn,$select_query);
                                          while($row = mysqli_fetch_assoc($result_query)){
                                            $class_id = $row['class_id'];
                                            $teach_name = $row['teach_name'];
                                            $subject = $row['subject'];
                                            $grade_id = $row['grade_id'];
                                            $class_grade = $row['class_grade'];
                                            $class_day = $row['class_day'];
                                            $class_time = $row['class_time'];
                                            $class_keywords = $row['class_keywords'];
                                            $class_description = $row['class_description'];
                                            $teach_email = $row['teach_email'];
                                            $teach_telNo = $row['teach_telNo'];
                                            $disp_img = $row['disp_img'];
                                            $str = $row['date'];
                                            $date = date('g:i A, l - d M Y', strtotime($str));
                                            $status = $row['status'];
                
                                            echo "
                                                <tr>
                                                    <td>$class_id</td>
                                                    <td>$teach_name</td>
                                                    <td>$subject</td>
                                                    <td>$grade_id</td>
                                                    <td>$class_grade</td>
                                                    <td>$class_day</td>
                                                    <td>$class_time</td>
                                                    <td>$class_keywords</td>
                                                    <td>$class_description</td>
                                                    <td>$teach_email</td>
                                                    <td>$teach_telNo</td>
                                                    <td><img src='../Class_images/$disp_img' class='card-img-top mx-5' style='height:80px; width:170px; object-fit:cover; border-radius:4px;'></td>
                                                    <td>$date</td>
                                                    <td>
                                                        <form action='code.php' method='POST' class='d-inline'>
                                                            <button type='submit' name='delete_class' value='$class_id' class='btn btn-danger btn-sm p-2 mx-1'><i class='fa-solid fa-trash mx-1'></i></button>
                                                        </form>
                                                    </td>
                                                    <td>$status</td>
                                                    <td>
                                                        <form action='code.php' method='post' class='float-right'>
                                                          <input type='hidden' name='class_id' value='$class_id' >
                                                                  
                                                            <div class='input-group w-25 mt-2 mx-4'>
                                                              <input type='checkbox' class='form-control text-light' name='status' value='$status' aria-label='Username' aria-describedby='basic-addon1' required='required'>
                                                            </div>
                                                            
                                                            <div class='input-group w-10 mb-2'>
                                                              <input type='submit' class='btn btn-danger' name='update_ClsStatus' value='Approve' aria-label='Username' aria-describedby='basic-addon1'>
                                                            </div>
                                                                  
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