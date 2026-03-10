        

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
                        <span class="badge badge-danger position-absolute notification-badge" id="notificationCount" style="top: 0; right: 4px; font-size: 0.7rem; display: none;">0</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="notifDropdown" style="width: 350px; max-height: 500px; overflow-y: auto;">
                        <h6 class="dropdown-header d-flex justify-content-between align-items-center">
                            <span>Notifications</span>
                            <small class="text-muted" id="unreadCount">0 unread</small>
                        </h6>
                        <div id="notificationList">
                            <div class="text-center py-3">
                                <i class="fa fa-spinner fa-spin"></i> Loading...
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-center small text-primary" href="<?= base_url('notification'); ?>">
                            <i class="fa fa-list"></i> View all notifications
                        </a>
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
                        <a class="dropdown-item" href="<?= base_url('my-profile'); ?>"><i class="fa fa-user-circle"></i> My Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="<?= base_url('auth/logout'); ?>"><i class="fa fa-sign-out"></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notification Detail Modal -->
        <div class="modal fade" id="notificationDetailModal" tabindex="-1" role="dialog" aria-labelledby="notificationDetailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header notification-modal-header">
                        <h5 class="modal-title" id="notificationDetailModalLabel">
                            <i class="fa fa-bell mr-2"></i> Notification Details
                        </h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="notificationDetailContent">
                        <div class="text-center py-5">
                            <i class="fa fa-spinner fa-spin fa-3x text-muted"></i>
                            <p class="mt-3 text-muted">Loading notification details...</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            <i class="fa fa-times"></i> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>