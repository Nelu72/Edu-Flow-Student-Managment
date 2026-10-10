<?php include_once('../include/conn.php'); 
include_once('../function/common_function.php'); 
include_once('../include/main_header.php');
@session_start();
?>

<body style="background-color: rgba(225, 255, 226, 0.936);">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
      <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container-fluid">
          <a class="navbar-brand fw-bold text-dark mt-3" href="#"><img src="../assets/img/icon/favicon.png" style="max-height: 40px; margin-bottom: 12px;" class="mx-2" alt=""> E d u F l o w</a>
          
          <form class="d-flex mt-2" action="search_classes.php" method="get">

            <div class="searchBtn">
              <button type="button" class="btn btn-light mx-2" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-end">
                  <div class="d-flex searchIn">
                    <input class="form-control me-2 text-dark" name="search_data" type="search" placeholder="Search..." aria-label="Search">
                    <button class="btn btn-light" name="search_data_class" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                  </div>
              </ul>
            </div>

          </form>

          <button class="navbar-toggler mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto my-2 mb-lg-0 p-1">
              <li class="nav-item mx-2">
                <a class="nav-link active" aria-current="page" href="index.php"><img src="../assets/img/icon/home.png" class="mx-1 mb-1" alt="">Home</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link" href="contactUs.php"><img src="../assets/img/icon/about.png" class="mx-1 mb-1" alt="">About Us</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link" href="all_classes.php"><img src="../assets/img/icon/classes.png" class="mx-1 mb-1" alt="">Classes</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link" href="institute.php"><img src="../assets/img/icon/institute.png" class="mx-1 mb-1" alt="">Institute</a>
              </li>
              <li class="nav-item mx-2 dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="../assets/img/icon/category.png" class="mx-1 mb-1" alt="">Categories
                </a>
                <ul class="dropdown-menu" style="background: #4ced61;" aria-labelledby="navbarDropdown">
                  <li><?php getcategories(); ?></li>
                </ul>
              </li>
              <?php

              if(!isset($_SESSION['teacherLog'])){
                echo "<li class='nav-item mx-2'>
                        <a class='nav-link' href='./teacher_login.php'><img src='../assets/img/icon/login.png' class='mx-1 mb-1' alt=''>Signin</a>
                      </li>";
              }else{

                $teach_email = $_SESSION['teacherLog'];
                $teach_img = "SELECT * FROM teacher_table WHERE teach_email='$teach_email'";
                $result_image = mysqli_query($conn,$teach_img);
                $row_image = mysqli_fetch_array($result_image);
                $teach_id = $row_image['teach_id'];

                echo "<li class='nav-item mx-2'>
                        <a class='nav-link' href='./profile_info.php?teach_id=$teach_id'><img src='../assets/img/icon/profile-user.png' class='mx-1 mb-1' alt=''>Profile</a>
                      </li>
                      
                      <li class='nav-item mx-2'>
                        <a class='nav-link' href='logout.php'><img src='../assets/img/icon/exit.png' class='mx-1 mb-1' alt=''>Logout</a>
                      </li>";
              }
          
            ?>
              
            </ul>

            <ul class="navbar-nav me-auto my-2 mb-lg-0 p-1" style="border-radius: 12px; background: rgba(900, 955, 85, 0.800);">
              <?php

              if(!isset($_SESSION['teacherLog'])){
                echo "<li class='nav-item mx-2'>
                        <a class='nav-link' href='./teacher_login.php'><img src='../assets/img/icon/add.png' class='mx-1' alt=''> Add a Class</a>
                      </li>";
              }else{
                echo "<li class='nav-item mx-2'>
                        <a class='nav-link' href='addClass.php'><img src='../assets/img/icon/add.png' class='mx-1' alt=''> Add a Class</a>
                      </li>";
              }
          
            ?>
              
            </ul>
            
          </div>
        </div>
      </nav>
    <!-- Navbar End -->
     
        <?php
  
          $teach_email = $_SESSION['teacherLog'];
          $get_teach = "SELECT * FROM teacher_table WHERE teach_email='$teach_email'";
          $result = mysqli_query($conn,$get_teach);
          $run_query = mysqli_fetch_array($result);
          $teach_id = $run_query['teach_id'];
          $teach_name = $run_query['teach_name'];
          $teach_email = $run_query['teach_email'];
          $teach_telNo = $run_query['teach_telNo'];
          
        ?>
      
        <!-- partial -->
        <div class="container main-panel">
          <div class="content-wrapper">

            <div class="row">
              <div class="col-lg-12 grid-margin">
                <div class="card mt-4 w-75 m-auto" style="background-color: #313131;">
                  <div class="card-body">
                    <h4 class="card-title text-center mt-4 text-white">Add your new class</h4>

                    <form action="" method="post" enctype="multipart/form-data">

                    <!-- Teacher's Id -->
                        <div class="form-outline mb-4 w-75 m-auto">
                            <label for="teach_id" class="form-label text-secondary mt-3">Your User ID : </label>
                            <input type="text" READONLY name="teach_id" id="teach_id" class="form-control p-2 w-25" value="<?php echo $teach_id ?>">
                        </div>

                    <!-- Teacher Name -->
                        <div class="form-outline mb-4 w-75 m-auto">
                            <label for="teach_name" class="form-label text-secondary mt-3">Teacher Name</label>
                            <input type="text" name="teach_name" id="teach_name" class="form-control p-2" value="<?php echo $teach_name ?>">
                        </div>

                    <!-- Subject -->
                        <div class="form-outline mb-4 w-75 m-auto">
                            <label for="subject" class="form-label text-secondary mt-2">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control p-2" required="required" />
                        </div>

                    <!-- Grade Categories -->
                        <div class="form-outline mb-4 w-75 m-auto">
                          <label for="grade_id" class="form-label text-secondary mt-2">Select Grade Category</label>
                          <select name="grade_ctg" id="" class="form-select">
                              <option value="">Select Grade Category</option>
                              <?php
                              
                                $select_query = "SELECT * FROM grade_cat";
                                $result_query = mysqli_query($conn,$select_query);
                                while($row=mysqli_fetch_assoc($result_query)){
                                    $grade_name = $row['grade_name'];
                                    $grade_id = $row['grade_id'];
                                    echo "<option value='$grade_id'>$grade_name</option>";
                                }

                              ?>

                          </select>
                        </div>
                        
                    <!-- Class Grade -->
                        <div class="form-outline mb-4 w-75 m-auto">
                            <label for="class_grade" class="form-label text-secondary mt-2">Class Grade</label>
                            <input type="text" name="class_grade" id="class_grade" class="form-control p-2" required="required" placeholder="eg: Grade 6" />
                        </div>
                        
                    <!-- Class day -->
                        <div class="form-outline mb-4 w-75 m-auto">
                          <label for="" class="form-label text-secondary mt-2">Select class day</label>
                          <select name="class_day" id="" class="form-select">
                              <option value="Monday">Monday</option>
                              <option value="Tuesday">Tuesday</option>
                              <option value="Wednesday">Wednesday</option>
                              <option value="Thursday">Thursday</option>
                              <option value="Friday">Friday</option>
                              <option value="Saturday">Saturday</option>
                              <option value="Sunday">Sunday</option>
                          </select>
                        </div>
                     
                    <!-- Class time -->
                        <div class="form-outline mb-4 w-75 m-auto">
                          <label for="class_time" class="form-label text-secondary mt-2">Class Time</label>
                          <input type="time" name="class_time" id="class_time" class="form-control p-2" required="required" />
                        </div>    

                    <!-- Keyword -->
                        <div class="form-outline mb-4 w-75 m-auto">
                            <label for="class_keywords" class="form-label text-secondary mt-2">Keywords</label>
                            <input type="text" name="class_keywords" id="class_keywords" class="form-control p-2" required="required" />
                        </div>

                    <!-- Description -->
                        <div class="form-outline mb-4 w-75 m-auto">
                            <label for="class_description" class="form-label text-secondary mt-2">Description</label>
                            <textarea rows="3" type="text" name="class_description" id="class_description" class="form-control p-2" required="required" placeholder="Write the description here"></textarea>
                        </div>

                    <!-- Email -->
                        <div class="form-outline mb-4 w-75 m-auto">
                            <label for="teach_email" class="form-label text-secondary mt-2">Your Email</label>
                            <input type="email" name="teach_email" id="teach_email" class="form-control p-2" value="<?php echo $teach_email ?>">
                        </div>

                    <!-- Contact No -->
                        <div class="form-outline mb-4 w-75 m-auto">
                            <label for="teach_telNo" class="form-label text-secondary mt-2">Contact No</label>
                            <input type="text" name="teach_telNo" id="teach_telNo" class="form-control p-2" value="<?php echo $teach_telNo ?>">
                        </div>

                    <!-- Display Image -->
                        <div class="form-outline mb-4 w-75 m-auto">
                            <label for="disp_img" class="form-label text-secondary mt-2">Display Image</label>
                            <input type="file" name="disp_img" id="disp_img" class="form-control p-2" required="required" />
                        </div>
        
                        <div class="form-outline mb-4 w-75 m-auto">
                            <input type="submit" name="add_class" class="btn btn-warning py-2 px-5 mt-4 rounded-3" value="Add Class">
                        </div>
        
                    </form>
                    
                  </div>
                </div>
              </div>

              </div>

            </div>
          </div>
        </div>  
        <!-- content-wrapper ends -->

