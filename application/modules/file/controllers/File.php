<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class File extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('file/Sent_file_model'       , 'file');
        $this->load->model('report/Attachment_model'    , 'attachment');
        $this->load->model('user/User_model'            , 'user');
    }
    
    
    public function index()
    {
        $this->data['title'] = 'Sent Files ';
        
        $this->data['content'] = 'file/file_table';
        $this->data['users'] = $this->user->get_all_order_by(array('user_type' => 3), 'fullname', 'asc');
        
        $this->data['module_css'] = array (
            base_url('assets/vendors/datatables/dataTables.bootstrap4.min.css'),
            base_url('assets/vendors/jquery.filer-1.3.0/css/jquery.filer.css'),
            base_url('assets/vendors/jquery.filer-1.3.0/css/themes/jquery.filer-dragdropbox-theme.css'),
        );
            
        $this->data['module_js'] = array (
            base_url('assets/vendors/datatables/jquery.dataTables.min.js'),
            base_url('assets/vendors/datatables/dataTables.bootstrap4.min.js'),
            base_url('assets/vendors/jquery.validate/jquery.validate.js'),
            base_url('assets/vendors/jquery.filer-1.3.0/js/jquery.filer.min.js'),
            base_url('assets/js/files.js'),
            base_url('assets/js/attachments-uploader.js'),
        );
        
        $this->template->show_template($this->data);
        
    }
    
    
    public function loadFilesDT() 
    {
        $this->file->loadDatatableFiles();
    }
    
    
    public function saveFile() 
    {
        if ($this->input->is_ajax_request()) 
        {
            $post = $this->input->post();
            $UPLOADED_FILES = $this->input->post('UPLOADED_FILES');
            
            $result['status'] = $this->file->addEditFile($post);
            if($result['status'])
            {
                if(isset($post['UPLOADED_FILES']) and count($post['UPLOADED_FILES'])>0) 
                {
                    for($i=0; $i<count($UPLOADED_FILES); $i++)
                    {
                        $url = 'assets/uploads/attachments/' . $post['attachment_type'] . '/' . $UPLOADED_FILES[$i];
                        if(!$this->attachment->isFileExists($result['status'], $url))
                        {
                            $result['detail_status'.$i] = $this->attachment->addAttachment($result['status'], array('file_url' => $url, 'attachment_type' => ATTACHMENT_TYPE_SENTFILE));
                        } else {
                            $result['detail_status'.$i] = 'exist';
                        }
                    }
                }
                
                if (intval($post['id']) === 0) 
                { 
                    // Create notification
                    $noti_data['owner_id'] = $result['status'];
                    $noti_data['noti_date'] = fn_get_current_date();
                    $noti_data['title'] = 'New Files';
                    $noti_data['message'] = $this->session->userdata(SESS_FULLNAME) . ' - ' . $post['title'];
                    $noti_data['noti_for'] = NOTI_FOR_SUPS_ADMINS;
                    $noti_data['notified_by'] = $this->session->userdata(SESS_USER_ID);
                    $noti_data['noti_type'] = NOTI_TYPE_SENTFILE;
                    $this->notification->addNotification($noti_data);
                }
                
                
            }
            
            
            echo json_encode($result);
        }
    }
    
    
    public function getFileDetails() 
    {
        if ($this->input->is_ajax_request()) 
        {
            $id = $this->input->post('id');
            
            $result['file'] = $this->file->getInfoFile(intval($id));
            $result['attachments'] = $this->attachment->getAttachmentsByOwnerID(intval($id), ATTACHMENT_TYPE_SENTFILE);
            
            echo json_encode($result);
        }
    }
    
    
    public function updateFileStatus()
    {
        if ($this->input->is_ajax_request()) 
        {
            $id = $this->input->post('id');
            $status = $this->input->post('status');
            
            $result['status'] = $this->file->update(intval($id), array('status' => intval($status)));
            
            echo json_encode($result);
        }
    }
    
    
    public function deleteFile()
    {
        if ($this->input->is_ajax_request()) 
        {
            $id = $this->input->post('id');
            
            $result['status'] = $this->file->delete(intval($id));
            
            echo json_encode($result);
        }
    }
    
    
    
    public function uploadAttachments() 
    {
        $uploader = new Uploader();
        $data = $uploader->upload($_FILES['myfiles'], array(
            'limit' => 4, //Maximum Limit of files. {null, Number}
            'maxSize' => 15, //Maximum Size of files {null, Number(in MB's)}
            'extensions' => array('pdf', 'jpg', 'png', 'jpeg', 'gif', 'doc', 'docx', 'xlsx', 'xls'), //Whitelist for file extension. {null, Array(ex: array('jpg', 'png'))}
            'required' => false, //Minimum one file is required for upload {Boolean}
            'uploadDir' => 'assets/uploads/attachments/', //Upload directory {String}
            'title' => fn_get_current_date('YmdHis') . rand(100, 999), //New file name {null, String, Array} *please read documentation in README.md
            'removeFiles' => true, //Enable file exclusion {Boolean(extra for jQuery.filer), String($_POST field name containing json data with file names)}
            'replace' => true, //Replace the file if it already exists  {Boolean}
            'perms' => null, //Uploaded file permisions {null, Number}
            'onCheck' => null, //A callback function name to be called by checking a file for errors (must return an array) | ($file) | Callback
            'onError' => null, //A callback function name to be called if an error occured (must return an array) | ($errors, $file) | Callback
            'onSuccess' => null, //A callback function name to be called if all files were successfully uploaded | ($files, $metas) | Callback
            'onUpload' => null, //A callback function name to be called if all files were successfully uploaded (must return an array) | ($file) | Callback
            'onComplete' => null, //A callback function name to be called when upload is complete | ($file) | Callback
            'onRemove' => null //A callback function name to be called by removing files (must return an array) | ($removed_files) | Callback
        ));

        // Everything for owner, read and execute for others
        chmod("assets/uploads/attachments/", 0755);

        if($data['isComplete']){
            $files = $data['data'];
            echo json_encode($files['metas'][0]['name']);
        }

        if($data['hasErrors']){
            $errors = $data['errors'];
            echo json_encode($errors);
        }

    }
    
    
    public function deleteAttachment()
    {
        if ($this->input->is_ajax_request()) 
        {
            $post = $this->input->post();
            
            $result['status'] = $this->attachment->delete(intval($post['id']));
            
            if(file_exists($post['file_url']))
            {
                unlink($post['file_url']);
            }
            
            echo json_encode($result);
        }
    }
    
    
    
}