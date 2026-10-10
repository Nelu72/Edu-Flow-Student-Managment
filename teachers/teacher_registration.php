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
    <link rel="stylesheet" href="../assets/css/signup.css">
  </head>

<body class="bg-dark">

    <nav class="navbar navbar-dark sticky-top">
      <div class="container-fluid">
        <a class="m-auto text-warning mx-2" href="./index.php"><img src="../assets/img/icon/homeLR.png" class="mx-1 mb-1" alt="">Home</a>
      </div>
    </nav>

    <div class="container">
         <header>Signup</header>
         <form action="" method="post" enctype="multipart/form-data">

        <div class="row">
            <div class="col-md-6">
            <!-- Name --> 
                <div class="input-field">
                    <input type="input" id="teach_name" class="form-control" autocomplete="off" required="required" name="teach_name" />
                    <label for="teach_name">Your Name</label>
                </div>
            </div>    
            
            <div class="col-md-6">
            <!-- Email --> 
                <div class="input-field">
                    <input type="email" id="teach_email" class="form-control" autocomplete="off" required="required" name="teach_email" />
                    <label for="teach_email">Email</label>
                </div>
            </div> 
        </div>       
    
        <div class="row">
            <div class="col-md-6">
            <!-- Password -->   
                <div class="input-field">
                    <input type="password" id="teach_password" class="pswrd" autocomplete="off" required="required" name="teach_password" />
                    <span class="show">Show</span>
                    <label for="teach_password">Password</label>
                </div>
            </div>   

            <div class="col-md-6">
            <!-- Confirm Password -->   
                <div class="input-field">
                    <input type="password" id="conf_teach_password" class="pswrd" autocomplete="off" required="required" name="conf_teach_password" />
                    <span class="show">Show</span>
                    <label for="conf_teach_password">Confirm Password</label>
                </div>
            </div>
        </div>
                
            <!-- Dp Image -->
                <div class="form-outline w-100 m-auto mb-2">
                    <label for="teach_img" class="mx-1 mb-2">Profile Picture</label>
                    <input type="file" name="teach_img" id="teach_img" class="form-control" required="required" />
                </div> 

        <div class="row">
            <div class="col-md-6">
            <!-- Contact No --> 
                <div class="input-field">
                    <input type="input" id="teach_telNo" class="form-control" autocomplete="off" required="required" name="teach_telNo" />
                    <label for="teach_telNo">Contact No</label>
                </div>
            </div>    
            
            <div class="col-md-6">
            <!-- No Of Institute --> 
                <div class="input-field">
                    <input type="input" id="noOf_instute" class="form-control" autocomplete="off" required="required" name="noOf_instute" />
                    <label for="noOf_instute">No Of Institute</label>
                </div>
            </div> 
        </div>         

                <div class="input-field w-50 m-auto">
                    <input type="submit" value="Signup" class="btn btn-warning py-2 px-4" name="teach_register">
                </div>

        </form>

         <div class="signup">
            Already Have an account? <a class="text-decoration-none" href="teacher_login.php"> Login</a>
         </div>
    </div>


<!-- Bootstrap JS Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/noumanqamar450/alertbox@main/version/1.0.2/alertbox.min.js"></script>
<script src="../assets/js/login.js"></script>

    </body>
    </html>

<?php 

if(isset($_POST['teach_register'])){

    $teach_name = $_POST['teach_name'];
    $teach_email = $_POST['teach_email'];
    $teach_password = $_POST['teach_password'];
    $hash_password = password_hash($teach_password,PASSWORD_DEFAULT);
    $conf_teach_password = $_POST['conf_teach_password'];
    $teach_telNo = $_POST['teach_telNo'];
    $noOf_instute = $_POST['noOf_instute'];
    $user_ip = getIPAddress();

    // accessing images
    $teach_img = $_FILES['teach_img']['name'];

    // accessing image temp name
    $temp_image = $_FILES['teach_img']['tmp_name'];

    $select_query = "SELECT * FROM teacher_table WHERE teach_name='$teach_name' OR teach_email='$teach_email'";
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
    }else if($teach_password!=$conf_teach_password){
      echo "<script>alertbox.render({
         alertIcon: 'info',
         message: 'Passwords do not match',
         btnTitle: 'Try Again',
         themeColor: '#000000',
         btnColor: '#7CFC00',
         border:true
        })</script>";
    }else{

      move_uploaded_file($temp_image,"./teach_images/$teach_img");

        // insert query
        $insert_query = "INSERT INTO teacher_table (teach_name,teach_email,teach_password,teach_img,teach_telNo,noOf_instute,user_ip) 
                        VALUES ('$teach_name','$teach_email','$hash_password','$teach_img','$teach_telNo','$noOf_instute','$user_ip')";
                            
                            $result_query = mysqli_query($conn,$insert_query);
                            if($result_query){
                                echo "<script>alert('Registration Successfully')</script>";
                                echo "<script>window.open('teacher_login.php','_self')</script>";
                            }
    }
}

?>    