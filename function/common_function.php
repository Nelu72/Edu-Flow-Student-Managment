<?php 

// getting Classes

function getclasses(){
  global $conn;

  // condition to check isset or not

  if(!isset($_GET['category'])){

                  $select_query = "SELECT * FROM classes WHERE status='approved' ORDER BY rand() LIMIT 0,9";
                  $result_query = mysqli_query($conn,$select_query);
                  while($row = mysqli_fetch_assoc($result_query)){
                    $class_id = $row['class_id'];
                    $teach_name = $row['teach_name'];
                    $subject = $row['subject'];
                    $grade_id = $row['grade_id'];
                    $class_grade = $row['class_grade'];
                    $class_keywords = $row['class_keywords'];
                    $class_description = $row['class_description'];
                    $teach_email = $row['teach_email'];
                    $teach_telNo = $row['teach_telNo'];
                    $disp_img = $row['disp_img'];
                    $status = 'approved';
                    echo "
                        <div class='col classes'>
                          <a href='./single_view.php?class_id=$class_id' class='card h-100 bg-dark'>
                            <img src='../Class_images/$disp_img' class='card-img-top' alt='...'>
                            <div class='card-body'>
                              <h5 class='card-title text-white'>$teach_name</h5>
                              <h6 class='text-secondary' style='font-size: 14px;'>($subject)</h6>
                              <p class='card-text text-light'>$class_keywords</p>
                            </div>
                          </a>
                        </div>
                    ";
                  }
  
}
}

// getting unique category

function get_unique_category(){
  global $conn;

  // condition to check isset or not

  if(isset($_GET['category'])){
    $grade_id = $_GET['category'];

                  $select_query = "SELECT * FROM classes WHERE grade_id=$grade_id";
                  $result_query = mysqli_query($conn,$select_query);

                  $num_of_rows = mysqli_num_rows($result_query);
                    if($num_of_rows==0){
                      echo "<script>alert('No result found')</script>";
                      echo "<h4 class='text-center rounded-3 p-2 w-75 m-auto text-danger mt-5' style='border: 1px solid rgb(187, 187, 187);'>No result found</h4>";
                    }
                  while($row = mysqli_fetch_assoc($result_query)){
                    $class_id = $row['class_id'];
                    $teach_name = $row['teach_name'];
                    $subject = $row['subject'];
                    $grade_id = $row['grade_id'];
                    $class_grade = $row['class_grade'];
                    $class_keywords = $row['class_keywords'];
                    $class_description = $row['class_description'];
                    $teach_email = $row['teach_email'];
                    $teach_telNo = $row['teach_telNo'];
                    $disp_img = $row['disp_img'];
                    $status = 'approve';
                    echo "
                        <div class='col classes'>
                          <a href='./single_view.php?class_id=$class_id' class='card h-100 bg-dark'>
                            <img src='../Class_images/$disp_img' class='card-img-top' alt='...'>
                            <div class='card-body'>
                              <h5 class='card-title text-white'>$teach_name</h5>
                              <h6 class='text-secondary' style='font-size: 14px;'>($subject)</h6>
                              <p class='card-text text-light'>$class_keywords</p>
                            </div>
                          </a>
                        </div>
                    ";
                  }
  
}
}

// display categories in dropdown

function getcategories(){
    global $conn;

        $select_ctg = "SELECT * FROM grade_cat";
        $result_ctg = mysqli_query($conn,$select_ctg);

        while($row_data = mysqli_fetch_assoc($result_ctg)){
          $grade_name = $row_data['grade_name'];
          $grade_id = $row_data['grade_id'];
          echo "<a class='dropdown-item' href='home.php?category=$grade_id'>$grade_name</a>";
        }
}

// searching Classes

