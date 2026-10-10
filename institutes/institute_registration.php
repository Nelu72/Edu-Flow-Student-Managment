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
                    <input type="input" id="inst_name" class="form-control" autocomplete="off" required="required" name="inst_name" />
                    <label for="inst_name">Institute Name</label>
                </div>
            </div>    
            
            <div class="col-md-6">
            <!-- Email --> 
                <div class="input-field">
                    <input type="email" id="inst_email" class="form-control" autocomplete="off" required="required" name="inst_email" />
                    <label for="inst_email">Email</label>
                </div>
            </div> 
        </div>

        <div class="row">
            <div class="col-md-6">
            <!-- Address --> 
                <div class="input-field">
                    <input type="input" id="inst_address" class="form-control" autocomplete="off" required="required" name="inst_address" />
                    <label for="inst_address">Address</label>
                </div>
            </div>    
            
            <div class="col-md-6">
            <!-- Contact No --> 
                <div class="input-field">
                    <input type="input" id="inst_telNo" class="form-control" autocomplete="off" required="required" name="inst_telNo" />
                    <label for="inst_telNo">Contact No</label>
                </div>
            </div> 
        </div>       
    
        <div class="row">
            <div class="col-md-6">
            <!-- Password -->   
                <div class="input-field">
                    <input type="password" id="inst_password" class="pswrd" autocomplete="off" required="required" name="inst_password" />
                    <span class="show">Show</span>
                    <label for="inst_password">Password</label>
                </div>
            </div>   

            <div class="col-md-6">
            <!-- Confirm Password -->   
                <div class="input-field">
                    <input type="password" id="conf_inst_password" class="pswrd" autocomplete="off" required="required" name="conf_inst_password" />
                    <span class="show">Show</span>
                    <label for="conf_inst_password">Confirm Password</label>
                </div>
            </div>
        </div>

        <!-- Main Image -->
                <div class="form-outline w-100 m-auto mb-3">
                    <label for="inst_mainImg" class="mx-1 mb-2">Profile Picture</label>
                    <input type="file" name="inst_mainImg" id="inst_mainImg" class="form-control" required="required" />
                </div>
                
        <div class="row">
            <div class="col-md-4">
            <!-- Image1 -->
                <div class="form-outline w-100 m-auto mb-2">
                    <label for="inst_img1" class="mx-1 mb-2">Other image</label>
                    <input type="file" name="inst_img1" id="inst_img1" class="form-control">
                </div> 
            </div>
            
            <div class="col-md-4">
            <!-- Image2 -->
                <div class="form-outline w-100 m-auto mb-2">
                    <label for="inst_img2" class="mx-1 mb-2">Other image</label>
                    <input type="file" name="inst_img2" id="inst_img2" class="form-control">
                </div> 
            </div>

            <div class="col-md-4">
            <!-- Image3 -->
                <div class="form-outline w-100 m-auto mb-2">
                    <label for="inst_img3" class="mx-1 mb-2">Other image</label>
                    <input type="file" name="inst_img3" id="inst_img3" class="form-control">
                </div> 
            </div>
        </div>
                

        <div class="row">
            <div class="col-md-6">
            <!-- No Of Halls --> 
                <div class="input-field">
                    <input type="input" id="noOf_halls" class="form-control" autocomplete="off" required="required" name="noOf_halls" />
                    <label for="noOf_halls">No Of Halls</label>
                </div>
            </div>    
            
            <div class="col-md-6">
            <!-- No Of Teachers --> 
                <div class="input-field">
                    <input type="input" id="noOf_teach" class="form-control" autocomplete="off" required="required" name="noOf_teach" />
                    <label for="noOf_teach">No Of Teachers</label>
                </div>
            </div> 
        </div>         

                <div class="input-field w-50 m-auto">
                    <input type="submit" value="Signup" class="btn btn-warning py-2 px-4" name="inst_register">
                </div>

        </form>

         <div class="signup">
            Already Have an account? <a class="text-decoration-none" href="institute_login.php"> Login</a>
         </div>
    </div>


<!-- Bootstrap JS Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/noumanqamar450/alertbox@main/version/1.0.2/alertbox.min.js"></script>
<script src="../assets/js/login.js"></script>

    </body>
    </html>

<?php 

if(isset($_POST['inst_register'])){

    $inst_name = $_POST['inst_name'];
    $inst_email = $_POST['inst_email'];
    $inst_address = $_POST['inst_address'];
    $inst_telNo = $_POST['inst_telNo'];
    $inst_password = $_POST['inst_password'];
    $hash_password = password_hash($inst_password,PASSWORD_DEFAULT);
    $conf_inst_password = $_POST['conf_inst_password'];
    $noOf_halls = $_POST['noOf_halls'];
    $noOf_teach = $_POST['noOf_teach'];
    $user_ip = getIPAddress();

    // accessing images
    $inst_mainImg = $_FILES['inst_mainImg']['name'];
    $inst_img1 = $_FILES['inst_img1']['name'];
    $inst_img2 = $_FILES['inst_img2']['name'];
    $inst_img3 = $_FILES['inst_img3']['name'];

    // accessing image temp name
    $temp_image = $_FILES['inst_mainImg']['tmp_name'];
    $temp_image1 = $_FILES['inst_img1']['tmp_name'];
    $temp_image2 = $_FILES['inst_img2']['tmp_name'];
    $temp_image3 = $_FILES['inst_img3']['tmp_name'];

    $select_query = "SELECT * FROM institute_table WHERE inst_name='$inst_name' OR inst_email='$inst_email'";
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
    }else if($inst_password!=$conf_inst_password){
      echo "<script>alertbox.render({
         alertIcon: 'info',
         message: 'Passwords do not match',
         btnTitle: 'Try Again',
         themeColor: '#000000',
         btnColor: '#7CFC00',
         border:true
        })</script>";
    }else{

      move_uploaded_file($temp_image,"./inst_images/$inst_mainImg");
      move_uploaded_file($temp_image1,"./inst_images/$inst_img1");
      move_uploaded_file($temp_image2,"./inst_images/$inst_img2");
      move_uploaded_file($temp_image3,"./inst_images/$inst_img3");

        // insert query
        $insert_query = "INSERT INTO institute_table (inst_name,inst_email,inst_address,inst_telNo,inst_password,inst_mainImg,inst_img1,inst_img2,inst_img3,noOf_halls,noOf_teach,user_ip) 
                        VALUES ('$inst_name','$inst_email','$inst_address','$inst_telNo','$hash_password','$inst_mainImg','$inst_img1','$inst_img2','$inst_img3','$noOf_halls','$noOf_teach','$user_ip')";
                            
                            $result_query = mysqli_query($conn,$insert_query);
                            if($result_query){
                                echo "<script>alert('Registration Successfully')</script>";
                                echo "<script>window.open('institute_login.php','_self')</script>";
                            }
    }
}

?>    