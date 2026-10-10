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
     
          
    <!-- Classes section -->
    
      <div class="wow fadeInUp mx-3 mt-4 mb-5" data-wow-delay="0.1s">

        <h3 class="text-dark mb-5 text-center wow fadeInUp" data-wow-delay="0.1s"> Search Classes <i class="fa-solid fa-book mx-1 text-success"></i></h3> 

          <style>
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
          
              <div class="row row-cols-1 row-cols-md-4 g-2">
                
                <?php
                  search_class();
                  get_unique_category();
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