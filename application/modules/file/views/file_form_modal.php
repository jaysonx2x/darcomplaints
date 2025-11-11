

        <div class="modal fade" id="file_form_modal" data-backdrop="static" data-keyboard="false" tabindex="-1">
            
            <div class="modal-dialog" role="document">
                
                <div class="modal-content">
                    
                    <form id="file_form" method="post" action="#">
                        
                        <div class="modal-header">

                            <h5 class="modal-title">Assign Report</h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>

                        <div class="modal-body pb-0">

                            <div class="row hidden">
                                <div class="form-group col-sm-12">
                                    <input type="text" id="id" name="id" class="form-control" value="0" readonly >
                                </div>
                            </div>
                            
                            <div class="row">
                                
                                <div class="form-group input-group-sm col-md-12">
                                    <label>Title <span class="text-danger">*</span></label>
                                    <input type="text" id="title" name="title" maxlength="100"
                                        class="form-control" placeholder="Title"  >
                                    <small class="text-danger title"></small>
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                
                                <div class="form-group input-group-sm col-md-12">
                                    <label class="control-label">Sent to <small class="text-danger">*</small></label>
                                    <select class="form-control" id="sent_to" name="sent_to" >
                                        <option value="0" selected disabled>--Select--</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Supervisor</option>
                                    </select>
                                    <small class="text-danger sent_to"></small>
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                
                                <div class="form-group input-group-sm col-md-12">
                                    <label>Remarks </label>
                                    <textarea id="remarks" name="remarks" class="form-control" rows="6" placeholder="Remarks" maxlength="2000"></textarea>
                                </div>
                                
                            </div>

                        </div>
                        
                        <div class="modal-body pt-0">
                            
                            <div id="uploader_container" class="row">
                                
                                <div class="form-group input-group-sm col-md-12 mb-0">
                                    <label>Attachments <small>(pdf, jpg, png, jpeg, gif, doc, docx, xlsx, xls)</small></label>
                                    <input type="file" name="myfiles[]" id="filer_input2" multiple="multiple">
                                </div>
                                
                            </div>  
                                
                            <div id="images_container" class="row hidden">
                                
                                <div class="form-group col-md-12 mb-0">
                                    <label>These are the attachment/s uploaded for this sent files.</label>
                                </div>
                                <div id="images" class="col-md-12"></div>
                                
                            </div>  
                            
                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>

                            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Add Report</button>

                        </div>
                        
                    </form>
                    
                </div>
                
            </div>
            
        </div>