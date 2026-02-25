

        <h4 class="mb-4 font-weight-bold">Feedbacks</h4>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <button class="btn btn-info" onclick="showPDFModal('pdf/feedbacks');" title="Print to PDF">
                            <i class="fa fa-print"></i> Print
                        </button>
                    </div>
                    <div class="table-responsive p-3">
                        <table id="feedback_table" class="table table-hover align-items-center table-flush" >
                            <thead class="thead-light" style="font-size: 10pt;">
                                <tr>
                                    <th>ID</th>
                                    <th style="width: 10%;">Date</th>
                                    <th style="width: 15%;">Client Type</th>
                                    <th style="width: 10%;">Age Group</th>
                                    <th style="width: 15%;">Region</th>
                                    <th style="width: 15%;">Service Availed</th>
                                    <th style="width: 25%;">Suggestions</th>
                                    <th style="width: 10%;">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <?php // USER FORM MODAL ?>
        <?php $this->load->view('feedback/feedback_detail_english_modal'); ?>
        <?php $this->load->view('feedback/feedback_detail_tagalog_modal'); ?>
        <?php // USER FORM MODAL ?>