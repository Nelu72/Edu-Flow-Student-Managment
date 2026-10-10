<?php include('../include/conn.php');
include('../function/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title> E d u F l o w</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="../assets/img/icon/favicon.png" rel="icon" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600;700&display=swap" rel="stylesheet"/>

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet"/>

    <!-- Libraries Stylesheet -->
    <link href="../assets/lib/animate/animate.min.css" rel="stylesheet" />
    <link href="../assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/cee170457b.js" crossorigin="anonymous"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link rel="stylesheet" href="../assets/css/login.css">
  </head>

<body class="bg-dark">

    <nav class="navbar navbar-dark">
      <div class="container-fluid">
        <a class="m-auto text-warning mx-2" href="./index.php"><img src="../assets/img/icon/homeLR.png" class="mx-1 mb-1" alt="">Home</a>
      </div>
    </nav>

    <div class="container">
         <header>Signup</header>
         <form action="" method="post" enctype="multipart/form-data">

            <!-- Username --> 
                <div class="input-field">
                    <input type="input" id="user_username" class="form-control" autocomplete="off" required="required" name="user_username" />
                    <label for="user_username">Username</label>
                </div>
                
            <!-- Email --> 
                <div class="input-field">
                    <input type="email" id="user_email" class="form-control" autocomplete="off" required="required" name="user_email" />
                    <label for="user_email">Email</label>
                </div>
    
            <!-- Password -->   
                <div class="input-field">
                    <input type="password" id="user_password" class="pswrd" autocomplete="off" required="required" name="user_password" />
                    <span class="show">Show</span>
                    <label for="user_password">Password</label>
                </div>

            <!-- Confirm Password -->   
                <div class="input-field">
                    <input type="password" id="conf_user_password" class="pswrd" autocomplete="off" required="required" name="conf_user_password" />
                    <span class="show">Show</span>
                    <label for="conf_user_password">Confirm Password</label>
                </div>
                
            <!-- Dp Image -->
                <div class="form-outline w-100 m-auto">
                    <label for="user_image1" class="mx-1">Add Profile Picture</label>
                    <input type="file" name="user_image1" id="user_image1" class="form-control" required="required" />
                </div> 

                <div class="input-field">
                    <input type="submit" value="Signup" class="btn btn-warning py-2 px-4" name="user_register">
                </div>

        </form>

         <div class="signup">
            Already Have an account? <a class="text-decoration-none" href="user_login.php"> Login</a>
         </div>
    </div>


<!-- Bootstrap JS Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/noumanqamar450/alertbox@main/version/1.0.2/alertbox.min.js"></script>
<script src="../assets/js/login.js"></script>

    </body>
    </html>

<?php 

if(isset($_POST['user_register'])){

    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_ip = getIPAddress();

    // accessing images
    $user_image1 = $_FILES['user_image1']['name'];

    // accessing image temp name
    $temp_image = $_FILES['user_image1']['tmp_name'];

    $select_query = "SELECT * FROM user_table WHERE username='$user_username' OR user_email='$user_email'";
    $result = mysqli_query($conn,$select_query);
    $rows_count = mysqli_num_rows($result);
    if($rows_count>0){
      echo "<script>alertbox.render({
         alertIcon: 'warning',
         message: 'Username and Email already exist',
         btnTitle: 'Try Again',
         themeColor: '#000000',
         btnColor: '#7CFC00',
         border:true
        })</script>";
      exit();
    }else if($user_password!=$conf_user_password){
      echo "<script>alertbox.render({
         alertIcon: 'info',
         message: 'Passwords do not match',
         btnTitle: 'Try Again',
         themeColor: '#000000',
         btnColor: '#7CFC00',
         border:true
        })</script>";
    }else{

      move_uploaded_file($temp_image,"./user_images/$user_image1");

        // insert query
        $insert_query = "INSERT INTO user_table (username,user_email,user_password,user_image1,user_ip) 
                        VALUES ('$user_username','$user_email','$hash_password','$user_image1','$user_ip')";
                            
                            $result_query = mysqli_query($conn,$insert_query);
                            if($result_query){
                                echo "<script>alert('User register Successfully')</script>";
                                echo "<script>window.open('user_login.php','_self')</script>";
                            }
    }
}

?>    