function search_class(){
  global $conn;
  if(isset($_GET['search_data_class'])){
                    $search_data_value = $_GET['search_data'];

                    $search_query = "SELECT * FROM classes WHERE subject LIKE '%$search_data_value%'";
                    $result_query = mysqli_query($conn,$search_query);

                    $num_of_rows = mysqli_num_rows($result_query);
                    if($num_of_rows==0){
                      echo "<script>alert('No result found')</script>";
                      echo "<h4 class='text-center rounded-3 p-2 w-75 m-auto text-danger mt-5' style='border: 1px solid rgb(187, 187, 187);'>No result found</h4>";
                    }
                    while($row = mysqli_fetch_assoc($result_query)){
                      $class_id = $row['class_id'];
                      $teach_name = $row['teach_name'];
                      $subject = $row['subject'];
                      $grade_id = $row['grade_id'];
                      $class_grade = $row['class_grade'];
                      $class_keywords = $row['class_keywords'];
                      $class_description = $row['class_description'];
                      $teach_email = $row['teach_email'];
                      $teach_telNo = $row['teach_telNo'];
                      $disp_img = $row['disp_img'];
                      $status = 'approve';
                    echo "
                        <div class='col classes'>
                          <a href='./single_view.php?class_id=$class_id' class='card h-100 bg-dark'>
                            <img src='../Class_images/$disp_img' class='card-img-top' alt='...'>
                            <div class='card-body'>
                              <h5 class='card-title text-white'>$teach_name</h5>
                              <h6 class='text-secondary' style='font-size: 14px;'>($subject)</h6>
                              <p class='card-text text-light'>$class_keywords</p>
                            </div>
                          </a>
                        </div>
                    ";
                  }
  
}
}

// getting All Classes

function get_allClasses(){
  global $conn;

  // condition to check isset or not

  if(!isset($_GET['category'])){

                  $select_query = "SELECT * FROM classes WHERE status='approved' ORDER BY rand()";
                  $result_query = mysqli_query($conn,$select_query);
                  while($row = mysqli_fetch_assoc($result_query)){
                    $class_id = $row['class_id'];
                    $teach_name = $row['teach_name'];
                    $subject = $row['subject'];
                    $grade_id = $row['grade_id'];
                    $class_grade = $row['class_grade'];
                    $class_keywords = $row['class_keywords'];
                    $class_description = $row['class_description'];
                    $teach_email = $row['teach_email'];
                    $teach_telNo = $row['teach_telNo'];
                    $disp_img = $row['disp_img'];
                    $status = 'approve';
                    echo "
                        <div class='col classes'>
                          <a href='./single_view.php?class_id=$class_id' class='card h-100 bg-dark'>
                            <img src='../Class_images/$disp_img' class='card-img-top' alt='...'>
                            <div class='card-body'>
                              <h5 class='card-title text-white'>$teach_name</h5>
                              <h6 class='text-secondary' style='font-size: 14px;'>($subject)</h6>
                              <p class='card-text text-light'>$class_keywords</p>
                            </div>
                          </a>
                        </div>
                    ";
                  }
  
}
}

// Single class view

function single_class_view(){

  global $conn;

    // condition to check isset or not

    if(isset($_GET['class_id'])){

    if(!isset($_GET['category'])){
      $class_id = $_GET['class_id'];

                    $select_query = "SELECT * FROM classes WHERE class_id=$class_id";
                    $result_query = mysqli_query($conn,$select_query);

                    while($row = mysqli_fetch_assoc($result_query)){
                      $class_id = $row['class_id'];
                      $teach_id = $row['teach_id'];
                      $teach_name = $row['teach_name'];
                      $subject = $row['subject'];
                      $grade_id = $row['grade_id'];
                      $class_grade = $row['class_grade'];
                      $class_day = $row['class_day'];
                      $class_time = $row['class_time'];
                      $class_keywords = $row['class_keywords'];
                      $class_description = $row['class_description'];
                      $teach_email = $row['teach_email'];
                      $teach_telNo = $row['teach_telNo'];
                      $disp_img = $row['disp_img'];
                      $str = $row['date'];
                      $date = date('d M Y', strtotime($str));
                      echo "
                        <!-- Breadcrumb Start -->
                          <nav aria-label='breadcrumb'>
                            <ol class='breadcrumb mt-5'>
                              <li class='breadcrumb-item'><a href='./index.php'>Home</a></li>
                              <li class='breadcrumb-item'><a href='./all_classes.php'>Classes</a></li>
                              <li class='breadcrumb-item active' aria-current='page'>$subject</li>
                            </ol>
                          </nav>
                        <!-- Breadcrumb End -->
                      
                        <div class='head'>
                          <h3 class='text-dark'>$teach_name<span style='color: rgb(255, 100, 100);'>($subject)</span></h3>
                          <div class='d-flex'>
                            <p class='text-muted' style='font-size: 12px;'>$date</p>
                          </div>
                        </div>
                  
                        <div class='body'>
                          <img src='../Class_images/$disp_img' class='rounded-1' alt=''>
                          <p class='mt-5 text-dark'>$class_description</p>
                          <p class='' style='font-size: 14px;'>Teacher's Profile - <a class='' href='./teach_profile.php?teach_id=$teach_id'>$teach_name</a></p>
                          <p class='text-dark' style='font-size: 14px;'>Keywords : <span class='text-muted'>$class_keywords</span></p>

                          <div class='d-flex'>
                            <p class='p-1 text-dark text-center mx-1 w-50 rounded-3 bg-info'>Class Day : <span class='fw-bold'>$class_day</span></p>
                            <p class='p-1 text-dark text-center mx-1 w-50 rounded-3 bg-warning'>Time : <span class='fw-bold'>$class_time</span></p>
                          </div>
                        </div>
                      ";
                    }
    
}
}
}

