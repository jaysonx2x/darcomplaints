

        <h4 class="mb-4 font-weight-bold">Complaints</h4>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <button class="btn btn-info" onclick="showPDFModal('pdf/complaints');" title="Print to PDF">
                            <i class="fa fa-print"></i> Print
                        </button>
                        <div id="filter_container" class="d-flex gap-2 mx-3">
                            <button id="btn_0" class="btn btn-outline-primary rounded-pill mr-1 active" onclick="showComplaintDatatables(10, this.id);">All</button>
                            <button id="btn_1" class="btn btn-outline-primary rounded-pill mr-1" onclick="showComplaintDatatables(0, this.id);">Pending</button>
                            <button id="btn_2" class="btn btn-outline-primary rounded-pill mr-1" onclick="showComplaintDatatables(2, this.id);">Resolved</button>
                            <button id="btn_3" class="btn btn-outline-primary rounded-pill" onclick="showComplaintDatatables(3, this.id);">Rejected</button>
                        </div>
                        <i></i>
                    </div>
                    <div class="table-responsive p-3">
                        <table id="complaint_table" class="table table-hover align-items-center table-flush" >
                            <thead class="thead-light" style="font-size: 10pt;">
                                <tr>
                                    <th>ID</th>
                                    <th style="width: 10%;">Control No.</th>
                                    <th style="width: 10%;">Date</th>
                                    <th style="width: 20%;">Complainant</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th style="width: 10%;">Status</th>
                                    <th>Address By</th>
                                    <th>Address Date</th>
                                    <th style="width: 40%;">Issues / Concern / Requests</th>
                                    <th style="width: 10%;">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <?php // USER FORM MODAL ?>
        <?php $this->load->view('complaint/complaint_detail_modal'); ?>
        <?php $this->load->view('complaint/change_status_modal'); ?>
        <?php // USER FORM MODAL ?>