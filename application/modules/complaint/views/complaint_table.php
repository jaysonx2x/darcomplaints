

        <h4 class="mb-4 font-weight-bold">Complaints</h4>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">  
                        <button class="btn btn-primary" onclick="showComplaintFormModal(0);">
                            <i class="fa fa-plus-circle"></i> Add Complaint
                        </button>
                        <i></i>
                    </div>
                    <div class="table-responsive p-3">
                        <table id="complaint_table" class="table table-hover align-items-center table-flush" >
                            <thead class="thead-light" style="font-size: 10pt;">
                                <tr>
                                    <th>ID</th>
                                    <th style="width: 10%;">Control No.</th>
                                    <th style="width: 10%;">Date</th>
                                    <th style="width: 25%;">Complainant</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th style="width: 45%;">Issues / Concern / Requests</th>
                                    <th style="width: 10%;">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <?php // USER FORM MODAL ?>
        <?php $this->load->view('complaint/complaint_form_modal'); ?>
        <?php // USER FORM MODAL ?>