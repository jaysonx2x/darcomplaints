<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user/User_model'        , 'user');
    }
    
    
    public function index()
    {
        $this->data['title'] = 'Users';
        
        $this->data['content'] = 'user/user_table';
        
        $this->data['user'] = (array) $this->user->get(intval($this->session->userdata(SESS_USER_ID)));
        
        $this->data['module_css'] = array (
            base_url('assets/vendors/datatables/dataTables.bootstrap4.min.css'),
            base_url('assets/vendors/cropperjs/cropper.css'),
        );
            
        $this->data['module_js'] = array (
            base_url('assets/vendors/datatables/jquery.dataTables.min.js'),
            base_url('assets/vendors/datatables/dataTables.bootstrap4.min.js'),
            base_url('assets/vendors/jquery.validate/jquery.validate.js'),
            base_url('assets/vendors/cropperjs/cropper.js'),
            base_url('assets/vendors/cropperjs/jquery-cropper.js'),
            base_url('assets/vendors/webcamjs/webcam.min.js'),
            base_url('assets/js/picture-cropper.js'),
            base_url('assets/js/users.js'),
        );
        
        $this->template->show_template($this->data);
        
    }
    
    
    public function profile()
    {
        $this->data['title'] = 'My Profile';
        
        $this->data['content'] = 'user/profile';
        
        $this->data['user'] = (array) $this->user->get(intval($this->session->userdata(SESS_USER_ID)));
        $this->data['companies'] = $this->company->get_all_order_by(array(), 'company_name', 'asc');
        
        $this->data['module_css'] = array (
            base_url('assets/vendors/cropperjs/cropper.css'),
        );
            
        $this->data['module_js'] = array (
            base_url('assets/vendors/jquery.validate/jquery.validate.js'),
            base_url('assets/vendors/cropperjs/cropper.js'),
            base_url('assets/vendors/cropperjs/jquery-cropper.js'),
            base_url('assets/vendors/webcamjs/webcam.min.js'),
            base_url('assets/js/picture-cropper.js'),
            base_url('assets/js/my-profile.js'),
        );
        
        $this->template->show_template($this->data);
        
    }
    
    
    public function saveUser() 
    {
        if ($this->input->is_ajax_request()) 
        {
            $post = $this->input->post();
            
            $result['status'] = FALSE;
            $result['errors'] = '';
            
            $username_exist = $this->user->checkUsernameExist($post['username']);
            
            if(intval($post['id'])>0) // EDIT
            {
                $old_user_data = (array) $this->user->get(intval($post['id']));
                if($old_user_data)
                {
                    // The admin did not change the user id of the user
                    if(trim($old_user_data['username']) === trim($post['username']))
                    {
                        $result['status'] = $this->_saveUser($post);
                        
                    } else { // The admin changed the user id of the user, check the user id again
                        
                        if(intval($username_exist) === 0) // Username DONT EXIST
                        {
                            $result['status'] = $this->_saveUser($post);

                        } else {

                            $result['errors'] = 'Username is already taken.';

                        }
                        
                    }
                    
                }

            } else { // ADD
                
                if(intval($username_exist) === 0) // Username DONT EXIST
                {
                    $result['status'] = $this->_saveUser($post);

                } else {
                    
                    $result['errors'] = 'Username is already taken.';
                    
                }

            }
            
            echo json_encode($result);
        }
        
    }
    
    
    private function _saveUser($post=array())
    {
        // Upload profile piicture
        if(array_key_exists('profile_uri', $post) and strlen($post['profile_uri'])>0)
        {
            $folderPath = "assets/uploads/avatars/";

            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

            $image_parts = explode(";base64,", $post['profile_uri']);

            $image_type_aux = explode($folderPath, $image_parts[0]);

            $image_base64 = base64_decode($image_parts[1]);

            $name = uniqid() . '.png';

            $file = $folderPath . $name;

            $post['profile_url'] = (file_put_contents($file, $image_base64)) ? $file : '';
        }

        return $this->user->addEditUser($post);
    }
    
    
    public function loadUsersDT() 
    {
        $this->user->loadDatatableUsers();
    }
    
    
    public function getUserDetails() 
    {
        if ($this->input->is_ajax_request()) 
        {
            $id = $this->input->post('id');
            
            $result['user'] = $this->user->get(intval($id));
            
            echo json_encode($result);
        }
    }
    
    
    public function deleteUser() 
    {
        if ($this->input->is_ajax_request()) 
        {
            $id = $this->input->post('id');
            
            $result['status'] = $this->user->delete(intval($id));
            
            echo json_encode($result);
        }
    }
    
    
    
    public function pdfUsers() 
    {
        $this->load->helper('pdf_helper');
        
        $data['status']  = false;
        $data['report_title']   = 'USERS';
        $data['output_title']   = 'USERS';
        $data['is_landscape_orientation'] = false;
        
        $data['reports'] = (array) $this->user->getAllUsers();
        if($data['reports'])
        {
            $data['status'] = true;

        }
        $data['view_url'] = 'pdfs/partial/users';

        $this->load->view('pdfs/index', $data);
            
    }
    
}