<?php
session_start();
require '../include/conn.php';

//Grade Categories Insert------------------------------------------

if(isset($_POST['insert_gradeCtg'])){
    $grade_name = $_POST['grade_name'];

    // select data from database
    $select_query = "SELECT * FROM grade_cat WHERE grade_name='$grade_name'";
    $result_select = mysqli_query($conn,$select_query);
    $number = mysqli_num_rows($result_select);
    if($number>0){
        $_SESSION['message'] = "<i class='fa-solid fa-triangle-exclamation fa-xl mx-1'></i> This category Already added!";
        header("Location: insert_gradeCtg.php");
        exit(0);
    }else{

    $insert_query = "INSERT INTO grade_cat (grade_name) VALUES ('$grade_name')";
    $result = mysqli_query($conn,$insert_query);

    if($result){
        $_SESSION['message'] = "<i class='fa-solid fa-circle-check fa-xl mx-1'></i> Category insert Successfully";
        header("Location: insert_gradeCtg.php");
        exit(0);
    }
}
}

// Grade Categories Delete-----------------------------------------------

if(isset($_POST['delete_grade']))
{
    $grade_Id = mysqli_real_escape_string($conn, $_POST['delete_grade']);

    $query = "DELETE FROM grade_cat WHERE grade_Id='$grade_Id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "<i class='fa-solid fa-circle-check fa-xl mx-1'></i> Category Deleted Successfully";
        header("Location: insert_gradeCtg.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "<i class='fa-solid fa-circle-exclamation fa-xl mx-1'></i> Category Not Deleted";
        header("Location: insert_gradeCtg.php");
        exit(0);
    }
}

// Carousel Insert --------------------------------------------------------------------

if(isset($_POST['insert_carousel']))
{
    $carousel_id = mysqli_real_escape_string($conn, $_POST['insert_carousel']);

    //accessing images
    $carousel_image1 = $_FILES['carousel_image1']['name'];
    $carousel_image2 = $_FILES['carousel_image2']['name'];
    $carousel_image3 = $_FILES['carousel_image3']['name'];
    
    //tmp images
    $temp_image1 = $_FILES['carousel_image1']['tmp_name'];
    $temp_image2 = $_FILES['carousel_image2']['tmp_name'];
    $temp_image3 = $_FILES['carousel_image3']['tmp_name'];

    move_uploaded_file($temp_image1,"./all-img/$carousel_image1");
    move_uploaded_file($temp_image2,"./all-img/$carousel_image2");
    move_uploaded_file($temp_image3,"./all-img/$carousel_image3");

    $sql = "INSERT INTO carousel (carousel_image1, carousel_image2, carousel_image3)
            VALUES ('$carousel_image1', '$carousel_image2', '$carousel_image3')";
    $query_run = mysqli_query($conn, $sql);

    if($query_run)
    {
        $_SESSION['message'] = "<i class='fa-solid fa-circle-check fa-xl mx-1'></i> Insert Carousel Successfully";
        header("Location: insert_carousel.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "<i class='fa-solid fa-circle-exclamation fa-xl mx-1'></i> Carousel Not insert";
        header("Location: insert_carousel.php");
        exit(0);
    }
}

// Carousel Delete --------------------------------------------------------------------

if(isset($_POST['delete_carousel']))
{
    $carousel_id = mysqli_real_escape_string($conn, $_POST['delete_carousel']);

    $query = "DELETE FROM carousel WHERE carousel_id ='$carousel_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "<i class='fa-solid fa-circle-check fa-xl mx-1'></i> Carousel Deleted Successfully";
        header("Location: insert_carousel.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "<i class='fa-solid fa-circle-exclamation fa-xl mx-1'></i> Carousel Not Deleted";
        header("Location: insert_carousel.php");
        exit(0);
    }
}

// Send Message to teacher --------------------------------------------------------------------

if(isset($_POST['send_msg'])){
    $user_id = $_POST['user_id'];
    $nt_name = $_POST['nt_name'];
    $nt_no = $_POST['nt_no'];
    $class_ctg = $_POST['class_ctg'];
    $nt_comment = $_POST['nt_comment'];
    $status = 'unapproved';
    $teach_status = 'unseen';

    // select data from database
    $select_query = "SELECT * FROM question WHERE nt_comment='$nt_comment'";
    $result_select = mysqli_query($conn,$select_query);
    $number = mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('This message already added!')</script>";
        echo "<script>window.open('../users/askQue.php','_self')</script>";
        exit(0);
    }else{

    $insert_query = "INSERT INTO question (user_id,nt_name,nt_no,teach_id,nt_comment,status,teach_status) VALUES ('$user_id','$nt_name','$nt_no','$class_ctg','$nt_comment','$status','$teach_status')";
    $result = mysqli_query($conn,$insert_query);

    if($result){
        echo "<script>alert('Message sending Successfully')</script>";
        echo "<script>window.open('../users/askQue.php','_self')</script>";
    }
}
}

