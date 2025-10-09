


        <style>
            div.gallery {
            position: relative;
            margin: 10px;
            border-radius: 10px;
            overflow: hidden;
            width: 200px;
            background: #fff;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            float: left;
            cursor: pointer;
        }

        /* Hover effect */
        div.gallery:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.25);
            border-color: transparent;
        }

        div.gallery img,
        div.gallery video {
            width: 100%;
            height: 140px;
            object-fit: cover;
            display: block;
            border-bottom: 1px solid #eee;
        }

        div.desc {
            padding: 10px;
            text-align: center;
            font-size: 14px;
            color: #333;
            background: #f9f9f9;
        }

        /* Delete button */
        .delete-btn {
            position: absolute;
            top: 8px;
            right: 8px;
            display: none;
            padding: 5px 8px;
            font-size: 12px;
            border-radius: 50%;
            line-height: 1;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        }

        /* Show delete button on hover */
        div.gallery:hover .delete-btn {
            display: inline-block;
            animation: fadeIn 0.2s ease;
        }

        /* Fade in animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }
        </style>
        
        <div class="modal fade" id="announcement_form_modal" data-backdrop="static" data-keyboard="false" tabindex="-1">
            
            <div class="modal-dialog" role="document">
                
                <div class="modal-content">
                    
                    <form id="announcement_form" method="post" action="#">
                        
                        <div class="modal-header">

                            <h5 class="modal-title">New Announcement</h5>

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
                                
                                <div class="form-group input-group-sm col-md-8">
                                    <label>Announcement for <span class="text-danger">*</span></label>
                                    <select id="announcement_type" name="announcement_type" class="form-control">
                                        <option value="0" disabled selected>-Select-</option>
                                        <option value="1">ALL</option>
                                        <option value="2">STUDENTS ONLY</option>
                                        <option value="3">SUPERVISORS ONLY</option>
                                    </select>
                                    <span class="text-danger announcement_type"></span>
                                </div>
                                
                                <div class="form-group input-group-sm col-md-4">
                                    <label>Date <span class="text-danger">*</span></label>
                                    <input type="date" id="publish_date" name="publish_date" maxlength="100"
                                        class="form-control" value="<?php echo fn_get_current_date('Y-m-d'); ?>" >
                                    <span class="text-danger publish_date"></span>
                                </div>
                                
                            </div>

                            <div class="row">
                                
                                <div id="title_container" class="form-group input-group-sm col-md-12">
                                    <label>Title <span class="text-danger">*</span></label>
                                    <input type="text" id="title" name="title" maxlength="100"
                                        class="form-control" placeholder="Enter Title"  >
                                    <span class="text-danger title"></span>
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                
                                <div class="form-group input-group-sm col-md-12 mb-0">
                                    <label id="content_label">Content <span class="text-danger">*</span></label>
                                    <textarea id="content" name="content" class="form-control" rows="6" placeholder="Enter Content"></textarea>
                                    <span class="text-danger content"></span>
                                </div>
                                
                            </div>
                                
                            <hr>
                            
                            <div id="uploader_container" class="row">
                                
                                <div class="form-group input-group-sm col-md-12">
                                    <input type="file" name="myfiles[]" id="filer_input2" multiple="multiple">
                                </div>
                                
                            </div>  
                                
                            <div id="images_container" class="row hidden">
                                
                                <div class="form-group col-md-12 mb-0">
                                    <label>These are the attachment/s uploaded for this announcement.</label>
                                </div>
                                <div id="images" class="col-md-12"></div>
                                
                            </div>  
                            
                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>

                            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>

                        </div>
                        
                    </form>
                    
                </div>
                
            </div>
            
        </div>