// Single institute view

function single_institute_view(){

  global $conn;

    // condition to check isset or not

    if(isset($_GET['inst_id'])){

    if(!isset($_GET['category'])){
      $inst_id = $_GET['inst_id'];

                    $select_query = "SELECT * FROM inst_ad WHERE inst_id=$inst_id";
                    $result_query = mysqli_query($conn,$select_query);

                    while($row = mysqli_fetch_assoc($result_query)){
                      $inst_id = $row['inst_id'];
                      $inst_name = $row['inst_name'];
                      $inst_email = $row['inst_email'];
                      $inst_address = $row['inst_address'];
                      $inst_telNo = $row['inst_telNo'];
                      $hall_avb = $row['hall_avb'];
                      $disp_img = $row['disp_img'];
                      $str = $row['date'];
                      $date = date('d M Y', strtotime($str));
                      echo "
                        <!-- Breadcrumb Start -->
                          <nav aria-label='breadcrumb'>
                            <ol class='breadcrumb mt-5'>
                              <li class='breadcrumb-item'><a href='./index.php'>Home</a></li>
                              <li class='breadcrumb-item'><a href='./institute.php'>Institute</a></li>
                              <li class='breadcrumb-item active' aria-current='page'>$inst_name</li>
                            </ol>
                          </nav>
                        <!-- Breadcrumb End -->
                      
                        <div class='head'>
                          <h3 class='text-dark'>$inst_name</h3>
                          <p class='mt-1 text-muted'>$inst_address</p>
                          <div class='d-flex'>
                            <p class='text-muted' style='font-size: 12px;'>Poster added date : $date</p>
                          </div>
                        </div>
                  
                        <div class='body'>
                          <img src='../institutes/inst_images/$disp_img' class='rounded-1' alt=''>
                          <p class='mt-5 text-dark'>Institute email : $inst_email</p>
                          <p class='text-dark' style='font-size: 14px;'>Number of halls available : <span class='text-muted'>$hall_avb</span></p>
                          <p class='' style='font-size: 14px;'>Contact No - $inst_telNo</p>
                        </div>
                      ";
                    }
    
}
}
}

// searching Classes using teacher's Name

function search_className(){
  global $conn;
  if(isset($_GET['search_data_tName'])){
                    $search_data_value = $_GET['search_data'];

                    $search_query = "SELECT * FROM  classes WHERE teach_name LIKE '%$search_data_value%'";
                    $result_query = mysqli_query($conn,$search_query);

                    $num_of_rows = mysqli_num_rows($result_query);
                    if($num_of_rows==0){
                      echo "<script>alert('No result found')</script>";
                      echo "<h4 class='text-center rounded-3 p-2 w-75 m-auto text-danger mt-5' style='border: 1px solid rgb(187, 187, 187);'>No result found</h4>";
                    }
                    while($row = mysqli_fetch_assoc($result_query)){
                      $class_id = $row['class_id'];
                      $teach_name = $row['teach_name'];
                      $subject = $row['subject'];
                      $grade_id = $row['grade_id'];
                      $class_grade = $row['class_grade'];
                      $class_keywords = $row['class_keywords'];
                      $class_description = $row['class_description'];
                      $teach_email = $row['teach_email'];
                      $teach_telNo = $row['teach_telNo'];
                      $disp_img = $row['disp_img'];
                      $status = 'approve';
                    echo "
                        <div class='col classes'>
                          <a href='./single_view.php?class_id=$class_id' class='card h-100 bg-dark'>
                            <img src='../Class_images/$disp_img' class='card-img-top' alt='...'>
                            <div class='card-body'>
                              <h5 class='card-title text-white'>$teach_name</h5>
                              <h6 class='text-secondary' style='font-size: 14px;'>($subject)</h6>
                              <p class='card-text text-light'>$class_keywords</p>
                            </div>
                          </a>
                        </div>
                    ";
                  }
  
}
}

// searching institute

