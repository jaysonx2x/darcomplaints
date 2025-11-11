

        <style>
            div.gallery {
                margin: 5px;
                border: 1px solid #ccc;
                float: left;
                width: 180px;
                padding: 2px;
            }

            div.gallery:hover {
                border: 1px solid #394eea;
            }

            div.gallery img {
                width: 100%;
                height: auto;
            }

            div.desc {
                padding: 15px;
                text-align: center;
            }
        </style>
        
        <div class="modal fade" id="report_form_modal" data-backdrop="static" data-keyboard="false" tabindex="-1">
            
            <div class="modal-dialog" role="document">
                
                <div class="modal-content">
                    
                    <form id="report_form" method="post" action="#">
                        
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
                                
                                <div class="form-group input-group-sm col-md-6"></div>
                                <div class="form-group input-group-sm col-md-6">
                                    <label>Date <span class="text-danger">*</span></label>
                                    <input type="date" id="submitted_date" name="submitted_date" class="form-control" value="<?php echo fn_get_current_date('Y-m-d'); ?>">
                                    <small class="text-danger submitted_date"></small>
                                </div>
<!--                                <div class="form-group input-group-sm col-md-4">
                                    <label>Deadline</label>
                                    <input type="date" id="deadline" name="deadline" class="form-control" >
                                    <small class="text-danger deadline"></small>
                                </div>-->
                                
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
                                    <label>Submitted by </label>
                                    <input type="text" id="submitted_by" name="submitted_by" readonly
                                           class="form-control" placeholder="Submitted by" value="<?php echo $this->session->userdata(SESS_FULLNAME); ?>" >
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                
                                <div class="form-group input-group-sm col-md-12">
                                    <label>Remarks </label>
                                    <textarea id="notes" name="notes" class="form-control" rows="6" placeholder="Remarks" maxlength="200"></textarea>
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
                                    <label>These are the attachment/s uploaded for this report.</label>
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