<?php

if(isset($_POST['add_class'])){

    $teach_id = $_POST['teach_id'];
    $teach_name = $_POST['teach_name'];
    $subject = $_POST['subject'];
    $grade_ctg = $_POST['grade_ctg'];
    $class_grade = $_POST['class_grade'];
    $class_day = $_POST['class_day'];
    $class_time = $_POST['class_time'];
    $class_keywords = $_POST['class_keywords'];
    $class_description = $_POST['class_description'];
    $teach_email = $_POST['teach_email'];
    $teach_telNo = $_POST['teach_telNo'];
    $status = 'unapproved';

    // accessing images
    $disp_img = $_FILES['disp_img']['name'];

    // accessing image temp name
    $temp_image = $_FILES['disp_img']['tmp_name'];

    //checking empty condition
    if($teach_id=='' or $teach_name=='' or $subject=='' or $grade_ctg=='' or $class_grade=='' or $class_day=='' or $class_time=='' or $class_keywords=='' or $class_description=='' or $teach_email=='' or $teach_telNo=='' or $disp_img==''){
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image,"../Class_images/$disp_img");;

        // insert query
        $insert_classes = "INSERT INTO  classes (teach_id,teach_name,subject,grade_id,class_grade,class_day,class_time,class_keywords,class_description,teach_email,teach_telNo,disp_img,date,status)
                            VALUES ('$teach_id','$teach_name','$subject','$grade_ctg','$class_grade','$class_day','$class_time','$class_keywords','$class_description','$teach_email','$teach_telNo','$disp_img',NOW(),'$status')";
                            
                            $result_query = mysqli_query($conn,$insert_classes);
                            if($result_query){
                                echo "<script>alert('Class adding Successfully, Please wait for approval!')</script>";
                            }
    }
}

?>        


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/lib/wow/wow.min.js"></script>
    <script src="../assets/lib/easing/easing.min.js"></script>
    <script src="../assets/lib/waypoints/waypoints.min.js"></script>
    <script src="../assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../assets/lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="../assets/js/main.js"></script>
  </body>
</html>