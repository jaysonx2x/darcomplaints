        

        <div class="container my-4">
            <div class="card shadow-sm">
                <div class="card-header bg-default ">
                    <h5 class="mb-0">Notifications</h5>
                </div>
                <div class="list-group list-group-flush">
                    
                    <?php 
                        if(isset($notifications) and $notifications) 
                        {
                            foreach ($notifications as $notification) 
                            {
                    ?>
                                <a href="javascript:void(0);" onclick="showNotificationDetailModal(<?php echo $notification->id; ?>)" class="list-group-item list-group-item-action d-flex align-items-start">
                                    <div class="mr-3 ">
                                        <img src="<?php echo base_url($notification->profile_url); ?>" class="rounded-circle" style="width: 50px;" alt="Profile">
                                    </div>
                                    <div class="flex-fill">
                                        <div class="fw-bold"><?php echo $notification->title; ?></div>
                                        <small class="text-muted"><?php echo $notification->message; ?></small>
                                    </div>
                                    <small class="text-muted ms-3"><?php echo fn_time_elapsed_string($notification->noti_date); ?></small>
                                </a>
                    <?php
                            }
                        } else {
                    ?>
                            <a class="list-group-item list-group-item-action d-flex align-items-center" href="javascript:void(0);">
                                <small class="text-muted">No notifications.</small>
                            </a>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>