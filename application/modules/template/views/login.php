<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/login-style.css'); ?>" />
        <script type="text/javascript">
            var BASE_URL = '<?php echo base_url(); ?>';
        </script>
    </head>
    <body>

        <!-- Logo Bar -->
        <div class="logo-bar container">
            <div class="d-flex align-items-center">
                <img src="<?php echo base_url('assets/img/dar.png'); ?>" alt="Logo">
            </div>
            <div class="d-flex align-items-center">
                <div class="title-text">
                    Public Assistance Coordinating <br> and Complaints Unit Online System
                </div>
            </div>
        </div>

        <!-- Login Form -->
        <div class="card login-card p-4">
            <div class="card-body">
                <h4 class="text-center mb-4">Login</h4>
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
                    <button type="button" onclick="validateLogin();" class="btn btn-primary btn-block" style="margin-top: 30px; margin-bottom: 30px">Login</button>
                </form>
                <div class="mt-3 text-center">
                    No account yet? <a href="#">Register here.</a>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="<?= base_url('assets/vendors/jquery/bootstrap.min.js'); ?>"></script>
        <script src="<?= base_url('assets/js/myutils.js'); ?>"></script>
        <script src="<?= base_url('assets/js/login.js'); ?>"></script>
    </body>
</html>
