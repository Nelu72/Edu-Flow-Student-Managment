<?php include('../include/conn.php');
include('../function/common_function.php');
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
    <link rel="stylesheet" href="style.css">

    <!-- Fontawesome Link -->
    <script src="https://kit.fontawesome.com/cee170457b.js" crossorigin="anonymous"></script>

    <title>SPORT_CORNER</title>

</head>
<body>

    <!-- php code to access user id -->
    <?php

    $user_ip = getIPAddress();
    $get_user = "SELECT * FROM user_table WHERE user_ip='$user_ip'";
    $result = mysqli_query($conn,$get_user);
    $run_query = mysqli_fetch_array($result);
    $user_id = $run_query['user_id'];
    
    ?>

    <div class="container">
        <h2 class="text-center text-primary">Payment Option</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
                <a href="https://www.paypal.com" target="_blank"><img src="../pics/payment-1.jpg" style="width: 100%;" alt=""></a>
            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id ?>"><h2 class="text-center">Pay Offline</h2></a>
            </div>
        </div>
    </div>
    

<!-- Bootstrap JS Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>