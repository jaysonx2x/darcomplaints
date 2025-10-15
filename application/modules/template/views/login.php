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

        <title><?php echo SYSTEM_ALIAS ?> | Login</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/login-style.css'); ?>" />
        <script type="text/javascript">
            var BASE_URL = '<?php echo base_url(); ?>';
        </script>
        <style>
            body {
                position: relative;
                background-color: #f8f9fa;
                overflow: hidden;
            }

            /* Slanted watermark with spacing between logos */
            body::before {
                content: "";
                position: fixed;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                /* combine multiple background layers to simulate spacing */
                background-image: url('<?php echo base_url("assets/img/logo.png"); ?>');
                background-repeat: repeat;
                background-size: 250px 250px; /* logo size + spacing control */
                background-position: 80px 80px; /* edge padding */
                opacity: 0.7;
                transform-origin: center;
                z-index: -1;
                pointer-events: none;
            }

            /* Add a white mask layer for readability */
            body::after {
                content: "";
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(255, 255, 255, 0.85);
                z-index: -1;
            }
        </style>
    </head>
    <body>

        <!-- Logo Bar -->
        <div class="logo-bar container bg-white">
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

        <!-- Login Form -->
        <div class="card login-card">
            <div class="form-header text-center">
                <h4 class="m-0">Login</h4>
            </div>
            <div class="card-body">
                <!-- Error Message -->
                <div id="error_msg" class="alert alert-danger hidden" style="font-size: 10pt;"></div>
                <form id="login_form">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control form-control-sm" id="username" name="username" placeholder="Enter username">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-sm" id="passw" name="passw" placeholder="Enter password">
                    </div>
                    <button type="button" onclick="validateLogin();" class="btn btn-success btn-block" style="margin-top: 30px; margin-bottom: 30px">Login</button>
                </form>
                <div class="mt-3 text-center">
                    No account yet? <a href="#">Register here.</a>
                </div>
            </div>
        </div>

        <script src="<?= base_url('assets/vendors/jquery/jquery.min.js'); ?>"></script>
        <script src="<?= base_url('assets/vendors/jquery/bootstrap.min.js'); ?>"></script>
        <script src="<?= base_url('assets/js/myutils.js'); ?>"></script>
        <script src="<?= base_url('assets/js/login.js'); ?>"></script>
    </body>
</html>
