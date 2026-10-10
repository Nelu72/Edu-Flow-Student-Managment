<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo text-white text-decoration-none" href="index.php">E d u F l o w</a>
          <a class="sidebar-brand brand-logo-mini text-white text-decoration-none" href="index.php">EF</a>
        </div>
        <ul class="nav">
          <!-- Profile -->
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="assets/images/sidebar.png" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">E d u F l o w</h5>
                  <span>Education</span>
                </div>
              </div>
            </div>
          </li>

          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>

        <!-- Dashboard -->
          <li class="nav-item menu-items">
            <a class="nav-link" href="home.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

        <!-- View Items   -->
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <span class="menu-icon">
                <i class="fa-solid fa-eye fa-2xs"></i>
              </span>
              <span class="menu-title">View Items</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="./view_users.php">
                    <span class="menu-icon">
                      <i class="fa-solid fa-users"></i>
                    </span> Users
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./view_teachers.php">
                    <span class="menu-icon">
                      <i class="fa-solid fa-person-circle-check"></i>
                    </span> Teachers
                  </a>
                </li>
                <li class="nav-item"> 
                  <a class="nav-link" href="./view_institutes.php">
                    <span class="menu-icon">
                      <i class="fa-solid fa-building-columns"></i>
                    </span> Institutes
                  </a>
                </li>
                <li class="nav-item"> 
                  <a class="nav-link" href="./view_classes.php">
                    <span class="menu-icon">
                      <i class="fa-solid fa-book"></i>
                    </span> Classes
                  </a>
                </li>
                <li class="nav-item"> 
                  <a class="nav-link" href="./view_question.php">
                    <span class="menu-icon">
                      <i class="fa-solid fa-question"></i>
                    </span> Questions
                  </a>
                </li>
                <li class="nav-item"> 
                  <a class="nav-link" href="./view_instAd.php">
                    <span class="menu-icon">
                      <i class="fa-solid fa-signs-post"></i>
                    </span> Institute Ads
                  </a>
                </li>
              </ul>
            </div>
          </li>
          
          <li class="nav-item menu-items">
            <a class="nav-link" href="./insert_carousel.php">
              <span class="menu-icon">
                <i class="fa-solid fa-circle-plus"></i>
              </span>
              <span class="menu-title">Insert Carousel</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="./insert_gradeCtg.php">
              <span class="menu-icon">
                <i class="fa-solid fa-circle-plus"></i>
              </span>
              <span class="menu-title">Insert Grade Category</span>
            </a>
          </li>
          
        </ul>
      </nav>