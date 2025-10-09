<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <!-- Favicons -->
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/ims/apple-touch-icon.png'); ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets/ims/favicon-32x32.png'); ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/ims/favicon-16x16.png'); ?>">
        <link rel="manifest" href="<?php echo base_url('assets/ims/apple-touch-icon.png'); ?>site.webmanifest">
        
        <title><?php echo SYSTEM_ALIAS ?> | Time keeper </title>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/icons/font-awesome/css/font-awesome.min.css') ?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/toastr/toastr.css'); ?>">
        
        <script type="text/javascript">
            var BASE_URL = '<?php echo base_url(); ?>';
        </script>
        
    </head>
    <body class="bg-light">
        
        <div class="topbar d-flex justify-content-between align-items-center">
            <div class="logo font-weight-bold"><a href="<?php echo base_url('main'); ?>" class="text-decoration-none text-white"><?php echo SYSTEM_TITLE; ?></a></div>

            <?php 
                if(!$this->session->userdata(SESS_USER_ID)) 
                {
            ?>
                    <!-- Login Link -->
                    <div class="d-flex align-items-center">
                        <a href="<?php echo base_url('login'); ?>" class="btn btn-primary btn-sm px-3">
                            <i class="fa fa-sign-in-alt mr-1"></i> Login
                        </a>
                    </div>
            <?php
                } else {
            ?>
            
                <div class="d-flex align-items-center">

                    <!-- Notifications Dropdown -->
                    <div class="dropdown mr-4">

                        <a href="javascript:void(0);" class="text-white position-relative dropdown-toggle no-caret" id="notifDropdown" 
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell" style="font-size: 20px;"></i>
                            <span id="noti_count" class="badge badge-danger badge-notify"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right p-0 shadow" aria-labelledby="notificationDropdown" style="width: 350px; max-height: 400px; overflow-y: auto;">

                          <!-- Header -->
                          <div class="dropdown-header bg-light d-flex justify-content-between align-items-center">
                            <span><i class="fa fa-bell"></i> Notifications</span>
                            <a href="<?php echo base_url('notifications'); ?>" class="small">View All</a>
                          </div>

                          <div class="dropdown-divider m-0"></div>

                          <div id="notifications">

                            <?php 
                                  if(isset($notifications) and $notifications) 
                                  { 
                                      foreach ($notifications as $notification)
                                      {
                              ?>
                                  <a class="dropdown-item d-flex align-items-start" href="javascript:void(0);" onclick="showNotificationDetailModal(<?php echo $notification->id; ?>)">
                                      <div class="mr-3">
                                          <i class="fa fa-envelope text-primary"></i>
                                      </div>
                                      <div class="flex-grow-1">
                                          <div class="font-weight-bold"><?php echo $notification->title; ?></div>
                                          <small class="text-muted d-block text-truncate" style="max-width: 250px;">
                                              <?php echo $notification->message; ?>
                                          </small>
                                          <small class="text-muted"><?php echo $notification->noti_date; ?></small>
                                      </div>
                                  </a>
                                  <div class="dropdown-divider m-0"></div>
                              <?php
                                      }
                                  } else {
                              ?>
                                      <a class="dropdown-item d-flex align-items-start" href="javascript:void(0);" >
                                          <div class="mr-3">
                                              <i ></i>
                                          </div>
                                          <div class="flex-grow-1 text-center">
                                              <small class="text-muted d-block text-truncate p-1" style="max-width: 250px;">
                                                  No notifications.
                                              </small>
                                          </div>
                                      </a>
                              <?php
                                  }
                              ?>

                            </div>

                        </div>
                      </div>

                    <div class="dropdown user">
                        <a class="dropdown-toggle text-white d-flex align-items-center" href="#" role="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span>Hello, <?php echo $this->session->userdata(SESS_USERNAME); ?></span>
                            <img src="<?php echo base_url($this->session->userdata(SESS_PROFILE_URL)); ?>" 
                                 alt="Profile Picture" 
                                 class="ml-2 rounded-circle user-avatar" 
                                 style="width: 30px; height: 30px; object-fit: cover;">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?php echo base_url('my-profile'); ?>"><i class="fa fa-user mr-2"></i> Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="<?php echo base_url('auth/logout'); ?>"><i class="fa fa-sign-out mr-2"></i> Logout</a>
                        </div>
                    </div>
                </div>  
                    
            <?php } ?>
            
        </div>
        
        <div class="container py-5">
            <div class="row mt-5 justify-content-center">
                <div class="col-md-8">

                    <!-- Attendance Card -->
                    <div class="card text-center">
                        <div class="card-header bg-primary text-white">
                            <h4><i class="fa fa-fingerprint"></i> Attendance Last Log </h4>
                        </div>

                        <div class="card-body">
                            <!-- User Info -->
                            <div class="mb-5">
                                <img id="last_avatar" src="<?php echo base_url('assets/img/no-image.png'); ?>" class="rounded-circle border border-primary mb-2" style="width: 100px;" alt="User Photo">
                                <h5 id="last_name">---</h5>
                                <p class="text-muted">ID No.: <span id="last_id_no">---</span></p>
                                <p class="text-muted">Log Time: <span id="last_log_time">---</span></p>
                                <p class="text-muted"><span id="last_status">---</span></p>
                            </div>

                            <!-- Time Display -->
                            <div class="mb-5">
                                <div class="time-display" id="currentTime">--:--:--</div>
                                <small id="currentDate" class="text-muted mb-0">---</small>
                            </div>

                            <!-- Status Display -->
                            <div class="mb-3">
                                <span id="attendanceStatus" class="badge badge-pill badge-primary status">Waiting for scan...</span>
                            </div>

                            <!-- Scan Instruction -->
                            <p class="text-muted"><i class="fa fa-hand-point-up"></i> Please place your finger on the scanner</p>
                        </div>

                        <div class="card-footer text-muted">
                            <?php echo SYSTEM_TITLE; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('attendance/punch_result_modal'); ?>
        
        <script src="<?= base_url('assets/vendors/jquery/jquery.min.js'); ?>"></script>
        <script src="<?= base_url('assets/vendors/jquery/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/vendors/signal.r/signalr.min.js'); ?>"></script>
        <script src="<?= base_url('assets/vendors/toastr/toastr.min.js'); ?>"></script>
        <script src="<?= base_url('assets/js/myutils.js'); ?>"></script>
        <script src="<?php echo base_url(); ?>assets/js/timekeeper.js"></script>

    </body>
</html>
