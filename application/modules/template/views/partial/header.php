<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <!-- Favicons -->
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/ims/apple-touch-icon.png'); ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets/ims/favicon-32x32.png'); ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/ims/favicon-16x16.png'); ?>">
        <link rel="manifest" href="<?php echo base_url('assets/ims/apple-touch-icon.png'); ?>site.webmanifest">
        
        <title><?php echo SYSTEM_ALIAS ?> | <?php echo (isset($title) and $title) ? $title : ''; ?></title>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/icons/font-awesome/css/font-awesome.min.css') ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/toastr/toastr.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/sweetalert/css/sweetalert.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/admin-style.css'); ?>" />
        
        <?php 
            if(isset($module_css) AND count($module_css) > 0) :
                foreach ($module_css as $key => $val) {
                    echo '<link href="' . $val . '" rel="stylesheet" media="all">' . PHP_EOL;
                }
            endif; 
        ?>
        
        <script type="text/javascript">
            var BASE_URL = '<?php echo base_url(); ?>';
        </script>
        
    </head>
    <body>