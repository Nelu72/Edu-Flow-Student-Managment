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

              if(!isset($_SESSION['username'])){
                echo "<li class='nav-item mx-2'>
                        <a class='nav-link' href='./user_login.php'><img src='../assets/img/icon/login.png' class='mx-1 mb-1' alt=''>Signin</a>
                      </li>";
              }else{
                echo "<li class='nav-item mx-2'>
                        <a class='nav-link' href='./profile_info.php'><img src='../assets/img/icon/profile-user.png' class='mx-1 mb-1' alt=''>Profile</a>
                      </li>
                      
                      <li class='nav-item mx-2'>
                        <a class='nav-link' href='logout.php'><img src='../assets/img/icon/exit.png' class='mx-1 mb-1' alt=''>Logout</a>
                      </li>";
              }
          
            ?>
              
            </ul>

            <ul class="navbar-nav me-auto my-2 mb-lg-0 p-1" style="border-radius: 12px; background: rgba(900, 955, 85, 0.800);">
              <?php
    
              if(!isset($_SESSION['username'])){
                echo "<li class='nav-item mx-2'>
                        <a class='nav-link' href='./user_login.php'>Ask a Question <img src='../assets/img/icon/question.png' class='mx-1' alt=''></a>
                      </li>";
              }else{
                echo "<li class='nav-item mx-2'>
                        <a class='nav-link' href='askQue.php'>Ask a Question <img src='../assets/img/icon/question.png' class='mx-1' alt=''></a>
                      </li>";
              }
              
              ?>
              
            </ul>
            
          </div>
        </div>
      </nav>
    <!-- Navbar End -->

        <!-- php code to access user id -->
        <?php
  
          $username = $_SESSION['username'];
          $get_user = "SELECT * FROM user_table WHERE username='$username'";
          $result = mysqli_query($conn,$get_user);
          $run_query = mysqli_fetch_array($result);
          $user_id = $run_query['user_id'];
          
        ?>
      
        <!-- partial -->
        <div class="container main-panel">
          <div class="content-wrapper">

            <div class="row">
              <div class="col-lg-12 grid-margin">
                <div class="card mt-4 w-75 m-auto" style="background-color: #313131;">
                  <div class="card-body">
                    <h4 class="card-title text-center mt-4 text-white">Send your Message</h4>

                    <form action="../admin_area/code.php" method="post" enctype="multipart/form-data">
                
                    <!-- Name -->
                        <div class="form-outline mb-4 w-75 m-auto">
                            <label for="nt_name" class="form-label text-secondary mt-3">Enter your Name *</label>
                            <input type="text" name="nt_name" id="nt_name" class="form-control p-2" placeholder="Please enter your name" required="required" />
                        </div>
    
                    <!-- Number -->
                        <div class="form-outline mb-4 w-75 m-auto">
                            <label for="nt_no" class="form-label text-secondary mt-3">Enter your Number *</label>
                            <input type="text" name="nt_no" id="nt_no" class="form-control p-2" placeholder="Please enter your number" required="required" />
                        </div>

                    <!-- Teacher Name -->
                        <div class="form-outline mb-4 w-75 m-auto">
                          <label for="teach_id" class="form-label text-secondary mt-2">Select teacher *</label>
                          <select name="class_ctg" id="" class="form-select" required="required" />
                              <option value="">Who do you want to send the message to?</option>
                              <?php
                              
                                $select_query = "SELECT * FROM teacher_table";
                                $result_query = mysqli_query($conn,$select_query);
                                while($row=mysqli_fetch_assoc($result_query)){
                                    $teach_name = $row['teach_name'];
                                    $teach_id = $row['teach_id'];
                                    echo "<option value='$teach_id'>$teach_name</option>";
                                }

                              ?>

                          </select>
                        </div>    
    
                    <!-- Comment -->
                        <div class="form-outline mb-4 w-75 m-auto">
                            <label for="nt_comment" class="form-label text-secondary mt-3">Enter your Message *</label>
                            <textarea type="text" name="nt_comment" id="nt_comment" class="form-control p-2" rows="5" required="required" /></textarea>
                        </div>
        
                        <div class="form-outline mb-4 w-75 m-auto">
                            <label for="user_id" class="form-label text-secondary mt-3">Your User ID : </label>
                            <input type="text" READONLY name="user_id" id="user_id" class="btn btn-success w-25 mx-2" value="<?php echo $user_id ?>">
                        </div>
                        
                        <div class="form-outline mb-4 w-75 m-auto">
                            <input type="submit" name="send_msg" id="send_msg" class="btn btn-danger py-2 px-4 mt-4" value="Send Message">
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