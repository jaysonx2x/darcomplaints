

        <?php
            $is_admin_user = false;
            $is_sup_user = false;
            $is_student_user = false;
            switch (intval($this->session->userdata(SESS_USER_TYPE))) 
            {
                case USER_TYPE_ADMIN:
                    $is_admin_user = true;
                    break;
                case USER_TYPE_SUPERVISOR:
                    $is_sup_user = true;
                    break;
                case USER_TYPE_STUDENT:
                    $is_student_user = true;
                    break;
            }
        ?>

        <h4 class="mb-4 font-weight-bold">Dashboard Overview</h4>

        <?php if($is_admin_user) { ?>
            <div class="row">
                
                <div class="col-md-3 mb-4">
                    <a href="<?php echo base_url('announcements'); ?>" class="text-decoration-none text-reset">
                        <div class="card p-4 d-flex">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-bullhorn fa-2x text-success mr-3"></i>
                                <div>
                                    <h5 class="mb-1">Announcements</h5>
                                    <p class="text-muted mb-0"><?php echo (isset($announcement_count) and $announcement_count) ? $announcement_count : '0' ?> announcements</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 mb-4">
                    <a href="<?php echo base_url('complaints'); ?>" class="text-decoration-none text-reset">
                        <div class="card p-4 d-flex">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-comments fa-2x text-primary mr-3"></i>
                                <div>
                                    <h5 class="mb-1">Complaints</h5>
                                    <p class="text-muted mb-0">
                                        <?php echo (isset($complaint_count) && $complaint_count) ? $complaint_count : '0' ?> complaints
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 mb-4">
                    <a href="<?php echo base_url('feedbacks'); ?>" class="text-decoration-none text-reset">
                        <div class="card p-4 d-flex">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-list-ol fa-2x text-info mr-3"></i>
                                <div>
                                    <h5 class="mb-1">Feedbacks</h5>
                                    <p class="text-muted mb-0"><?php echo (isset($feedback_count) and $feedback_count) ? $feedback_count : '0' ?> feedbacks</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 mb-4">
                    <a href="<?php echo base_url('users'); ?>" class="text-decoration-none text-reset">
                        <div class="card p-4 d-flex">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-users fa-2x text-info mr-3"></i>
                                <div>
                                    <h5 class="mb-1">Users</h5>
                                    <p class="text-muted mb-0"><?php echo (isset($user_count) and $user_count) ? $user_count : '0' ?> users</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        <?php } ?>