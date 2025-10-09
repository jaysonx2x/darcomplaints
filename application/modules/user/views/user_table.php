

        <h4 class="mb-4 font-weight-bold">Total Users</h4>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">  
                        <button class="btn btn-primary" onclick="showUserFormModal(0);">
                            <i class="fa fa-plus-circle"></i> Add User
                        </button>
                        <i></i>
<!--                        <button class="btn btn-info" onclick="showPDFModal();" title="Print to PDF">
                            <i class="fa fa-print"></i> Print
                        </button>-->
                    </div>
                    <div class="table-responsive p-3">
                        <table id="user_table" class="table table-hover align-items-center table-flush">
                            <thead class="thead-light" style="font-size: 10pt;">
                                <tr>
                                    <th class="p-2">ID</th>
                                    <th class="p-2">Avatar</th>
                                    <th class="p-2">Username</th>
                                    <th class="p-2" style="width: 35%;">Name</th>
                                    <th class="p-2" style="width: 35%;">Email</th>
                                    <th class="p-2" style="width: 20%;">User Type</th>
                                    <th class="p-2" style="width: 10%;">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <?php // USER FORM MODAL ?>
        <?php $this->load->view('user/user_form_modal'); ?>
        <?php // USER FORM MODAL ?>