function search_inst(){
  global $conn;
  if(isset($_GET['search_data_inst'])){
                    $search_data_value = $_GET['search_data'];

                    $search_query = "SELECT * FROM inst_ad WHERE inst_name LIKE '%$search_data_value%'";
                    $result_query = mysqli_query($conn,$search_query);

                    $num_of_rows = mysqli_num_rows($result_query);
                    if($num_of_rows==0){
                      echo "<script>alert('No result found')</script>";
                      echo "<h4 class='text-center rounded-3 p-2 w-75 m-auto text-danger mt-5' style='border: 1px solid rgb(187, 187, 187);'>No result found</h4>";
                    }
                    while($row = mysqli_fetch_assoc($result_query)){
                      $ad_id = $row['ad_id'];
                      $inst_id = $row['inst_id'];
                      $inst_name = $row['inst_name'];
                      $inst_address = $row['inst_address'];
                      $hall_avb = $row['hall_avb'];
                      $inst_email = $row['inst_email'];
                      $inst_telNo = $row['inst_telNo'];
                      $disp_img = $row['disp_img'];
                      $str = $row['date'];
                      $date = date('d M Y', strtotime($str));
                    echo "
                        <div class='col classes'>
                          <a href='./single_instView.php?inst_id=$inst_id' class='card h-100 bg-dark'>
                            <img src='../institutes/inst_images/$disp_img' class='card-img-top' alt='...'>
                            <div class='card-body'>
                              <h5 class='card-title text-white'>$inst_name</h5>
                              <h6 class='text-secondary' style='font-size: 14px;'>$inst_address</h6>
                              <p class='card-text text-warning'>No of halls available : $hall_avb</p>
                              <p class='position-absolute bottom-0 end-0 mx-2 text-secondary' style='font-size: 12px;'>$date</p>
                            </div>
                          </a>
                        </div>
                    ";
                  }
  
}
}

// getting Institute Post

function get_instPost(){
  global $conn;

  // condition to check isset or not

  if(!isset($_GET['category'])){

                  $select_query = "SELECT * FROM inst_ad ORDER BY rand()";
                  $result_query = mysqli_query($conn,$select_query);
                  while($row = mysqli_fetch_assoc($result_query)){
                    $ad_id = $row['ad_id'];
                    $inst_id = $row['inst_id'];
                    $inst_name = $row['inst_name'];
                    $inst_address = $row['inst_address'];
                    $hall_avb = $row['hall_avb'];
                    $inst_email = $row['inst_email'];
                    $inst_telNo = $row['inst_telNo'];
                    $disp_img = $row['disp_img'];
                    $str = $row['date'];
                    $date = date('d M Y', strtotime($str));
                    echo "
                        <div class='col classes'>
                          <a href='./single_instView.php?inst_id=$inst_id' class='card h-100 bg-dark'>
                            <img src='../institutes/inst_images/$disp_img' class='card-img-top' alt='...'>
                            <div class='card-body'>
                              <h5 class='card-title text-white'>$inst_name</h5>
                              <h6 class='text-secondary' style='font-size: 14px;'>$inst_address</h6>
                              <p class='card-text text-warning'>No of halls available : $hall_avb</p>
                              <p class='position-absolute bottom-0 end-0 mx-2 text-secondary' style='font-size: 12px;'>$date</p>
                            </div>
                          </a>
                        </div>
                    ";
                  }
  
}
}

// getting teacher's profile

function get_teach_pro(){
  global $conn;

  // condition to check isset or not

  if(!isset($_GET['category'])){
            $teach_id = $_GET['teach_id'];

                  $select_query = "SELECT * FROM classes WHERE status='approved' AND teach_id=$teach_id ORDER BY rand()";
                  $result_query = mysqli_query($conn,$select_query);
                  while($row = mysqli_fetch_assoc($result_query)){
                    $class_id = $row['class_id'];
                    $teach_id = $row['teach_id'];
                    $teach_name = $row['teach_name'];
                    $subject = $row['subject'];
                    $grade_id = $row['grade_id'];
                    $class_grade = $row['class_grade'];
                    $class_keywords = $row['class_keywords'];
                    $class_description = $row['class_description'];
                    $teach_email = $row['teach_email'];
                    $teach_telNo = $row['teach_telNo'];
                    $disp_img = $row['disp_img'];
                    $status = 'approve';
                    echo "
                        <div class='col classes'>
                          <a href='./single_view.php?class_id=$class_id' class='card h-100 bg-dark'>
                            <img src='../Class_images/$disp_img' class='card-img-top' alt='...'>
                            <div class='card-body'>
                              <h5 class='card-title text-white'>$teach_name</h5>
                              <h6 class='text-secondary' style='font-size: 14px;'>($subject)</h6>
                              <p class='card-text text-light'>$class_keywords</p>
                            </div>
                          </a>
                        </div>
                    ";
                  }
  
}
}

