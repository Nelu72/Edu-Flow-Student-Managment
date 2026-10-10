<?php include('../include/conn.php');
include('../function/common_function.php');
session_start();

if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];

    $select_data = "SELECT * FROM user_orders WHERE order_id=$order_id";
    $result = mysqli_query($conn,$select_data);
    $row_fetch = mysqli_fetch_assoc($result);
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];
}

if(isset($_POST['confirm_payment'])){
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];

    $insert_query = "INSERT INTO user_payment (order_id,invoice_number,amount,payment_mode) VALUES ($order_id,$invoice_number,$amount,'$payment_mode')";
    $result = mysqli_query($conn,$insert_query);
    if($result){
        echo "<script>alert('Payment completed Successfully')</script>";
        echo "<script>window.open('user_orders.php','_self')</script>";
    }

    $update_orders = "UPDATE user_orders SET order_status='Complete' WHERE order_id=$order_id";
    $result_orders = mysqli_query($conn,$update_orders);
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

    <title><?php echo $_SESSION['username'] ?> - Confirm Your Payment</title>

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

<div class="row mt-5 w-50 m-auto">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header text-center bg-danger text-light">
                <h4>Confirm Your Payment</h4>
            </div>
                <div class="card-body bg-light">

                <form action="" method="post">
                    <div class="form-outline my-4 text-center w-50 m-auto">
                        <input type="text" class="form-control" name="invoice_number" value="<?php echo $invoice_number ?>">
                    </div>

                    <div class="form-outline my-4 text-center w-50 m-auto">
                        <label for="amount">Amount</label>
                        <input type="text" class="form-control" name="amount" value="<?php echo $amount_due ?>">
                    </div>

                    <div class="form-outline my-4 text-center w-50 m-auto">
                        <select name="payment_mode" class="form-select">
                            <option>Select Payment method</option>
                            <option>Credit/Debit Card</option>
                            <option>Bank Deposit</option>
                            <option>Cash On Delivery</option>
                        </select>
                    </div>

                    <div class="form-outline my-4 text-center w-50 m-auto">
                        <input type="submit" class="btn btn-primary py-2 px-4" Value="Confirm Payment" name="confirm_payment">
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