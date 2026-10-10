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
              <li class="nav-item mx-2">
                <a class="nav-link" href="institute.php"><img src="../assets/img/icon/institute.png" class="mx-1 mb-1" alt="">Institute</a>
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

              if(!isset($_SESSION['teacherLog'])){
                echo "<li class='nav-item mx-2'>
                        <a class='nav-link' href='./teacher_login.php'><img src='../assets/img/icon/login.png' class='mx-1 mb-1' alt=''>Signin</a>
                      </li>";
              }else{

                $teach_email = $_SESSION['teacherLog'];
                $teach_img = "SELECT * FROM teacher_table WHERE teach_email='$teach_email'";
                $result_image = mysqli_query($conn,$teach_img);
                $row_image = mysqli_fetch_array($result_image);
                $teach_id = $row_image['teach_id'];

                echo "<li class='nav-item mx-2'>
                        <a class='nav-link' href='./profile_info.php?teach_id=$teach_id'><img src='../assets/img/icon/profile-user.png' class='mx-1 mb-1' alt=''>Profile</a>
                      </li>
                      
                      <li class='nav-item mx-2'>
                        <a class='nav-link' href='logout.php'><img src='../assets/img/icon/exit.png' class='mx-1 mb-1' alt=''>Logout</a>
                      </li>";
              }
          
            ?>
              
            </ul>

            <ul class="navbar-nav me-auto my-2 mb-lg-0 p-1" style="border-radius: 12px; background: rgba(900, 955, 85, 0.800);">
              <?php

              if(!isset($_SESSION['teacherLog'])){
                echo "<li class='nav-item mx-2'>
                        <a class='nav-link' href='./teacher_login.php'><img src='../assets/img/icon/add.png' class='mx-1' alt=''> Add a Class</a>
                      </li>";
              }else{
                echo "<li class='nav-item mx-2'>
                        <a class='nav-link' href='addClass.php'><img src='../assets/img/icon/add.png' class='mx-1' alt=''> Add a Class</a>
                      </li>";
              }
          
            ?>
              
            </ul>
            
          </div>
        </div>
      </nav>
    <!-- Navbar End -->


    <!-- Carousel Area -->

    <div class="container wow fadeIn" data-wow-delay="0.1s">
      <div class="row">
        <div class="col-12 col-sm-8">
        
          <div style="border-radius: 18px; height: 500px; background-image: url(../assets/img/heroMain.jpg); background-size: cover; background-position: center;" class="position-relative w-100 mt-3">
            <div class="position-absolute text-white d-flex flex-column align-items-start justify-content-center" style="border-radius: 18px; top: 0; right: 0; bottom: 0; left: 0; background-color: rgba(0,0,0,.1);">
              <div class="container">
                <div class="col-md-6">
                  <!-- on small screens remove display-4 -->
                  <h1 class="mb-4 mt-2 font-weight-bold text-white">Education Is The Most Powerful Weapon</h1>
                  <div class="mt-5">
                    <!-- hover background-color: white; color: black; -->
                    <a href="#" class="btn px-5 py-2 text-white mt-3 mt-sm-0" style="border-radius: 30px; background-color: rgba(228, 250, 101, 0.505);">View Classes</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
        </div>

        <!-- ************************************************************************  -->

        <div class="col-12 col-sm-4">
          <div class="row">
            <div class="col-12 col-sm-12">
              
              <div style="border-radius: 18px; height: 360px; background-image: url(../assets/img/heroMini.jpg); background-size: cover; background-position: center;" class="position-relative w-100 mt-3">
                <div class="position-absolute text-white d-flex flex-column align-items-start justify-content-center" style="border-radius: 18px; top: 0; right: 0; bottom: 0; left: 0; background-color: rgba(0,0,0,.6);">
                  <div class="container">
                    <h4 class="text-white mb-3">Learning today, leading tomorrow</h4>
                    <div class="col-md-6">
                      <div class="mt-5">
                        <p class="text-warning fw-bold mb-5" style="font-size: 20px;">Do you want to add a class?</a></p>
                        
                          <?php
  
                            if(!isset($_SESSION['teacherLog'])){
                              echo "<a href='./teacher_login.php' class='btn px-4 py-2 text-white mt-1 mt-sm-0' style='border-radius: 30px; background-color: rgba(228, 250, 101, 0.505);'>Add Class</a>";
                            }else{
                              echo "<a href='addClass.php' class='btn px-4 py-2 text-white mt-1 mt-sm-0' style='border-radius: 30px; background-color: rgba(228, 250, 101, 0.505);'>Add Class</a>";
                              }
                        
                          ?>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            
            </div>
            
            <!-- *********************************** -->

            <div class="col-12 col-sm-12">
            
              <div id="carouselExampleSlidesOnly" class="carousel slide mt-1 mb-4" data-bs-ride="carousel">
                <div class="carousel-inner">
                  
                  <?php getcarousel(); ?>
                  
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Carousel Area End -->
     
          
    <!-- Classes section -->
    
      <div class="wow fadeInUp mx-3 mt-4 mb-5" data-wow-delay="0.1s">

        <h3 class="text-dark mb-2 text-center wow fadeInUp" data-wow-delay="0.1s">Classes <i class="fa-solid fa-book mx-1 text-success"></i></h3> 

          <style>
              .seemore a{
                font-size: 15px;
                font-weight: 600;
                color: #5d5d5de8;
                font-family: 'Poppins', sans-serif;
              }
              .seemore a:hover{
                color: #969696f1;
              }
              .classes .card:hover{
                filter: brightness(70%);
                transform: scale(1.02);
                transition: 1s;
              }
              .classes .card img{
                height: 220px;
              }
          </style>
          
            <div class="container">
                  <div class="seemore">
                    <a href="all_classes.php">See More <i class="fa-regular fa-hand-point-right"></i></a>
                  </div><br>
          
              <div class="row row-cols-1 row-cols-md-4 g-2">
                
                <?php
                  getclasses();
                ?>
          
              </div>
            </div>

        </div>
      </div>
    
    <!-- Classes section End -->









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