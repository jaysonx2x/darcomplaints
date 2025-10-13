<?php $this->load->view('template/partial/header'); ?>

    <?php $this->load->view('template/partial/navbar'); ?>

        <!-- Main Layout -->
        <div class="wrapper">
            
            <!-- Sidebar -->
            <?php $this->load->view('template/partial/sidebar'); ?>
            <?php /* ?>
            <div class="sidebar">
                <nav class="nav flex-column">
                    <a class="nav-link active" href="<?= base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard mr-1"></i> Dashboard</a>
                    <a class="nav-link" href="<?= base_url('admin/users'); ?>"><i class="fa fa-users mr-1"></i> Users</a>
                    <a class="nav-link" href="<?= base_url('admin/complaints'); ?>"><i class="fa fa-comments mr-1"></i> Complaints</a>
                    <a class="nav-link" href="<?= base_url('admin/reports'); ?>"><i class="fa fa-line-chart mr-1"></i> Reports</a>
                </nav>
            </div>
             */ ?>
            
            <!-- Content -->
            <div class="content">
                <input type="hidden" id="sess_user_id" readonly value="<?php echo $this->session->userdata(SESS_USER_ID); ?>" />
                <input type="hidden" id="sess_user_type" readonly value="<?php echo $this->session->userdata(SESS_USER_TYPE); ?>" />
                <?php $this->load->view($content); ?>
            </div>
            
            <?php $this->load->view('user/image_cropper_modal'); ?>
            <?php $this->load->view('user/cropped_preview_modal'); ?>
            
        </div>

<?php $this->load->view('template/partial/footer'); ?>