// Display carousel

function getcarousel(){
  global $conn;
          
                  $select_query = "SELECT * FROM carousel";
                  $result_query = mysqli_query($conn,$select_query);
                  // $row = mysqli_fetch_assoc($result_query);
                  // echo $row['carousel_name'];
                  while($row = mysqli_fetch_assoc($result_query)){
                    $carousel_id = $row['carousel_id'];
                    $carousel_image1 = $row['carousel_image1'];
                    $carousel_image2 = $row['carousel_image2'];
                    $carousel_image3 = $row['carousel_image3'];
                    echo "
                        <div class='carousel-item active'>
                          <img src='../admin_area/all-img/$carousel_image1' class='d-block w-100' alt='...'>
                        </div>
                        <div class='carousel-item'>
                          <img src='../admin_area/all-img/$carousel_image2' class='d-block w-100' alt='...'>
                        </div>
                        <div class='carousel-item'>
                          <img src='../admin_area/all-img/$carousel_image3' class='d-block w-100' alt='...'>
                        </div>                      
                    ";
                  }
  
}

// getting teacher posted classes

function get_teachPost(){
  global $conn;

  // condition to check isset or not

  if(!isset($_GET['category'])){
    $teach_id = $_GET['teach_id'];

                  $select_query = "SELECT * FROM classes WHERE status='approved' AND teach_id=$teach_id ORDER BY rand()";
                  $result_query = mysqli_query($conn,$select_query);
                  while($row = mysqli_fetch_assoc($result_query)){
                    $class_id = $row['class_id'];
                    $teach_id = $row['teach_id'];
                    $teach_name = $row['teach_name'];
                    $subject = $row['subject'];
                    $grade_id = $row['grade_id'];
                    $class_grade = $row['class_grade'];
                    $class_keywords = $row['class_keywords'];
                    $class_description = $row['class_description'];
                    $teach_email = $row['teach_email'];
                    $teach_telNo = $row['teach_telNo'];
                    $disp_img = $row['disp_img'];
                    $status = 'approve';
                    echo "
                        <div class='col classes'>
                          <a href='./single_view.php?class_id=$class_id' class='card h-100 bg-dark'>
                            <img src='../Class_images/$disp_img' class='card-img-top' alt='...'>
                            <div class='card-body'>
                              <h5 class='card-title text-white'>$teach_name</h5>
                              <h6 class='text-secondary' style='font-size: 14px;'>($subject)</h6>
                              <p class='card-text text-light'>$class_keywords</p>
                            </div>
                          </a>
                        </div>
                    ";
                  }
  
}
}

// getting Institute posted classes

function get_instPostPro(){
  global $conn;

  // condition to check isset or not

  if(!isset($_GET['category'])){
    $inst_id = $_GET['inst_id'];

                  $select_query = "SELECT * FROM inst_ad WHERE status='approved' AND inst_id=$inst_id ORDER BY rand()";
                  $result_query = mysqli_query($conn,$select_query);
                  while($row = mysqli_fetch_assoc($result_query)){
                    $ad_id = $row['ad_id'];
                    $inst_id = $row['inst_id'];
                    $inst_name = $row['inst_name'];
                    $inst_address = $row['inst_address'];
                    $hall_avb = $row['hall_avb'];
                    $inst_email = $row['inst_email'];
                    $inst_telNo = $row['inst_telNo'];
                    $disp_img = $row['disp_img'];
                    $status = 'approve';
                    $str = $row['date'];
                    $date = date('d M Y', strtotime($str));
                    echo "
                        <div class='col classes'>
                          <a href='./single_instView.php?inst_id=$inst_id' class='card h-100 bg-dark'>
                            <img src='../institutes/inst_images/$disp_img' class='card-img-top' alt='...'>
                            <div class='card-body'>
                              <h5 class='card-title text-white'>$inst_name</h5>
                              <h6 class='text-secondary' style='font-size: 14px;'>$inst_address</h6>
                              <p class='card-text text-warning'>No of halls available : $hall_avb</p>
                              <p class='position-absolute bottom-0 end-0 mx-2 text-secondary' style='font-size: 12px;'>$date</p>
                            </div>
                          </a>
                        </div>
                    ";
                  }
  
}
}

// get ip  address function
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;

