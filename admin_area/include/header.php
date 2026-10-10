<?php include('../include/conn.php');
include('../function/common_function.php');
@session_start();
?>

<style>
  .notify small{
    background-color: #ff0000;
    padding: 5px;
    border-radius: 30%;
  }
</style>

        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini text-white text-decoration-none" href="index.php">E d u F l o w</a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
            </ul>
            <ul class="navbar-nav navbar-nav-right">
          
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="fa-regular fa-bell"></i>
                  <sup class="text-light notify"><small><?php unseen_notify(); ?></small></sup>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list overflow-auto" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">question</h6>
                  <div class="dropdown-divider"></div>
                      <?php question() ; ?>
                  <p class="p-3 mb-0 text-center"><a href="view_question.php" class="text-decoration-none text-light">See all question</a></p>
                </div>
              </li>

              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="fa-regular fa-message"></i>
                  <sup class="text-light notify"><small><?php approve_class(); ?></small></sup>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list overflow-auto" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Messages</h6>
                  <div class="dropdown-divider"></div>
                      <?php Messages() ; ?>
                  <p class="p-3 mb-0 text-center"><a href="view_classes.php" class="text-decoration-none text-light">See all question</a></p>
                </div>
              </li>

              <li class="nav-item mx-1 border-left">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
              
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>