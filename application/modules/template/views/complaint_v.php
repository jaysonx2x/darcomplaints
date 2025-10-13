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
    <body >

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
        
        <div class="card feedback-card">
            
            <div class="form-header text-center bg-danger">
                <h4 class="m-0">Complaint Form</h4>
            </div>
            
            <div class="card-body p-4">
                
                <form id="complaint_form" method="post" action="#">

                    <h5 class="mb-3 text-success">Personal Information</h5>

                    <div class="row hidden">
                        <div class="form-group col-sm-12">
                            <input type="text" id="id" name="id" class="form-control" value="0" readonly >
                        </div>
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-6 mt-2">
                            <label for="fullname" class="form-label">Full Name <small class="text-danger">*</small></label>
                            <input type="text" id="fullname" name="fullname" maxlength="100" class="form-control" placeholder="Enter your full fame" >
                            <small class="text-danger fullname"></small>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="email" class="form-label">Email Address <small class="text-danger">*</small></label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email">
                            <small class="text-danger email"></small>
                        </div>
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-12 mt-2">
                            <label for="address" class="form-label">Address <small class="text-danger">*</small></label>
                            <input type="text" id="address" name="address" maxlength="200" class="form-control" placeholder="Enter your address" >
                            <small class="text-danger address"></small>
                        </div>
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-6 mt-2">
                            <label for="id_no" class="form-label">Valid Identification Card No. <small class="text-danger">*</small></label>
                            <input type="text" id="id_no" name="id_no" maxlength="30" class="form-control" placeholder="Enter your valid ID No." >
                            <small class="text-danger id_no"></small>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="phone1" class="form-label">Tel No. / Mobile No. <small class="text-danger">*</small></label>
                            <input type="text" id="phone1" name="phone1" maxlength="10" class="form-control" placeholder="Enter your Phone No." >
                            <small class="text-danger phone1"></small>
                        </div>
                    </div>

                    <h5 class="mb-3 mt-4 text-success">Complaint Details</h5>
                    
                    <div class="mb-3">
                        <label for="concerns" class="form-label">Issues / Concerns / Requests</label>
                        <textarea id="concerns" name="concerns" rows="10" class="form-control" placeholder="Write your issues/concerns/requests here..."></textarea>
                            <small class="text-danger concerns"></small>
                    </div>

                    <!-- Submit -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-danger px-4"><i class="fa fa-send"></i> Submit Complaint</button>
                    </div>

                </form>
            </div>
        </div>

        <script src="<?= base_url('assets/vendors/jquery/jquery.min.js'); ?>"></script>
        <script src="<?= base_url('assets/vendors/jquery/bootstrap.min.js'); ?>"></script>
        <script src="<?= base_url('assets/vendors/toastr/toastr.min.js'); ?>"></script>
        <script src="<?= base_url('assets/vendors/jquery.validate/jquery.validate.js'); ?>"></script>
        <script src="<?= base_url('assets/js/myutils.js'); ?>"></script>
        <script src="<?= base_url('assets/js/complaint.js'); ?>"></script>

    </body>
</html>
