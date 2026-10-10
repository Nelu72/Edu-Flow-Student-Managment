<?php include('../include/conn.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title><?php echo $_SESSION['instLog'] ?> - Delete Account</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="../assets/img/icon/favicon.png" rel="icon" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600;700&display=swap" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet"/>

    <!-- Libraries Stylesheet -->
    <link href="../assets/lib/animate/animate.min.css" rel="stylesheet" />
    <link href="../assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/95dff4f720.js" crossorigin="anonymous"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link rel="stylesheet" href="../assets/css/style.css">
  </head>

  <style>
    .card{
        width: 50%;
        margin: auto;
    }
    @media (max-width: 768px) {
        .card{
            width: 95%;
            margin: auto;
    }
}
  </style>

<body class="bg-light">

<div class="container">

<div class="row mt-2">
    <div class="col-md-12">
        <div class="card shadow p-2 mb-5 bg-body rounded">
                <div class="card-body">
                    <form action="" method="post" class="mt-5">
                        <p><i class="fa-solid fa-exclamation text-danger text-center mx-1" style="width: 20px; height: 19px; font-size: 14px; border: 2px solid #FF0000; border-radius: 50%;"></i> Are you sure delete your Account?</p>
                        
                        <div class="d-flex mt-5 float-end">
                            <input type="submit" class="btn btn-danger mx-1 py-2 px-3" name="delete" value="Yes,Delete">
                            <input type="submit" class="btn btn-primary mx-1 py-2 px-3" name="cancel" value="Cancel">
                        </div>
                    </form>
                </div> 
        </div>
    </div>
</div>   

</div>

    <?php 
    
    $inst_email = $_SESSION['instLog'];
    if(isset($_POST['delete'])){
        $delete_query = "DELETE FROM institute_table WHERE inst_email='$inst_email'";
        $result = mysqli_query($conn,$delete_query);
        if($result){
            session_destroy();
            echo "<script>alert('Account Deleted successfully')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }

    if(isset($_POST['cancel'])){
            echo "<script>window.open('./index.php','_self')</script>";
    }
    
    ?>


<!-- Bootstrap JS Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>