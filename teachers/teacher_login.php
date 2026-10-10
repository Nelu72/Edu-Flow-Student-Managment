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
         <header>Login</header>
         <form action="" method="post">

            <!-- Email --> 
                <div class="input-field">
                    <input type="email" id="teach_email" class="form-control" autocomplete="off" required="required" name="teach_email" />
                    <label for="teach_email">Email</label>
                </div>
    
            <!-- Password -->   
                <div class="input-field">
                    <input type="password" id="teach_password" class="pswrd" autocomplete="off" required="required" name="teach_password" />
                    <span class="show">Show</span>
                    <label for="teach_password">Password</label>
                </div>
                
                <div class="input-field">
                    <input type="submit" value="Login" class="btn btn-warning py-2 px-4" name="teach_login">
                </div>
        </form>

        <div class="signup">
           Don't Have an account? <a class="text-decoration-none" href="teacher_registration.php"> Signup</a>
        </div>

    </div>


<!-- Bootstrap JS Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/noumanqamar450/alertbox@main/version/1.0.2/alertbox.min.js"></script>
<script src="../assets/js/login.js"></script>

    </body>
    </html>

<?php 

if(isset($_POST['teach_login'])){
    $teach_email = $_POST['teach_email'];
    $teach_password = $_POST['teach_password'];

    $select_query = "SELECT * FROM teacher_table WHERE teach_email='$teach_email'";
    $result = mysqli_query($conn,$select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();

    if($row_count>0){
        $_SESSION['teacherLog']=$teach_email;
        if(password_verify($teach_password,$row_data['teach_password'])){
            if($row_count==1){
                $_SESSION['teacherLog']=$teach_email;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('./index.php','_self')</script>";
            }else{
                $_SESSION['teacherLog']=$teach_email;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('./index.php','_self')</script>";
            }
        }else{
            echo "<script>
                 alertbox.render({
                 alertIcon: 'warning',
                 message: 'Invalid Username or Password',
                 btnTitle: 'Try Again',
                 themeColor: '#000000',
                 btnColor: '#7CFC00',
                 border:true
                })
                </script>
                ";
        }

    }else{
        echo "<script>
             alertbox.render({
             alertIcon: 'warning',
             message: 'Invalid Username or Password',
             btnTitle: 'Try Again',
             themeColor: '#000000',
             btnColor: '#7CFC00',
             border:true
            })</script>";
    }
}

?>    