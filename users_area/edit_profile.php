<?php include('../include/conn.php');
include('../function/common_function.php');
session_start();

if(isset($_GET['edit_profile'])){
    $user_session_name = $_SESSION['username'];
    $select_query = "SELECT * FROM user_table WHERE username='$user_session_name'";
    $result_query = mysqli_query($conn,$select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
    $username = $row_fetch['username'];
    $user_email = $row_fetch['user_email'];
    $user_address = $row_fetch['user_address'];
    $user_mobile = $row_fetch['user_mobile'];
}
    
    if(isset($_POST['user_update'])){
        $update_id = $user_id;
        $username = $_POST['user_username'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $user_mobile = $_POST['user_mobile'];
        $user_image1=$_FILES['user_image1']['name'];
        $user_image1_tmp=$_FILES['user_image1']['tmp_name'];

        move_uploaded_file($user_image1_tmp,"./user_images/$user_image1");

        // update query
        $update_data = "UPDATE user_table SET username='$username',user_email='$user_email',user_image1='$user_image1',user_address='$user_address',user_mobile='$user_mobile' WHERE user_id=$update_id";
        $result_query_update = mysqli_query($conn,$update_data);
        if($result_query_update){
            echo "<script>alert('Data updated successfully')</script>";
            echo "<script>window.open('logout.php','_self')</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CSS Link -->
    <link rel="stylesheet" href="../style.css">

    <!-- Fontawesome Link -->
    <script src="https://kit.fontawesome.com/cee170457b.js" crossorigin="anonymous"></script>

    <title><?php echo $_SESSION['username'] ?> - Edit Account</title>

    <style>

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 18px;
  text-decoration: none;
}
 
.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
.title{
    font-weight: 700;
    font-size: 20px;
}
.carousel img{
    height: 280px;
}
.card img{
  height: 250px;
  object-fit: contain;
}


body{
    color: #6F8BA4;
}
.section {
    padding: 60px 0;
    position: relative;
}
.gray-bg {
    background-color: #f5f5f5;
}
img {
    max-width: 100%;
}
img {
    vertical-align: middle;
    border-style: none;
}
/* About Me 
---------------------*/
.about-text h3 {
  font-size: 45px;
  font-weight: 700;
  margin: 0 0 6px;
}
@media (max-width: 767px) {
  .about-text h3 {
    font-size: 35px;
  }
}

.about-list {
  padding-top: 10px;
}
.about-list .media {
  padding: 5px 0;
}
.about-list label {
  color: #20247b;
  font-weight: 600;
  width: 88px;
  margin: 0;
  position: relative;
}
.about-list label:after {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  right: 11px;
  width: 1px;
  height: 12px;
  background: #20247b;
  -moz-transform: rotate(15deg);
  -o-transform: rotate(15deg);
  -ms-transform: rotate(15deg);
  -webkit-transform: rotate(15deg);
  transform: rotate(15deg);
  margin: auto;
  opacity: 0.5;
}
.about-list p {
  margin: 0;
  font-size: 15px;
}

@media (max-width: 991px) {
  .about-avatar {
    margin-top: 30px;
  }
}

.about-section .counter {
  padding: 22px 20px;
  background: #ffffff;
  border-radius: 10px;
  box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
}
.about-section .counter .count-data {
  margin-top: 10px;
  margin-bottom: 10px;
}
.about-section .counter .count {
  font-weight: 700;
  color: #20247b;
  margin: 0 0 5px;
}
.about-section .counter a {
  font-weight: 600;
  margin: 0;
}
mark {
    background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
    background-size: 100% 3px;
    background-repeat: no-repeat;
    background-position: 0 bottom;
    background-color: transparent;
    padding: 0;
    color: currentColor;
}
.theme-color {
    color: #fc5356;
}
.dark-color {
    color: #20247b;
}

</style>

</head>
<body class="bg-light">

<!----------------------------------- NAVBAR  --------------------------------------------->

<div class="superNav border-bottom py-2 bg-warning">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 centerOnMobile">
        <span class="me-3"><strong><a href="#"><i class="fa-brands fa-square-facebook text-primary"></i></a></strong></span>
        <span class="me-3"><strong><a href="#"><i class="fa-brands fa-instagram me-1 text-danger"></i></a></strong></span>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 d-none d-lg-block d-md-block-d-sm-block d-xs-none text-end">
        <span class="me-3"><i class="fa-solid fa-truck text-muted me-1"></i><a class="text-muted" href="#">Shipping</a></span>
        <span class="me-3"><i class="fa-solid fa-file  text-muted me-2"></i><a class="text-muted" href="#">Policy</a></span>
      </div>
    </div>
  </div>
</div>
<nav class="navbar navbar-expand-lg bg-primary sticky-top navbar-light p-3 shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="#"><i class="fa-brands fa-shopware me-2"></i> <strong>SpoRt CoRneR</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class=" collapse navbar-collapse" id="navbarNavDropdown">

      <ul class="navbar-nav ms-auto ">
        <li class="nav-item">
          <a class="nav-link mx-2 text-uppercase active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-2 text-uppercase" href="../all_products.php">Products</a>
      </ul>
      <ul class="navbar-nav ms-auto ">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-circle-user me-1"></i> Account
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
            <li><a class="dropdown-item" href="user_orders.php">My Oders</a></li>
            <li><hr class="dropdown-divider"></li>
            <?php

              if(!isset($_SESSION['username'])){
                echo "<li><a class='dropdown-item' href='user_login.php'>Login</a></li>";
              }else{
                echo "<li><a class='dropdown-item' href='logout.php'>Logout</a></li>";
              }
          
            ?>
            
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!--------------------------------------- NAVBAR END ---------------------------------------->

<div class="container my-5">

<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header text-center bg-danger text-light">
                <h4>Edit Profile
                    <a href="profile.php" class="btn btn-danger float-end">View Profile</a>
                </h4>
            </div>
                <div class="card-body">

                <form action=""method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4 m-auto w-50">
                        <label for="user_username" class="mb-2">Username</label>
                        <input type="text" name="user_username" value="<?php echo $username ?>" class="form-control">
                    </div>

                    <div class="form-outline mb-4 m-auto w-50">
                        <label for="user_email" class="mb-2">Email</label>
                        <input type="email" name="user_email" value="<?php echo $user_email ?>" class="form-control">
                    </div>

                    <div class="form-outline mb-4 m-auto w-50">
                        <label for="user_image1" class="mb-2">User Image</label>
                        <input type="file" name="user_image1" class="form-control">
                        <?php

                            $username = $_SESSION['username'];
                            $user_image = "SELECT * FROM user_table WHERE username='$username'";
                            $result_image = mysqli_query($conn,$user_image);
                            $row_image = mysqli_fetch_array($result_image);
                            $user_image1 = $row_image['user_image1'];
                            echo "<div class='col-lg-5'>
                                    <div class='about-avatar m-3'>
                                        <img src='./user_images/$user_image1' style='width:70%; height:100%; border-radius:6px;' title='' alt=''>
                                    </div>
                                  </div>";
        
                        ?>
                    </div>

                    <div class="form-outline mb-4 m-auto w-50">
                        <label for="user_address" class="mb-2">User Address</label>
                        <input type="text" name="user_address" value="<?php echo $user_address ?>" class="form-control">
                    </div>

                    <div class="form-outline mb-4 m-auto w-50">
                        <label for="user_mobile" class="mb-2">User Mobile</label>
                        <input type="text" name="user_mobile" value="<?php echo $user_mobile ?>" class="form-control">
                    </div>

                    <div class="form-outline mb-4 m-auto w-50">
                        <input type="submit" name="user_update" value="Update" class="btn btn-primary py-2 px-4">
                    </div>

                </form>

                </div> 
        </div>
    </div>
</div>   

</div>


<!-- Bootstrap JS Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>