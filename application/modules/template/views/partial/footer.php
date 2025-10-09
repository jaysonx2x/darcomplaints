

        <script src="<?= base_url('assets/vendors/jquery/jquery.min.js'); ?>"></script>
        <script src="<?= base_url('assets/vendors/jquery/bootstrap.min.js'); ?>"></script>
        <script src="<?= base_url('assets/vendors/sweetalert/js/sweetalert.min.js'); ?>"></script>
        <script src="<?= base_url('assets/vendors/toastr/toastr.min.js'); ?>"></script>
        <script src="<?= base_url('assets/js/myutils.js'); ?>"></script>

        <?php
        if (isset($module_js) && count($module_js) > 0) :
            foreach ($module_js as $val) {
                echo '<script src="' . $val . '"></script>' . PHP_EOL;
            }
        endif;
        ?>
    </body>
</html>