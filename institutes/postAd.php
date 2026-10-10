<?php include_once('../include/conn.php'); 
include_once('../function/common_function.php'); 
include_once('../include/main_header.php');
@session_start();
?>

<body style="background-color: rgba(225, 255, 226, 0.936);">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
      <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container-fluid">
          <a class="navbar-brand fw-bold text-dark mt-3" href="#"><img src="../assets/img/icon/favicon.png" style="max-height: 40px; margin-bottom: 12px;" class="mx-2" alt=""> E d u F l o w</a>
          
          <form class="d-flex mt-2" action="search_classes.php" method="get">

            <div class="searchBtn">
              <button type="button" class="btn btn-light mx-2" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-end">
                  <div class="d-flex searchIn">
                    <input class="form-control me-2 text-dark" name="search_data" type="search" placeholder="Search..." aria-label="Search">
                    <button class="btn btn-light" name="search_data_class" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                  </div>
              </ul>
            </div>

          </form>

          <button class="navbar-toggler mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto my-2 mb-lg-0 p-1">
              <li class="nav-item mx-2">
                <a class="nav-link active" aria-current="page" href="index.php"><img src="../assets/img/icon/home.png" class="mx-1 mb-1" alt="">Home</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link" href="contactUs.php"><img src="../assets/img/icon/about.png" class="mx-1 mb-1" alt="">About Us</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link" href="all_classes.php"><img src="../assets/img/icon/classes.png" class="mx-1 mb-1" alt="">Classes</a>
              </li>
              <li class="nav-item mx-2 dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="../assets/img/icon/category.png" class="mx-1 mb-1" alt="">Categories
                </a>
                <ul class="dropdown-menu" style="background: #4ced61;" aria-labelledby="navbarDropdown">
                  <li><?php getcategories(); ?></li>
                </ul>
              </li>
              <?php

              if(!isset($_SESSION['instLog'])){
                echo "<li class='nav-item mx-2'>
                        <a class='nav-link' href='./institute_login.php'><img src='../assets/img/icon/login.png' class='mx-1 mb-1' alt=''>Signin</a>
                      </li>";
              }else{
                
                $inst_email = $_SESSION['instLog'];
                $get_teach = "SELECT * FROM institute_table WHERE inst_email='$inst_email'";
                $result = mysqli_query($conn,$get_teach);
                $run_query = mysqli_fetch_array($result);
                $inst_id = $run_query['inst_id'];

                echo "<li class='nav-item mx-2'>
                        <a class='nav-link' href='./profile_info.php?inst_id=$inst_id'><img src='../assets/img/icon/profile-user.png' class='mx-1 mb-1' alt=''>Profile</a>
                      </li>
                      
                      <li class='nav-item mx-2'>
                        <a class='nav-link' href='logout.php'><img src='../assets/img/icon/exit.png' class='mx-1 mb-1' alt=''>Logout</a>
                      </li>";
              }
          
            ?>
              
            </ul>

            <ul class="navbar-nav me-auto my-2 mb-lg-0 p-1" style="border-radius: 12px; background: rgba(900, 955, 85, 0.800);">
              <?php

              if(!isset($_SESSION['instLog'])){
                echo "<li class='nav-item mx-2'>
                        <a class='nav-link' href='./institute_login.php'><img src='../assets/img/icon/add.png' class='mx-1' alt=''> Post Ad</a>
                      </li>";
              }else{
                echo "<li class='nav-item mx-2'>
                        <a class='nav-link' href='postAd.php'><img src='../assets/img/icon/add.png' class='mx-1' alt=''> Post Ad</a>
                      </li>";
              }
          
            ?>
              
            </ul>
            
          </div>
        </div>
      </nav>
    <!-- Navbar End -->

        <?php
  
          $inst_email = $_SESSION['instLog'];
          $get_teach = "SELECT * FROM institute_table WHERE inst_email='$inst_email'";
          $result = mysqli_query($conn,$get_teach);
          $run_query = mysqli_fetch_array($result);
          $inst_id = $run_query['inst_id'];
          $inst_name = $run_query['inst_name'];
          $inst_address = $run_query['inst_address'];
          $inst_email = $run_query['inst_email'];
          $inst_telNo = $run_query['inst_telNo'];
          
        ?>
      
        <!-- partial -->
        <div class="container main-panel">
          <div class="content-wrapper">

            <div class="row">
              <div class="col-lg-12 grid-margin">
                <div class="card mt-4 w-75 m-auto" style="background-color: #313131;">
                  <div class="card-body">
                    <h4 class="card-title text-center mt-4 text-white">Post your Ad</h4>

                    <form action="" method="post" enctype="multipart/form-data">

                    <!-- Teacher's Id -->
                        <div class="form-outline mb-4 w-75 m-auto">
                            <label for="inst_id" class="form-label text-secondary mt-3">Your User ID : </label>
                            <input type="text" READONLY name="inst_id" id="inst_id" class="form-control p-2 w-25" value="<?php echo $inst_id ?>">
                        </div>

                    <!-- Institute Name -->
                        <div class="form-outline mb-4 w-75 m-auto">
                            <label for="inst_name" class="form-label text-secondary mt-3">Institute Name</label>
                            <input type="text" READONLY name="inst_name" id="inst_name" class="form-control p-2" value="<?php echo $inst_name ?>">
                        </div>

                    <!-- Address -->
                        <div class="form-outline mb-4 w-75 m-auto">
                            <label for="inst_address" class="form-label text-secondary mt-2">Address</label>
                            <input type="text" READONLY name="inst_address" id="inst_address" class="form-control p-2" value="<?php echo $inst_address ?>">
                        </div> 

                    <!-- No Of Hall Availability -->
                        <div class="form-outline mb-4 w-75 m-auto">
                            <label for="hall_avb" class="form-label text-secondary mt-2">No of halls available</label>
                            <input type="text" name="hall_avb" id="hall_avb" class="form-control p-2" required="required" />
                        </div>

                    <!-- Email -->
                        <div class="form-outline mb-4 w-75 m-auto">
                            <label for="inst_email" class="form-label text-secondary mt-2">Email Address</label>
                            <input type="email" READONLY name="inst_email" id="inst_email" class="form-control p-2" value="<?php echo $inst_email ?>">
                        </div>

                    <!-- Contact No -->
                        <div class="form-outline mb-4 w-75 m-auto">
                            <label for="inst_telNo" class="form-label text-secondary mt-2">Contact No</label>
                            <input type="input" READONLY name="inst_telNo" id="inst_telNo" class="form-control p-2" value="<?php echo $inst_telNo ?>">
                        </div>

                    <!-- Display Image -->
                        <div class="form-outline mb-4 w-75 m-auto">
                            <label for="disp_img" class="form-label text-secondary mt-2">Display Poster</label>
                            <input type="file" name="disp_img" id="disp_img" class="form-control p-2" required="required" />
                        </div>
        
                        <div class="form-outline mb-4 w-75 m-auto">
                            <input type="submit" name="add_poster" class="btn btn-warning py-2 px-5 mt-4 rounded-3" value="Post Ad">
                        </div>
        
                    </form>
                    
                  </div>
                </div>
              </div>

              </div>

            </div>
          </div>
        </div>  
        <!-- content-wrapper ends -->

