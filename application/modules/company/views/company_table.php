

        <h4 class="mb-4 font-weight-bold">Companies</h4>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">  
                        <button class="btn btn-primary" onclick="showCompanyFormModal(0);">
                            <i class="fa fa-plus-circle"></i> Add Company
                        </button>
                        <i></i>
                        <button class="btn btn-info" onclick="showPDFModal();" title="Print to PDF">
                            <i class="fa fa-print"></i> Print
                        </button>
                    </div>
                    <div class="table-responsive p-3">
                        <table id="company_table" class="table table-hover align-items-center table-flush" >
                            <thead class="thead-light" style="font-size: 10pt;">
                                <tr>
                                    <th>ID</th>
                                    <th style="width: 25%;">Company Name</th>
                                    <th style="width: 40%;">Address</th>
                                    <th style="width: 10%;">Phone</th>
                                    <th style="width: 15%;">Email Address</th>
                                    <th style="width: 10%;">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <?php // USER FORM MODAL ?>
        <?php $this->load->view('company/company_form_modal'); ?>
        <?php // USER FORM MODAL ?>