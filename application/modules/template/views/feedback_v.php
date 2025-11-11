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

        <title><?php echo SYSTEM_ALIAS ?> | Feedback </title>
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
        <div class="logo-bar container">
            <div class="d-flex align-items-center">
                <a href="<?php echo base_url(); ?>">
                    <img src="<?php echo base_url('assets/img/dar.png'); ?>" alt="Logo" style="height: 50px;">
                </a>
            </div>
            <div class="d-flex align-items-center">
                <div class="title-text">
                    Public Assistance Coordinating <br> and Complaints Unit Online System
                </div>
            </div>
        </div>

        <!-- Back Button -->
        <div class="container mt-3">
            <a href="<?php echo base_url(); ?>" class="back-btn">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div>
        
        <div class="card feedback-card mb-3">
            
            <div class="form-header text-center">
                <h4 class="m-0">Feedback Form - <?php echo (isset($lang) and $lang) ? strtoupper($lang) : 'ENGLISH'; ?></h4>
            </div>
            
            <div class="form-section" >
                <?php (isset($lang) and $lang) ? $this->load->view('template/partial/feedback_'.$lang) : $this->load->view('template/partial/feedback_english'); ?>
            </div>
        </div>
        
        <script src="<?= base_url('assets/vendors/jquery/jquery.min.js'); ?>"></script>
        <script src="<?= base_url('assets/vendors/jquery/bootstrap.min.js'); ?>"></script>
        <script src="<?= base_url('assets/vendors/toastr/toastr.min.js'); ?>"></script>
        <script src="<?= base_url('assets/vendors/jquery.validate/jquery.validate.js'); ?>"></script>
        <script src="<?= base_url('assets/js/myutils.js'); ?>"></script>
        <script src="<?= base_url('assets/js/feedback.js'); ?>"></script>

    </body>
</html>
