        

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
                                $icon = '';
                                switch(intval($notification->noti_type)) {
                                    case NOTI_TYPE_ANNOUNCEMENT: // NOTI_TYPE_ANNOUNCEMENT
                                        $icon = 'fa fa-bullhorn text-info'; break;
                                    case NOTI_TYPE_COMPLAINT: // NOTI_TYPE_COMPLAINT
                                        $icon = 'fa fa-exclamation-circle text-danger'; break;
                                    case NOTI_TYPE_FEEDBACK: // NOTI_TYPE_FEEDBACK
                                        $icon = 'fa fa-comment text-success'; break;
                                    default:
                                        $icon = 'fa fa-bell text-secondary'; break;
                                }
                    ?>
                                <a href="javascript:void(0);" onclick="handleNotificationClick(event, <?php echo $notification->id; ?>, <?php echo $notification->noti_type; ?>, <?php echo $notification->owner_id; ?>)" class="list-group-item list-group-item-action d-flex align-items-start">
                                    <div class="mr-3 ">
                                        <i class="<?php echo $icon ?> mt-1 mr-2"></i>
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