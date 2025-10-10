

        <div class="modal fade" id="complaint_form_modal" data-backdrop="static" data-keyboard="false" tabindex="-1">
            
            <div class="modal-dialog modal-lg" role="document">
                
                <div class="modal-content">
                    
                    <form id="complaint_form" method="post" action="#">
                        
                        <div class="modal-header">

                            <h5 class="modal-title">New Complaint</h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>

                        <div class="modal-body">

                            <div class="row hidden">
                                <div class="form-group col-sm-12">
                                    <input type="text" id="id" name="id" class="form-control" value="0" readonly >
                                </div>
                            </div>
                            
                            <div class="row">
                                
                                <div class="form-group input-group-sm col-md-9">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <input type="text" id="fullname" name="fullname" maxlength="100"
                                        class="form-control" placeholder="Name"  >
                                    <small class="text-danger fullname"></small>
                                </div>
                                
                                <div class="form-group input-group-sm col-md-3">
                                    <label>Date <span class="text-danger">*</span></label>
                                    <input type="date" id="complaint_date" name="complaint_date" 
                                           class="form-control" value="<?php echo fn_get_current_date('Y-m-d'); ?>" >
                                    <small class="text-danger complaint_date"></small>
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                
                                <div class="form-group input-group-sm col-md-12">
                                    <label>Address <span class="text-danger">*</span></label>
                                    <input type="text" id="address" name="address" maxlength="200"
                                        class="form-control" placeholder="Address"  >
                                    <small class="text-danger address"></small>
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                
                                <div class="form-group input-group-sm col-md-4">
                                    <label>Valid Identification Card No. <span class="text-danger">*</span></label>
                                    <input type="text" id="id_no" name="id_no" maxlength="10"
                                        class="form-control" placeholder="Valid Identification Card No."  >
                                    <small class="text-danger id_no"></small>
                                </div>
                                
                                <div class="form-group input-group-sm col-md-4">
                                    <label>Tel No. / Mobile No. <span class="text-danger">*</span></label>
                                    <input type="text" id="phone1" name="phone1" maxlength="10"
                                        class="form-control" placeholder="9xxxxxxxxx"  >
                                    <small class="text-danger phone1"></small>
                                </div>
                                <div class="form-group input-group-sm col-md-4">
                                    <label>Email Address </label>
                                    <input type="email" id="email" name="email" maxlength="60"
                                        class="form-control" placeholder="Email Address"  >
                                    <small class="text-danger email"></small>
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                
                                <div class="form-group input-group-sm col-md-12">
                                    <label>Issues / Concern / Requests <span class="text-danger">*</span></label>
                                    <textarea id="concerns" name="concerns" class="form-control"  rows="10" ></textarea>
                                    <small class="text-danger concerns"></small>
                                </div>
                                
                            </div>
                            
                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>

                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add Complaint</button>

                        </div>
                        
                    </form>
                    
                </div>
                
            </div>
            
        </div>