// Notification function
function question(){
  global $conn;

  // condition to check isset or not

  if(!isset($_GET['question'])){

                  $select_query = "SELECT * FROM question WHERE status='unapproved' ORDER BY nt_id DESC LIMIT 0,6";
                  $result_query = mysqli_query($conn,$select_query);
                  // $row = mysqli_fetch_assoc($result_query);
                  while($row = mysqli_fetch_assoc($result_query)){
                    $nt_id = $row['nt_id'];
                    $nt_name = $row['nt_name'];
                    $nt_no = $row['nt_no'];
                    $nt_comment = $row['nt_comment'];
                    $date = $row['date'];

                    echo "
                    <a href='notifyview.php?nt_id=$nt_id' class='dropdown-item preview-item'>
                        <div class='preview-thumbnail'>
                          <div class='preview-icon bg-dark rounded-circle'>
                            <i class='mdi mdi-message text-success'></i>
                          </div>
                        </div>
                        <div class='preview-item-content'>
                          <p class='preview-subject mb-1'>$nt_name</p>
                          <p class='text-muted ellipsis mb-2'> $nt_comment </p>
                          <p class='text-muted ellipsis mb-0' style='font-size: 10px;'> $date </p>
                        </div>
                    </a>
                      <div class='dropdown-divider'></div>
                    ";
                  }
  
}
}

// Notification details view

function notify_details(){
  global $conn;

    // condition to check isset or not

    if(isset($_GET['nt_id'])){

    if(!isset($_GET['notification'])){
      $nt_id = $_GET['nt_id'];

                    $select_query = "SELECT * FROM question WHERE nt_id=$nt_id";
                    $result_query = mysqli_query($conn,$select_query);

                    while($row = mysqli_fetch_assoc($result_query)){
                      $nt_id = $row['nt_id'];
                      $nt_name = $row['nt_name'];
                      $nt_no = $row['nt_no'];
                      $teach_id = $row['teach_id'];
                      $nt_comment = $row['nt_comment'];
                      $status = $row['status'];
                      $date = $row['date'];
                      echo "
                        <div class='card-body'>
                          <h4 class='card-title text-center'>question</h4>
    
                            <p class='mx-3 mt-5'>User Name - <strong class='text-success' style='font-size: 18px; letter-spacing: 0.5px;'>$nt_name</strong></p>
                            <p class='mx-3'>User mobile number - <span class='text-success' style='font-size: 16px; letter-spacing: 0.5px;'>$nt_no</span></p>
                            <p class='mx-3 text-primary'>Teacher ID - <span style='font-size: 16px; letter-spacing: 0.5px;'>$teach_id</span></p>

                              <form action='code.php' method='post' class='float-right'>
                                <input type='hidden' name='nt_id' value='$nt_id' >
                                        
                                  <div class='input-group w-25 mt-2 mx-4'>
                                    <input type='checkbox' class='form-control text-light' name='status' value='$status' aria-label='Username' aria-describedby='basic-addon1' required='required'>
                                  </div>
                                  
                                  <div class='input-group w-10 mb-2'>
                                    <input type='submit' class='btn btn-danger' name='update_status' value='approve' aria-label='Username' aria-describedby='basic-addon1'>
                                  </div>
                                        
                              </form>

                            <p class='p-5 mt-4 text-dark mx-1' style='background-color: #e3e3e3; border-radius: 8px;'>$nt_comment </p>
    
                            <p class='float-right text-muted'>$date</p>
                          
                        </div>
                      ";
                    }
    
}
}
}

// function to get unapproved question
function unseen_notify(){
  if(isset($_GET['nt_id'])){
    global $conn;

      $status = 'unapproved';
      
      $select_query = "SELECT * FROM question WHERE status='unapproved'";
      $result_query = mysqli_query($conn,$select_query);
      $count_unapproved_notify = mysqli_num_rows($result_query);
    }else{
      global $conn;

      $status = 'unapproved';
      
      $select_query = "SELECT * FROM question WHERE status='unapproved'";
      $result_query = mysqli_query($conn,$select_query);
      $count_unapproved_notify = mysqli_num_rows($result_query);
      }
      echo $count_unapproved_notify;

  }

// function to approve classes
function approve_class(){
  if(isset($_GET['class_id'])){
    global $conn;

      $status = 'unapproved';
      
      $select_query = "SELECT * FROM classes WHERE status='unapproved'";
      $result_query = mysqli_query($conn,$select_query);
      $count_unapprove_msg = mysqli_num_rows($result_query);
    }else{
      global $conn;

      $status = 'unapproved';
      
      $select_query = "SELECT * FROM classes WHERE status='unapproved'";
      $result_query = mysqli_query($conn,$select_query);
      $count_unapprove_msg = mysqli_num_rows($result_query);
      }
      echo $count_unapprove_msg;

}

