

        <style>
            .fileUpload {
                position: relative;
                overflow: hidden;
                margin: 10px;
            }
            .fileUpload input.upload {
                position: absolute;
                top: 0;
                right: 0;
                margin: 0;
                padding: 0;
                font-size: 20px;
                cursor: pointer;
                opacity: 0;
                filter: alpha(opacity=0);
            }
        </style>

        <div class="modal fade" id="image_cropper_modal" data-backdrop="static" data-keyboard="false" tabindex="-1">

            <div class="modal-dialog modal-lg" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title">Change Profile Picture</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>

                    <div class="modal-body pb-1">

                        <div class="row hidden">
                            <div class="form-group col-sm-12">
                                <input type="text" id="dir" name="dir" class="form-control" value="0" readonly >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">

                                <div class="fileUpload btn btn-info btn-sm">
                                    <span><i class="ti-upload"></i> Browse</span>
                                    <input type="file" class="upload" id="fileInput" onchange="peviewImage(this.files);" title="Choose your avatar" />
                                </div>

                                <span id="btnCrop" class="btn btn-success btn-sm ml-5"><i class="ti-cut"></i> Crop</span>
                                <span id="btnRestore" class="btn btn-warning btn-sm"><i class="ti-reload"></i> Reset</span>

                            </div>
                        </div>

                        <div id="CANVAS_CONTAINER" class="row">
                            <canvas id="canvas" style="min-height: 400px; max-height: 500px;">
                                Your browser does not support the HTML5 canvas element.
                            </canvas>
                        </div>

                    </div>

                </div>

            </div>

        </div>