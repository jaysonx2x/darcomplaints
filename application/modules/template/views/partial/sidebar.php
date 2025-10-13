

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
            $route_class = $this->router->fetch_class();
            $route_method = $this->router->fetch_class() . '/' . $this->router->fetch_method();
        ?>

        <div class="sidebar">
            
            <a href="<?php echo base_url('main'); ?>" 
               class="nav-link <?php echo $route_method == 'main/index' ? 'active' : ''; ?>">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
            
            <a href="<?php echo base_url('announcements'); ?>" 
                class="nav-link <?php echo $route_method == 'announcements/index' ? 'active' : ''; ?>">
                 <i class="fa fa-bullhorn"></i> Announcements
            </a>

            <?php if($is_admin_user) { ?>
            
                <a href="<?php echo base_url('complaints'); ?>" 
                   class="nav-link <?php echo $route_method == 'complaints/index' ? 'active' : ''; ?>">
                    <i class="fa fa-exclamation-circle"></i> Complaints
                </a>
            
                <a href="<?php echo base_url('feedbacks'); ?>" 
                   class="nav-link <?php echo $route_method == 'feedbacks/index' ? 'active' : ''; ?>">
                    <i class="fa fa-feed"></i> Feedbacks
                </a>
            
                <a href="<?php echo base_url('users'); ?>" 
                   class="nav-link <?php echo $route_method == 'users/index' ? 'active' : ''; ?>">
                    <i class="fa fa-users"></i> Users
                </a>

            <?php } ?>
            
            <a href="<?php echo base_url('auth/logout'); ?>" class="nav-link"><i class="fa fa-sign-out"></i> Logout </a>
            
        </div>