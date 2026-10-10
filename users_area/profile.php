<?php include('../include/conn.php');
session_start();
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

    <title>SPORT_CORNER</title>

</head>
<body class="bg-light">

<!----------------------------------- NAVBAR  --------------------------------------------->

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
          
          <?php

          if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link mx-2 text-uppercase' href='user_login.php'>Login</a>
          </li>";
          }else{
            echo "<li class='nav-item'>
            <a class='nav-link mx-2 text-uppercase' href='logout.php'>Logout <i class='fa-solid fa-right-from-bracket'></i></a>
          </li>";
          }
          
          ?>
      </ul>
    </div>
  </div>
</nav>

<!--------------------------------------- NAVBAR END ---------------------------------------->

<!--------------------------------------- SIDEBAR ------------------------------------------->
    
                    <?php
                    if(!isset($_SESSION['username'])){
                        include('user_login.php');
                    }else{
                        include('profile_info.php');
                    }
                    ?>

<!--------------------------------------- SIDEBAR END --------------------------------------->

<!-- Bootstrap JS Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>