// Message function
function Messages(){
  global $conn;

  // condition to check isset or not

  if(!isset($_GET['Messages'])){

                  $select_query = "SELECT * FROM classes WHERE status='unapproved' ORDER BY class_id DESC LIMIT 0,6";
                  $result_query = mysqli_query($conn,$select_query);
                  // $row = mysqli_fetch_assoc($result_query);
                  while($row = mysqli_fetch_assoc($result_query)){
                    $class_id = $row['class_id'];
                    $teach_name = $row['teach_name'];
                    $date = $row['date'];

                    echo "
                    <a href='view_classes.php?class_id=$class_id' class='dropdown-item preview-item'>
                        <div class='preview-thumbnail'>
                          <div class='preview-icon bg-dark rounded-circle'>
                            <i class='mdi mdi-message text-primary'></i>
                          </div>
                        </div>
                        <div class='preview-item-content'>
                          <p class='preview-subject mb-1'>$teach_name</p>
                          <p class='text-muted ellipsis mb-2'> New Class added </p>
                          <p class='text-muted ellipsis mb-0' style='font-size: 10px;'> $date </p>
                        </div>
                    </a>
                      <div class='dropdown-divider'></div>
                    ";
                  }
  
}
}

// getting user Messages

function get_user_messages(){
  global $conn;

  // condition to check isset or not

  if(!isset($_GET['category'])){

          $username = $_SESSION['username'];
          $get_user = "SELECT * FROM user_table WHERE username='$username'";
          $result = mysqli_query($conn,$get_user);
          $run_query = mysqli_fetch_array($result);
          $user_id = $run_query['user_id'];

                  $select_query = "SELECT * FROM question WHERE user_id='$user_id' ORDER BY date DESC LIMIT 0,5";
                  $result_query = mysqli_query($conn,$select_query);
                  while($row = mysqli_fetch_assoc($result_query)){
                      $nt_id = $row['nt_id'];
                      $nt_name = $row['nt_name'];
                      $nt_no = $row['nt_no'];
                      $teach_id = $row['teach_id'];
                      $nt_comment = $row['nt_comment'];
                      $status = $row['status'];
                      $teach_status = $row['teach_status'];
                      $date = $row['date'];
                    echo "
                        <div class='card mb-3'>
                          <div class='card-header bg-info text-white'>
                            <div class='d-flex'>
                              <p class='mx-4'>Message Status : <span class='text-danger'>$status</span></p>
                              <p class='mx-4'>Teacher Status : <span class='text-success'>$teach_status</span></p>
                            </div>  
                          </div>
                          <div class='card-body'>
                            <p class='card-text text-dark'>$nt_comment</p>
                          </div>
                        </div>
                    ";
                  }
  
}
}

// Count unapproved message user profile

function count_unseenMsg(){
  global $conn;
  $username = $_SESSION['username'];
  $get_details = "SELECT * FROM user_table WHERE username='$username'";
  $result_query = mysqli_query($conn,$get_details);
  while($row_query = mysqli_fetch_array($result_query)){
    $user_id = $row_query['user_id'];
        if(!isset($_GET['delete_account'])){
          $get_orders = "SELECT * FROM question WHERE user_id=$user_id AND status='unapproved'";
          $result_orders_query = mysqli_query($conn,$get_orders);
          $row_count = mysqli_num_rows($result_orders_query);
          if($row_count>0){
            echo "<p class='count text-dark' data-to='$row_count' data-speed='$row_count'>$row_count</p>";
          }else{
            echo "<p class='count text-dark' data-to='$row_count' data-speed='$row_count'>$row_count</p>";
          }
    }
  }
}

// Count All messages user profile

function count_allMsg(){
  global $conn;
  $username = $_SESSION['username'];
  $get_details = "SELECT * FROM user_table WHERE username='$username'";
  $result_query = mysqli_query($conn,$get_details);
  while($row_query = mysqli_fetch_array($result_query)){
    $user_id = $row_query['user_id'];
        if(!isset($_GET['delete_account'])){
          $get_orders = "SELECT * FROM question WHERE user_id='$user_id'";
          $result_orders_query = mysqli_query($conn,$get_orders);
          $row_count = mysqli_num_rows($result_orders_query);
          if($row_count>0){
            echo "<p class='count text-dark' data-to='$row_count' data-speed='$row_count'>$row_count</p>";
          }else{
            echo "<p class='count text-dark' data-to='$row_count' data-speed='$row_count'>$row_count</p>";
          }
    }
  }
}