<?php

if(isset($_POST['add_poster'])){

    $inst_id = $_POST['inst_id'];
    $inst_name = $_POST['inst_name'];
    $inst_address = $_POST['inst_address'];
    $hall_avb = $_POST['hall_avb'];
    $inst_email = $_POST['inst_email'];
    $inst_telNo = $_POST['inst_telNo'];
    $status = 'unapproved';

    // accessing images
    $disp_img = $_FILES['disp_img']['name'];

    // accessing image temp name
    $temp_image = $_FILES['disp_img']['tmp_name'];

    //checking empty condition
    if($inst_id=='' or $inst_name=='' or $inst_address=='' or $hall_avb=='' or $inst_email=='' or $inst_telNo=='' or $disp_img==''){
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image,"./inst_images/$disp_img");;

        // insert query
        $insert_classes = "INSERT INTO inst_ad (inst_id,inst_name,inst_address,hall_avb,inst_email,inst_telNo,disp_img,date,status)
                            VALUES ('$inst_id','$inst_name','$inst_address','$hall_avb','$inst_email','$inst_telNo','$disp_img',NOW(),'$status')";
                            
                            $result_query = mysqli_query($conn,$insert_classes);
                            if($result_query){
                                echo "<script>alert('Post adding Successfully')</script>";
                            }
    }
}

?>        


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/lib/wow/wow.min.js"></script>
    <script src="../assets/lib/easing/easing.min.js"></script>
    <script src="../assets/lib/waypoints/waypoints.min.js"></script>
    <script src="../assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../assets/lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="../assets/js/main.js"></script>
  </body>
</html>