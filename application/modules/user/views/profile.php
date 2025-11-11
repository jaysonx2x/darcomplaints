

        <?php
            $is_isset_user = (isset($user) and $user);
        ?>

        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="card">

                    <div class="container bg-white mt-4">
                        
                        <form id="user_form" method="post" action="#">

                            <div class="row hidden">
                                <div class="col-md-2 form-group input-group-sm">
                                    <input type="text" class="form-control" id="id" name="id" readonly 
                                           value="<?php echo ($is_isset_user) ? $user['id'] : '0'; ?>">
                                </div>
                                <div class="col-md-2 form-group input-group-sm">
                                    <input type="text" class="form-control" id="profile_uri" name="profile_uri" readonly >
                                </div>
                                <div class="col-md-2 form-group input-group-sm">
                                    <input type="text" class="form-control" id="profile_url" name="profile_url" readonly >
                                </div>
                                <div class="col-md-2 form-group input-group-sm">
                                    <input type="text" class="form-control" id="old_profile_url" name="old_profile_url" readonly 
                                           value="<?php echo ($is_isset_user) ? $user['profile_url'] : ''; ?>">
                                </div>
                                <div class="col-md-2 form-group input-group-sm">
                                    <input type="text" id="IS_PASSW_EDITED" name="IS_PASSW_EDITED" class="form-control" value="0" readonly >
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="mb-4 font-weight-bold">My Profile</h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <div class="card rounded-card user-card">
                                        <div class="card-block p-r-0 p-l-0">
                                            <div class="img-hover">
                                                <div id="the_camera">
                                                    <img id="profile_picture" class="img-fluid" style="width: 80%;" src="<?php echo base_url($this->session->userdata(SESS_PROFILE_URL)); ?>" alt="round-img">
                                                </div>
                                                <div class="img-overlay">
                                                    <span s>
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-success btn-camera" 
                                                           onclick="MyUtils.fnOpenCamera(this);" title="Open Camera"><i class="fa fa-camera"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-info btn-upload" 
                                                           onclick="showLogoCropperModal('profile_url', $(this).closest('form').attr('id'));" title="Upload Picture"><i class="fa fa-upload"></i>
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="user-content mt-0">
                                                <a href="javascript:void(0);" class="btn btn-sm btn-success btn-capture hidden" 
                                                   onclick="MyUtils.fnCapturePhoto(this);" title="Capture"><i class="ti-camera"></i>
                                                    Capture
                                                </a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger btn-cancel hidden" 
                                                   onclick="MyUtils.fnCancelCamera(this)" title="Cancel"><i class="ti-close"></i>
                                                    Cancel
                                                </a>
                                                <h4 class="mt-2">Profile Picture</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="form-group input-group-sm col-md-12">
                                            <label class="control-label">First Name <small class="text-danger">*</small> </label>
                                            <input type="text" class="form-control" placeholder="First Name" id="firstname" name="firstname" maxlength="45"
                                                   value="<?php echo ($is_isset_user) ? $user['firstname'] : ''; ?>">
                                            <small class="text-danger firstname"></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group input-group-sm col-md-12">
                                            <label class="control-label">M.I.</label>
                                            <input type="text" class="form-control" placeholder="M.I." id="mi" name="mi" maxlength="1"
                                                   value="<?php echo ($is_isset_user) ? $user['mi'] : ''; ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group input-group-sm col-md-12">
                                            <label class="control-label">Last Name <small class="text-danger">*</small> </label>
                                            <input type="text" class="form-control" placeholder="Last Name" id="lastname" name="lastname" maxlength="45"
                                                   value="<?php echo ($is_isset_user) ? $user['lastname'] : ''; ?>">
                                            <small class="text-danger lastname"></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group input-group-sm col-md-6">
                                            <label class="control-label">Phone <small class="text-danger">*</small> </label>
                                            <input type="text" class="form-control" placeholder="9xxxxxxxxx" id="phone" name="phone" maxlength="10"
                                                   value="<?php echo ($is_isset_user) ? $user['phone'] : ''; ?>">
                                            <small class="text-danger phone"></small>
                                        </div>
                                        <div class="form-group input-group-sm col-md-6">
                                            <label class="control-label">Gender <small class="text-danger">*</small></label>
                                            <select class="form-control" id="gender" name="gender" >
                                                <option value="0" selected disabled>--Select--</option>
                                                <option value="1" <?php echo ($is_isset_user and intval($user['gender']) === 1) ? 'selected' : ''; ?>>Female</option>
                                                <option value="2" <?php echo ($is_isset_user and intval($user['gender']) === 2) ? 'selected' : ''; ?>>Male</option>
                                            </select>
                                            <small class="text-danger gender"></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group input-group-sm col-md-12">
                                            <label class="control-label">Email Address <small class="text-danger">*</small></label>
                                            <input type="email" class="form-control" placeholder="Email Address" id="email" name="email" maxlength="45"
                                                   value="<?php echo ($is_isset_user) ? $user['email'] : ''; ?>">
                                            <small class="text-danger email"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="form-group input-group-sm col-md-6">
                                    <label class="control-label">User Type <small class="text-danger">*</small></label>
                                    <select class="form-control" id="user_type" name="user_type" disabled >
                                        <option value="0" selected disabled>--Select--</option>
                                        <option value="1" <?php echo ($is_isset_user and intval($user['user_type']) === 1) ? 'selected' : ''; ?>>Administrator</option>
                                        <option value="2" <?php echo ($is_isset_user and intval($user['user_type']) === 2) ? 'selected' : ''; ?>>Supervisor</option>
                                        <option value="3" <?php echo ($is_isset_user and intval($user['user_type']) === 3) ? 'selected' : ''; ?>>Student</option>
                                    </select>
                                    <small class="text-danger user_type"></small>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-12">
                                    <div class="form-group" style="margin-bottom: 10px;">
                                        <span style="font-size: 12pt;" class="font-weight-bold text-dark">
                                            <i class="ti-info-alt"></i>
                                            Login Information
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group input-group-sm col-md-4">
                                    <label class="control-label">Username <small class="text-danger">*</small> </label>
                                    <input type="text" class="form-control" placeholder="Username" id="username" name="username" maxlength="45" readonly
                                           value="<?php echo ($is_isset_user) ? $user['username'] : ''; ?>">
                                    <small class="text-danger username"></small>

                                    <div id="BTN_EDIT_CONTAINER" class="form-group mt-2">
                                        <span class="btn btn-success btn-sm rounded-pill" 
                                            onclick="showHidePasswordContainer();"
                                                ><i class="fa fa-pencil"></i> Edit Password</span>
                                    </div>
                                </div>
                                <div class="form-group input-group-sm col-md-4 PASSW_CONTAINER hidden">
                                    <label style="display: block;">Password <span class="text-danger">*</span> 
                                    <span id="passw_strength" style="float: right;"></span></label>
                                    <div class="input-group input-group-sm">
                                        <input type="password" id="passw" name="passw" class="form-control" maxlength="30" onkeyup="checkPasswordStrength(this.value);" placeholder="Password" />
                                        <div class="input-group-append">
                                            <button type="button" id="btn_show_passw" class="btn btn-outline-dark" title="Show Password" onclick="showHidePassword('passw');"><i class="fa fa-eye"></i></button>
                                        </div>
                                    </div>
                                    <small class="text-danger passw"></small>
                                </div>

                                <div class="form-group input-group-sm col-md-4 PASSW_CONTAINER hidden">
                                    <label>Confirm Password <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <input type="password" id="confirm_passw" name="confirm_passw" class="form-control" maxlength="30" placeholder="Confirm Password" />
                                        <div class="input-group-append">
                                            <button type="button" id="btn_show_confirm_passw" class="btn btn-outline-dark" title="Show Password" onclick="showHidePassword('confirm_passw');"><i class="fa fa-eye"></i></button>
                                        </div>
                                    </div>
                                    <small class="text-danger confirm_passw"></small>
                                </div>

                            </div>
                            
                            <div class="row text-right">
                                <div class="form-group input-group-sm col-md-12">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Update Profile</button>
                                </div>
                            </div>
                    
                        </form>
                    
                    </div>

                </div>
            </div>
        </div>
