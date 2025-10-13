        

        <div class="logo-bar container-fluid">
            
            <div class="left-section d-flex align-items-center flex-wrap">
                <a href="<?= base_url(); ?>" class="d-flex align-items-center text-decoration-none">
                    <img src="<?php echo base_url('assets/img/dar.png'); ?>" alt="Logo" class="mr-2">
                    <div class="title-text text-dark">
                        Public Assistance Coordinating and Complaints Unit Online System
                    </div>
                </a>
            </div>

            <!-- Right Section: Notifications + User Profile -->
            <div class="right-section d-flex align-items-center">

                <!-- Notifications -->
                <div class="dropdown mr-3">
                    <a href="#" class="nav-link position-relative" id="notifDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell fa-lg text-dark"></i>
                        <span class="badge badge-danger position-absolute" style="top: 0; right: 4px; font-size: 0.7rem;">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="notifDropdown" style="width: 300px;">
                        <h6 class="dropdown-header">Notifications</h6>
                        <a class="dropdown-item" href="#">New complaint received</a>
                        <a class="dropdown-item" href="#">System update scheduled</a>
                        <a class="dropdown-item" href="#">User John updated his profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-center small text-muted" href="#">View all</a>
                    </div>
                </div>

                <!-- User Profile -->
                <div class="dropdown d-flex align-items-center">
                    <span class="mr-2">Welcome, <?php echo $this->session->userdata(SESS_USERNAME); ?>!</span>
                    <a href="#" class="d-flex align-items-center ml-2 mr-2" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo base_url($this->session->userdata(SESS_PROFILE_URL)); ?>" 
                             alt="Profile Picture" 
                             class="ml-2 user-avatar">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?= base_url('my-profile'); ?>">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="<?= base_url('auth/logout'); ?>">Logout</a>
                    </div>
                </div>
            </div>
        </div>