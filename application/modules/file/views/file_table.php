

        <?php
            $title = 'Files Received';
            $is_student_user = false;
            $is_sup_user = false;
            switch (intval($this->session->userdata(SESS_USER_TYPE))) 
            {
                case USER_TYPE_STUDENT:
                    $is_student_user = true;
                    $title = 'Sent Files';
                    break;
                case USER_TYPE_SUPERVISOR:
                    $is_sup_user = true;
                    break;
            }
        ?>
        <h4 class="mb-4 font-weight-bold"><?php echo $title; ?></h4>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    
                    <?php if($is_student_user) { ?>
                        <div class="card-header">
                            <button class="btn btn-success" onclick="showFileFormModal(0);">
                                <i class="fa fa-send"></i> Send a file
                            </button>
                        </div>
                    <?php } ?>
                    
                    <div class="table-responsive p-3">
                        <table id="file_table" class="table table-hover align-items-center table-flush" >
                            <thead class="thead-light" style="font-size: 10pt;">
                                <tr>
                                    <th>ID</th>
                                    <th style="width: 15%;">Sent Date</th>
                                    <th style="width: 20%;">Title</th>
                                    <th style="width: 15%;">Sent By</th>
                                    <th style="width: 15%;">Sent To</th>
                                    <th style="width: 20%;">Remarks</th>
                                    <th style="width: 5%;" ><i class="fa fa-paperclip"></i></th>
                                    <th style="width: 10%;">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <?php $this->load->view('file/file_form_modal'); ?>
        <?php $this->load->view('file/file_details_modal'); ?>