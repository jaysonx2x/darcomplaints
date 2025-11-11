

        <div class="modal fade" id="complaint_detail_modal" data-backdrop="static" data-keyboard="false" tabindex="-1">
            
            <div class="modal-dialog modal-lg" role="document">
                
                <div class="modal-content">
                    
                    <div class="modal-header bg-danger text-white">

                        <h5 class="modal-title">New Complaint</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>

                    <div class="modal-body">

                        <h5 class="mb-3 text-success">Personal Information</h5>

                        <div class="row hidden">
                            <div class="form-group col-sm-12">
                                <input type="text" id="id" name="id" class="form-control" value="0" readonly >
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6 mt-2">
                                <label for="fullname" class="form-label">Full Name <small class="text-danger">*</small></label>
                                <input type="text" id="fullname" name="fullname" maxlength="100" class="form-control" placeholder="Enter your full fame" >
                                <small class="text-danger fullname"></small>
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="email" class="form-label">Email Address <small class="text-danger">*</small></label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email">
                                <small class="text-danger email"></small>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-12 mt-2">
                                <label for="address" class="form-label">Address <small class="text-danger">*</small></label>
                                <input type="text" id="address" name="address" maxlength="200" class="form-control" placeholder="Enter your address" >
                                <small class="text-danger address"></small>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6 mt-2">
                                <label for="id_no" class="form-label">Valid Identification Card No. <small class="text-danger">*</small></label>
                                <input type="text" id="id_no" name="id_no" maxlength="30" class="form-control" placeholder="Enter your valid ID No." >
                                <small class="text-danger id_no"></small>
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="phone1" class="form-label">Tel No. / Mobile No. <small class="text-danger">*</small></label>
                                <input type="text" id="phone1" name="phone1" maxlength="10" class="form-control" placeholder="Enter your Phone No." >
                                <small class="text-danger phone1"></small>
                            </div>
                        </div>

                        <h5 class="mb-3 mt-4 text-success">Complaint Details</h5>

                        <div class="mb-3">
                            <label for="concerns" class="form-label">Issues / Concerns / Requests</label>
                            <textarea id="concerns" name="concerns" rows="10" class="form-control" placeholder="Write your issues/concerns/requests here..."></textarea>
                            <small class="text-danger concerns"></small>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    </div>
                        
                </div>
                
            </div>
            
        </div>