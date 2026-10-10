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

    <title><?php echo $_SESSION['username'] ?> - Delete Account</title>

</head>
<body class="bg-light">

<div class="container">

<div class="row mt-5 w-50 m-auto">
    <div class="col-md-12">
        <div class="card shadow p-3 mb-5 bg-body rounded">
                <div class="card-body">
                    <form action="" method="post" class="mt-5">
                        <p><i class="fa-solid fa-exclamation text-danger text-center mx-1" style="width: 20px; height: 19px; font-size: 14px; border: 2px solid #FF0000; border-radius: 50%;"></i> Are you sure delete your Account?</p>
                        
                        <div class="d-flex mt-5 float-end">
                            <input type="submit" class="btn btn-danger mx-1 py-2 px-3" name="delete" value="Yes,Delete">
                            <input type="submit" class="btn btn-primary mx-1 py-2 px-3" name="dont_delete" value="Dont Delete">
                        </div>
                    </form>
                </div> 
        </div>
    </div>
</div>   

</div>

    <?php 
    
    $username_session = $_SESSION['username'];
    if(isset($_POST['delete'])){
        $delete_query = "DELETE FROM user_table WHERE username='$username_session'";
        $result = mysqli_query($conn,$delete_query);
        if($result){
            session_destroy();
            echo "<script>alert('Account Deleted successfully')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }

    if(isset($_POST['dont_delete'])){
        echo "<script>alert('Your Account not deleted')</script>";
            echo "<script>window.open('profile.php','_self')</script>";
    }
    
    ?>


<!-- Bootstrap JS Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>