// Count All message Teacher's profile

function count_all_teachMsg(){
  global $conn;
  $teach_email = $_SESSION['teacherLog'];
  $get_details = "SELECT * FROM teacher_table WHERE teach_email='$teach_email'";
  $result_query = mysqli_query($conn,$get_details);
  while($row_query = mysqli_fetch_array($result_query)){
    $teach_id = $row_query['teach_id'];
        if(!isset($_GET['delete_account'])){
          $get_orders = "SELECT * FROM question WHERE teach_id='$teach_id' AND status='approved'";
          $result_orders_query = mysqli_query($conn,$get_orders);
          $row_count = mysqli_num_rows($result_orders_query);
          if($row_count>0){
            echo "<p class='count text-dark' data-to='$row_count' data-speed='$row_count'>$row_count</p>";
          }else{
            echo "<p class='count text-dark' data-to='$row_count' data-speed='$row_count'>$row_count</p>";
          }
    }
  }
}

// Count unseen teacher's message profile

function count_unseen_teachMsg(){
  global $conn;
  $teach_email = $_SESSION['teacherLog'];
  $get_details = "SELECT * FROM teacher_table WHERE teach_email='$teach_email'";
  $result_query = mysqli_query($conn,$get_details);
  while($row_query = mysqli_fetch_array($result_query)){
    $teach_id = $row_query['teach_id'];
        if(!isset($_GET['delete_account'])){
          $get_orders = "SELECT * FROM question WHERE teach_id=$teach_id AND teach_status='unseen' AND status='approved'";
          $result_orders_query = mysqli_query($conn,$get_orders);
          $row_count = mysqli_num_rows($result_orders_query);
          if($row_count>0){
            echo "<p class='count text-dark' data-to='$row_count' data-speed='$row_count'>$row_count</p>";
          }else{
            echo "<p class='count text-dark' data-to='$row_count' data-speed='$row_count'>$row_count</p>";
          }
    }
  }
}

// getting Teacher's Messages

function get_teach_messages(){
  global $conn;

  // condition to check isset or not

  if(!isset($_GET['category'])){

          $teach_email = $_SESSION['teacherLog'];
          $get_user = "SELECT * FROM teacher_table WHERE teach_email='$teach_email'";
          $result = mysqli_query($conn,$get_user);
          $run_query = mysqli_fetch_array($result);
          $teach_id = $run_query['teach_id'];

                  $select_query = "SELECT * FROM question WHERE teach_status='unseen' AND status='approved' AND teach_id=$teach_id ORDER BY date DESC LIMIT 0,5";
                  $result_query = mysqli_query($conn,$select_query);
                  while($row = mysqli_fetch_assoc($result_query)){
                      $nt_id = $row['nt_id'];
                      $nt_name = $row['nt_name'];
                      $nt_no = $row['nt_no'];
                      $teach_id = $row['teach_id'];
                      $nt_comment = $row['nt_comment'];
                      $teach_status = $row['teach_status'];
                      $date = $row['date'];
                    echo "
                        <div class='card mb-3'>
                          <div class='card-header bg-info text-white'>
                            <div class='d-flex mt-2'>
                              <h6 class='mx-5' style='font-size: 14px;'>User Name : <small class='text-success'>$nt_name</small></h6>
                              <h6 class='mx-5' style='font-size: 14px;'>Contact No : <small class='text-success'>$nt_no</small></h6>
                            </div>
                          </div>
                          <div class='card-body'>
                            <form action='../admin_area/code.php' method='post' class='position-absolute end-0'>
                              <input type='hidden' name='nt_id' value='$nt_id' >
                                      
                                <div class='input-group w-25 mt-2 mx-4'>
                                  <input type='checkbox' class='text-light' name='teach_status' value='$teach_status' aria-label='Username' aria-describedby='basic-addon1' required='required'>
                                </div>
                                
                                <div class='input-group w-10 mt-2'>
                                  <input type='submit' class='btn btn-danger rounded-3' name='update_teach_status' value='seen' aria-label='Username' aria-describedby='basic-addon1'>
                                </div>
                                      
                            </form>                         
                            <p class='text-dark'>$nt_comment</p>
                          </div>
                        </div>
                    ";
                  }
  
}
}

?>