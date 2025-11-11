

        <?php 
            $is_isset_announcements = (isset($announcements) and $announcements);
            $is_admin_user = (intval($this->session->userdata(SESS_USER_TYPE)) === 1);
        ?>
        <div class="container mt-2">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-2">Announcements</h3>
                <?php if($is_admin_user) { ?>
                    <div>
                        <button class="btn btn-success " onclick="showAnnouncementFormModal(0);">
                            <i class="fa fa-plus-circle"></i> New Announcement
                        </button>
                    </div>
                <?php } ?>
            </div>
            
            <?php 
                if($is_isset_announcements) 
                { 
                    foreach ($announcements as $announcement)
                    {
                        $type = fn_format_announcement_type($announcement->announcement_type);
            ?>
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <!-- Title + Date + Action Buttons -->
                                <div class="d-flex justify-content-between align-items-start">
                                    <!-- Title -->
                                    <div>
                                        <h5 class="card-title mb-1"><?php echo $announcement->title; ?></h5>
                                        <span class="badge badge-<?php echo $type->clas; ?> mb-2"><?php echo $type->text; ?></span>
                                    </div>

                                        <!-- Date + Action Buttons -->
                                        <div class="d-flex align-items-center">
                                            <small class="text-muted mr-3"><?php echo fn_format_date($announcement->publish_date, 'F d, Y'); ?></small>
                                            <?php if($is_admin_user) { ?>
                                                <button class="btn btn-sm btn-success mr-1" 
                                                        onclick="showAnnouncementFormModal(<?php echo $announcement->id; ?>)">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger " 
                                                        onclick="confirmDeleteAnnouncement(<?php echo $announcement->id; ?>)">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            <?php } ?>
                                        </div>
                                </div>

                                <!-- Details -->
                                <p class="card-text text-muted mt-2" style="white-space: pre-line;"><?php echo $announcement->content; ?>
                                </p>

                                <?php if(isset($attachments[$announcement->id]) && $attachments[$announcement->id]) { ?>
                                    <div class="attachments mt-3">
                                        <strong>📎 Attachments:</strong>
                                        <div class="d-flex flex-wrap mt-2">

                                            <?php 
                                                foreach ($attachments[$announcement->id] as $attachment) {
                                                    $ext = strtolower(pathinfo($attachment->file_url, PATHINFO_EXTENSION));
                                            ?>
                                                <div class="attachment-item">
                                                    <div class="thumb">
                                                        <a target="_blank" href="<?php echo base_url($attachment->file_url); ?>">
                                                            <?php if(in_array($ext, ['jpg','jpeg','png','gif','webp'])) { ?>
                                                                <img src="<?php echo base_url($attachment->file_url); ?>" alt="Attachment">
                                                            <?php } elseif(in_array($ext, ['mp4','avi','mkv'])) { ?>
                                                                <video muted>
                                                                    <source src="<?php echo base_url($attachment->file_url); ?>" type="video/mp4">
                                                                </video>
                                                            <?php } elseif($ext === 'pdf') { ?>
                                                                <i class="fa fa-file-pdf-o fa-3x text-danger"></i>
                                                            <?php } elseif(in_array($ext, ['doc','docx'])) { ?>
                                                                <i class="fa fa-file-word-o fa-3x text-success"></i>
                                                            <?php } elseif(in_array($ext, ['xls','xlsx'])) { ?>
                                                                <i class="fa fa-file-excel-o fa-3x text-success"></i>
                                                            <?php } elseif(in_array($ext, ['zip','rar'])) { ?>
                                                                <i class="fa fa-file-archive-o fa-3x text-warning"></i>
                                                            <?php } else { ?>
                                                                <i class="fa fa-file-o fa-3x text-muted"></i>
                                                            <?php } ?>
                                                        </a>
                                                    </div>
                                                    <small title="<?php echo basename($attachment->file_url); ?>">
                                                        <?php echo basename($attachment->file_url); ?>
                                                    </small>

                                                    <?php if($is_admin_user) { ?>
                                                        <!-- Delete button -->
                                                        <button class="delete-btn btn btn-sm btn-danger rounded-pill" 
                                                            onclick="confirmDeleteAnnouncementAttachment('<?php echo $attachment->file_url; ?>', <?php echo $attachment->id; ?>);">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    <?php } ?>

                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                
                                <?php } ?>
                                
                            </div>
                        </div>

                        
            <?php
                    }
                } else {
            ?>
            <div class="row text-center">
                
                    <small class="text-muted m-auto m-auto">No announcement yet.</small>
            </div>
            <?php
                }
            ?>

        </div>

        <?php $this->load->view('announcement/announcement_form_modal'); ?>