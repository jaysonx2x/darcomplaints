

        <?php
            $title = 'Reports Submitted';
            $is_student_user = false;
            $is_sup_user = false;
            switch (intval($this->session->userdata(SESS_USER_TYPE))) 
            {
                case USER_TYPE_STUDENT:
                    $is_student_user = true;
                    $title = 'My Reports';
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
                    
                    <div class="card-header d-flex justify-content-between align-items-center">  
                        <?php if($is_student_user) { ?>
                            <button class="btn btn-success" onclick="showReportFormModal(0);">
                                <i class="fa fa-plus-circle"></i> Add Report
                            </button>
                        <?php } ?>
                        <i></i>
                        <button class="btn btn-info" onclick="showPDFModal();" title="Print to PDF">
                            <i class="fa fa-print"></i> Print
                        </button>
                    </div>
                    
                    <div class="table-responsive p-3">
                        <table id="report_table" class="table table-hover align-items-center table-flush" >
                            <thead class="thead-light" style="font-size: 10pt;">
                                <tr>
                                    <th>ID</th>
                                    <th style="width: 15%;">Submitted Date</th>
                                    <th style="width: 20%;">Title</th>
                                    <th style="width: 10%;">Status</th>
                                    <th style="width: 15%;">Submitted By</th>
                                    <th style="width: 20%;">Remarks</th>
                                    <th style="width: 10%;" ><i class="fa fa-paperclip"></i></th>
                                    <th style="width: 10%;">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <?php $this->load->view('report/report_form_modal'); ?>