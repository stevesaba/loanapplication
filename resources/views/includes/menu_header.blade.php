    
    <div class="main-header">
      <!-- Logo Header -->
      <div class="logo-header">
        <a href="#" class="logo">
          <img src="<?php echo url('/'); ?>/public/images/logo.png" alt="navbar brand" class="navbar-brand desktop">
          <img src="<?php echo url('/'); ?>/public/images/icon.png" alt="navbar brand" class="mobile">
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation"><i class="las la-bars"></i>
        </button>
        <button class="topbar-toggler more toggled"><img src="<?php echo url('/'); ?>/public/images/icon-options-vertical.svg" alt=""></button>
      </div>
      <!-- End Logo Header -->

      <!-- Navbar Header -->
      <nav class="navbar navbar-header navbar-expand-lg">
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="las la-bars"></i>
          </button>
        </div>
        <div class="container-fluid">
          
          <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
           
            <li class="nav-item dropdown hidden-caret top-user-profile">
              <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                <p><small>Welcome</small>{{$CustomerName}}</p>
                <div class="avatar-sm">
                  <img src="<?php echo url('/'); ?>/public/images/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
              </a>
              <ul class="dropdown-menu dropdown-user animated fadeIn">
                <div class="dropdown-user-scroll scrollbar-outer">
                  <li>
                    <div class="user-box">
                      <div class="u-text">
                        <h4><?php echo $CustomerName; ?></h4>
                        <p class="text-muted"><?php echo $CustomerEmail; ?></p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo url('customerLogout'); ?>">Logout</a>
                  </li>
                </div>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
      <!-- End Navbar -->
    </div>
