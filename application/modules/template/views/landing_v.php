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

        <title><?php echo SYSTEM_ALIAS ?> | Complaint </title>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/icons/font-awesome/css/font-awesome.min.css') ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/toastr/toastr.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/login-style.css'); ?>" />

        <script type="text/javascript">
            var BASE_URL = '<?php echo base_url(); ?>';
        </script>
        
    </head>

    <body>
        
        <!-- Logo Bar -->
        <div class="logo-bar container d-flex justify-content-between align-items-center flex-wrap py-3">
            <!-- Left: Logo and Title -->
            <div class="d-flex align-items-center flex-wrap">
                <a href="<?php echo base_url(); ?>">
                    <img src="<?php echo base_url('assets/img/dar.png'); ?>" alt="Logo" style="height: 50px;">
                </a>
                <div class="ml-3">
                    <div class="title-text">
                        <strong>Public Assistance Coordinating</strong> <br>
                        and Complaints Unit Online System
                    </div>
                </div>
            </div>

            <!-- Right: Login & Register Buttons -->
            <div class="mt-3 mt-md-0">
                <a href="<?php echo base_url('login'); ?>" class="btn btn-success btn-sm mr-2">
                    <i class="fa fa-sign-in"></i> Login
                </a>
                <?php /*
                <a href="<?php echo base_url('register'); ?>" class="btn btn-success btn-sm">
                    <i class="fa fa-user-plus"></i> Register
                </a>
                 */ ?>
            </div>
        </div>

        
        <!-- Quick Links -->
        <div class="container mt-4">
            <div class="row text-center">
                <div class="col-md-4 mb-3">
                    <div class="card p-4" style="align-items: center">
                        <img class="img img-fluid img-thumbnail mb-3" style="width: 80%;" src="<?php echo base_url('assets/img/qr-complaint.png'); ?>" />
                        <h5>File a Complaint</h5>
                        <p>Report issues or concerns about DAR services.</p>
                        <a href="<?php echo base_url('complaint'); ?>" class="btn btn-danger">File a Complaint</a>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card p-4" style="align-items: center">
                        <img class="img img-fluid img-thumbnail mb-3" style="width: 80%;" src="<?php echo base_url('assets/img/qr-english.png'); ?>" />
                        <h5>English Feedback</h5>
                        <p>Share your thoughts about our service quality.</p>
                        <!-- Button Group -->
                        <div class="d-flex flex-column flex-sm-row justify-content-center">
                            <a href="<?php echo base_url('feedback/english'); ?>" class="btn btn-success mb-2 mb-sm-0 mr-sm-2">
                                Give Feedback (English)
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card p-4" style="align-items: center">
                        <img class="img img-fluid img-thumbnail mb-3" style="width: 80%;" src="<?php echo base_url('assets/img/qr-tagalog.png'); ?>" />
                        <h5>Tagalog Feedback</h5>
                        <p>Share your thoughts about our service quality.</p>
                        <!-- Button Group -->
                        <div class="d-flex flex-column flex-sm-row justify-content-center">
                            <a href="<?php echo base_url('feedback/tagalog'); ?>" class="btn btn-success">
                                Give Feedback (Tagalog)
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php 
            $is_isset_announcements = (isset($announcements) and $announcements);
            $is_admin_user = (intval($this->session->userdata(SESS_USER_TYPE)) === 1);
        ?>
        <div class="container mt-4">

            <h4 class="mb-4 text-success"><i class="fa fa-bullhorn"></i> Latest Announcements</h4>
            
            <?php 
                if($is_isset_announcements) 
                { 
                    foreach ($announcements as $announcement)
                    {
                        $type = fn_format_announcement_type($announcement->announcement_type);
            ?>
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <!-- Title + Date + Action Buttons -->
                                <div class="d-flex justify-content-between align-items-start">
                                    <!-- Title -->
                                    <div>
                                        <h5 class="card-title mb-1"><?php echo $announcement->title; ?></h5>
                                        <span class="badge badge-<?php echo $type->clas; ?> mb-2"><?php echo $type->text; ?></span>
                                    </div>

                                        <!-- Date + Action Buttons -->
                                        <div class="d-flex align-items-center">
                                            <small class="text-muted mr-3"><?php echo fn_format_date($announcement->publish_date, 'F d, Y'); ?></small>
                                        </div>
                                </div>

                                <!-- Details -->
                                <p class="card-text text-muted mt-2" style="white-space: pre-line;"><?php echo $announcement->content; ?>
                                </p>

                                <?php if(isset($attachments[$announcement->id]) && $attachments[$announcement->id]) { ?>
                                    <div class="attachments mt-3">
                                        <strong>📎 Attachments:</strong>
                                        <div class="d-flex flex-wrap mt-2">

                                            <?php 
                                                foreach ($attachments[$announcement->id] as $attachment) {
                                                    $ext = strtolower(pathinfo($attachment->file_url, PATHINFO_EXTENSION));
                                            ?>
                                                <div class="attachment-item">
                                                    <div class="thumb">
                                                        <a target="_blank" href="<?php echo base_url($attachment->file_url); ?>">
                                                            <?php if(in_array($ext, ['jpg','jpeg','png','gif','webp'])) { ?>
                                                                <img src="<?php echo base_url($attachment->file_url); ?>" alt="Attachment">
                                                            <?php } elseif(in_array($ext, ['mp4','avi','mkv'])) { ?>
                                                                <video muted>
                                                                    <source src="<?php echo base_url($attachment->file_url); ?>" type="video/mp4">
                                                                </video>
                                                            <?php } elseif($ext === 'pdf') { ?>
                                                                <i class="fa fa-file-pdf-o fa-3x text-danger"></i>
                                                            <?php } elseif(in_array($ext, ['doc','docx'])) { ?>
                                                                <i class="fa fa-file-word-o fa-3x text-success"></i>
                                                            <?php } elseif(in_array($ext, ['xls','xlsx'])) { ?>
                                                                <i class="fa fa-file-excel-o fa-3x text-success"></i>
                                                            <?php } elseif(in_array($ext, ['zip','rar'])) { ?>
                                                                <i class="fa fa-file-archive-o fa-3x text-warning"></i>
                                                            <?php } else { ?>
                                                                <i class="fa fa-file-o fa-3x text-muted"></i>
                                                            <?php } ?>
                                                        </a>
                                                    </div>
                                                    <small title="<?php echo basename($attachment->file_url); ?>">
                                                        <?php echo basename($attachment->file_url); ?>
                                                    </small>

                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                
                                <?php } ?>
                                
                            </div>
                        </div>

                        
            <?php
                    }
                } else {
            ?>
                <div class="row text-center">
                    <small class="text-muted m-auto m-auto">No announcement yet.</small>
                </div>
            <?php
                }
            ?>

        </div>

        <!-- Footer -->
        <footer class="text-center text-muted py-3 border-top">
            <small>&copy; 2025 Department of Agrarian Reform — Public Assistance Coordinating and Complaints Unit</small>
        </footer>

        <script src="<?= base_url('assets/vendors/jquery/jquery.min.js'); ?>"></script>
        <script src="<?= base_url('assets/vendors/jquery/bootstrap.min.js'); ?>"></script>
        
    </body>
</html>
