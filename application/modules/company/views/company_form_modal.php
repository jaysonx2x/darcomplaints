

        <div class="modal fade" id="company_form_modal" data-backdrop="static" data-keyboard="false" tabindex="-1">
            
            <div class="modal-dialog" role="document">
                
                <div class="modal-content">
                    
                    <form id="company_form" method="post" action="#">
                        
                        <div class="modal-header">

                            <h5 class="modal-title">Add Company</h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>

                        <div class="modal-body p-b-0">

                            <div class="row hidden">
                                <div class="form-group col-sm-12">
                                    <input type="text" id="id" name="id" class="form-control" value="0" readonly >
                                </div>
                            </div>
                            
                            <div class="row">
                                
                                <div class="form-group input-group-sm col-md-12">
                                    <label>Company Name <span class="text-danger">*</span></label>
                                    <input type="text" id="company_name" name="company_name" maxlength="100"
                                        class="form-control" placeholder="Company Name"  >
                                    <small class="text-danger company_name"></small>
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                
                                <div class="form-group input-group-sm col-md-12">
                                    <label>Address <span class="text-danger">*</span></label>
                                    <input type="text" id="address" name="address" maxlength="100"
                                        class="form-control" placeholder="Address"  >
                                    <small class="text-danger address"></small>
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                
                                <div class="form-group input-group-sm col-md-6">
                                    <label>Phone <span class="text-danger">*</span></label>
                                    <input type="text" id="phone" name="phone" maxlength="10"
                                        class="form-control" placeholder="9xxxxxxxxx"  >
                                    <small class="text-danger phone"></small>
                                </div>
                                <div class="form-group input-group-sm col-md-6">
                                    <label>Email Address </label>
                                    <input type="email" id="email" name="email" maxlength="60"
                                        class="form-control" placeholder="Email Address"  >
                                    <small class="text-danger email"></small>
                                </div>
                                
                            </div>

                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>

                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add Company</button>

                        </div>
                        
                    </form>
                    
                </div>
                
            </div>
            
        </div>