// question Delete --------------------------------------------------------------------

if(isset($_POST['delete_notification']))
{
    $nt_id = mysqli_real_escape_string($conn, $_POST['delete_notification']);

    $query = "DELETE FROM question WHERE nt_id='$nt_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "<i class='fa-solid fa-circle-check fa-xl mx-1'></i> Notification Deleted Successfully";
        header("Location: view_question.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "<i class='fa-solid fa-circle-exclamation fa-xl mx-1'></i> Notification Not Deleted";
        header("Location: view_question.php");
        exit(0);
    }
}

//Notification status Update --------------------------------------------------------------------------------

if(isset($_POST['update_status']))
{
    $nt_id = mysqli_real_escape_string($conn, $_POST['nt_id']);

    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $query = "UPDATE question SET status = 'approved' WHERE nt_id='$nt_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "<i class='fa-solid fa-circle-check fa-xl mx-1'></i> You approved this notification";
        header("Location: notifyview.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "<i class='fa-solid fa-circle-exclamation fa-xl mx-1'></i> You not approved this notification!";
        header("Location: notifyview.php");
        exit(0);
    }

}

//Class status Update --------------------------------------------------------------------------------

if(isset($_POST['update_ClsStatus']))
{
    $class_id = mysqli_real_escape_string($conn, $_POST['class_id']);

    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $query = "UPDATE classes SET status = 'approved' WHERE class_id='$class_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "<i class='fa-solid fa-circle-check fa-xl mx-1'></i> Class Ad approved";
        header("Location: ./view_classes.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "<i class='fa-solid fa-circle-exclamation fa-xl mx-1'></i> Class Ad Not approved";
        header("Location: ./view_classes.php");
        exit(0);
    }

}

//Teacher status Update --------------------------------------------------------------------------------

if(isset($_POST['update_teach_status']))
{
    $nt_id = mysqli_real_escape_string($conn, $_POST['nt_id']);

    $teach_status = mysqli_real_escape_string($conn, $_POST['teach_status']);

    $query = "UPDATE question SET teach_status = 'seen' WHERE nt_id='$nt_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo "<script>alert('You seen message')</script>";
        echo "<script>window.open('../teachers/index.php','_self')</script>";
    }
    else
    {
        echo "<script>alert('You did not seen message')</script>";
        echo "<script>window.open('../teachers/index.php','_self')</script>";
    }

}

//Institute ads status Update --------------------------------------------------------------------------------

if(isset($_POST['update_instAdStatus']))
{
    $ad_id = mysqli_real_escape_string($conn, $_POST['ad_id']);

    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $query = "UPDATE inst_ad SET status = 'approved' WHERE ad_id='$ad_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo "<script>alert('You Approved Ad')</script>";
        echo "<script>window.open('./view_instAd.php','_self')</script>";
    }
    else
    {
        echo "<script>alert('You did not Approve Ad')</script>";
        echo "<script>window.open('./view_instAd.php','_self')</script>";
    }

}

?>