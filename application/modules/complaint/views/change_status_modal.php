

        <div class="modal fade" id="change_status_modal" data-backdrop="static" data-keyboard="false" tabindex="-1">
            
            <div class="modal-dialog" role="document">
                    
                <div class="modal-content">
                    
                    <form id="change_status_form" method="post" action="#">

                        <div class="modal-header">

                            <h5 class="modal-title">Change Status</h5>

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

                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="status" class="form-label">Status <small class="text-danger">*</small></label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="" disabled selected>-Select-</option>
                                        <option value="0">Pending</option>
                                        <!--<option value="1">In-progress</option>-->
                                        <option value="2">Resolved</option>
                                        <option value="3">Rejected</option>
                                    </select>
                                    <small class="text-danger status text-sm-left"></small>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="addressed_by" class="form-label">Addressed By <small class="text-danger">*</small></label>
                                    <input type="text" id="addressed_by" name="addressed_by" class="form-control" placeholder="Addressed By">
                                    <small class="text-danger addressed_by"></small>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="addressed_date" class="form-label">Addressed Date <small class="text-danger">*</small></label>
                                    <input type="date" id="addressed_date" name="addressed_date" class="form-control" >
                                    <small class="text-danger addressed_date"></small>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                            
                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
                            
                        </div>

                    </form>
                    
                </div>
                
            </div>
            
        </div>