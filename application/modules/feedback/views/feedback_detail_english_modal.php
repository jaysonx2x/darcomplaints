

        <style>
            .table th, .table td {
                text-align: center;
                vertical-align: middle;
            }
            .smiley {
                font-size: 20px;
            }
        </style>
        
        <div class="modal fade" id="feedback_detail_english_modal" data-backdrop="static" data-keyboard="false" tabindex="-1">
            
            <div class="modal-dialog modal-xl" role="document">
                
                <div class="modal-content">
                    
                    <div class="modal-header" style="background-color: #006400; color: white;">

                        <h5 class="modal-title">New Feedback</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>

                    <div class="modal-body">

                        <?php $this->load->view('template/partial/feedback_english', array('view_only' => true)); ?>

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

                    </div>
                        
                </div>
                
            </div>
            
        </div>