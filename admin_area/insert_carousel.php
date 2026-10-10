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
                    <h4 class="card-title text-center">Insert Carousel</h4>

                    <form action="code.php" method="post" enctype="multipart/form-data">

                    <!-- image1 -->
                        <div class="form-outline mb-4 w-75 m-auto">
                            <label for="carousel_image1" class="form-label">Carousel Image1</label>
                            <input type="file" name="carousel_image1" id="carousel_image1" class="form-control p-2" required="required">
                        </div>
        
                    <!-- image2 -->
                        <div class="form-outline mb-4 w-75 m-auto">
                            <label for="carousel_image2" class="form-label mt-3">Carousel Image2</label>
                            <input type="file" name="carousel_image2" id="carousel_image2" class="form-control p-2" required="required">
                        </div>
                    
                    <!-- image3 -->
                        <div class="form-outline mb-4 w-75 m-auto">
                            <label for="carousel_image3" class="form-label mt-3">Carousel Image3</label>
                            <input type="file" name="carousel_image3" id="carousel_image3" class="form-control p-2" required="required">
                        </div>
        
                        <div class="form-outline mb-4 w-75 m-auto">
                            <input type="submit" name="insert_carousel" class="btn btn-danger py-2 px-3 mt-4" value="Insert Carousel">
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
                            <th> Carousel Image1 </th>
                            <th> Carousel Image2 </th>
                            <th> Carousel Image3 </th>
                            <th> Delete </th>
                          </tr>
                        </thead>
                        <tbody>
                                  <?php
                                      $select_query = "SELECT * FROM carousel";
                                      $result_query = mysqli_query($conn,$select_query);
                                      while($row = mysqli_fetch_assoc($result_query)){
                                        $carousel_id = $row['carousel_id'];
                                        $carousel_image1 = $row['carousel_image1'];
                                        $carousel_image2 = $row['carousel_image2'];
                                        $carousel_image3 = $row['carousel_image3'];
                                        echo "
                                          <tr>
                                              <td>$carousel_id</td>
                                              <td><img src='./all-img/$carousel_image1' class='card-img-top mx-5' style='height:80px; width:170px; object-fit:cover; border-radius:4px;'></td>
                                              <td><img src='./all-img/$carousel_image2' class='card-img-top mx-5' style='height:80px; width:170px; object-fit:cover; border-radius:4px;'></td>
                                              <td><img src='./all-img/$carousel_image3' class='card-img-top mx-5' style='height:80px; width:170px; object-fit:cover; border-radius:4px;'></td>
                                              <td>
                                                  <form action='code.php' method='POST' class='d-inline'>
                                                      <button type='submit' name='delete_carousel' value='$carousel_id' class='btn btn-danger btn-sm p-2 mx-2'><i class='fa-solid fa-trash mx-1'></i></button>
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