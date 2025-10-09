<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('report/Report_model'        , 'report');
        $this->load->model('report/Attachment_model'    , 'attachment');
        $this->load->model('user/User_model'            , 'user');
    }
    
    
    public function index()
    {
        $this->data['title'] = 'Reports Submitted';
        
        $this->data['content'] = 'report/report_table';
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
            base_url('assets/js/reports.js'),
            base_url('assets/js/attachments-uploader.js'),
        );
        
        $this->template->show_template($this->data);
        
    }
    
    
    public function loadReportsDT() 
    {
        $this->report->loadDatatableReports();
    }
    
    
    public function saveReport() 
    {
        if ($this->input->is_ajax_request()) 
        {
            $post = $this->input->post();
            $UPLOADED_FILES = $this->input->post('UPLOADED_FILES');
            
            $result['status'] = $this->report->addEditReport($post);
            if($result['status'])
            {
                if(isset($post['UPLOADED_FILES']) and count($post['UPLOADED_FILES'])>0) 
                {
                    for($i=0; $i<count($UPLOADED_FILES); $i++)
                    {
                        $url = 'assets/uploads/attachments/' . $post['attachment_type'] . '/' . $UPLOADED_FILES[$i];
                        if(!$this->attachment->isFileExists($result['status'], $url))
                        {
                            $result['detail_status'.$i] = $this->attachment->addAttachment($result['status'], array('file_url' => $url, 'attachment_type' => ATTACHMENT_TYPE_REPORT));
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
                    $noti_data['title'] = 'New Report';
                    $noti_data['message'] = $this->session->userdata(SESS_FULLNAME) . ' - ' . $post['title'];
                    $noti_data['noti_for'] = NOTI_FOR_SUPS_ADMINS;
                    $noti_data['notified_by'] = $this->session->userdata(SESS_USER_ID);
                    $noti_data['noti_type'] = NOTI_TYPE_REPORT;
                    $this->notification->addNotification($noti_data);
                }
                
            }
            
            
            echo json_encode($result);
        }
    }
    
    
    public function getReportDetails() 
    {
        if ($this->input->is_ajax_request()) 
        {
            $id = $this->input->post('id');
            
            $result['report'] = $this->report->getInfoReport(intval($id));
            $result['attachments'] = $this->attachment->getAttachmentsByOwnerID(intval($id), ATTACHMENT_TYPE_REPORT);
            
            echo json_encode($result);
        }
    }
    
    
    public function updateReportStatus()
    {
        if ($this->input->is_ajax_request()) 
        {
            $id = $this->input->post('id');
            $status = $this->input->post('status');
            
            $result['status'] = $this->report->update(intval($id), array('status' => intval($status)));
            
            echo json_encode($result);
        }
    }
    
    
    public function deleteReport()
    {
        if ($this->input->is_ajax_request()) 
        {
            $id = $this->input->post('id');
            
            $result['status'] = $this->report->delete(intval($id));
            
            echo json_encode($result);
        }
    }
    
    
    
    public function uploadAttachments() 
    {
        error_reporting(E_ERROR | E_WARNING | E_PARSE);
        ini_set('display_errors', 0);
        
        
        $dir = (isset($_POST['attachment_type']) and $_POST['attachment_type']) ? $_POST['attachment_type'] : 'attachments';

        $uploader = new Uploader();
        $data = $uploader->upload($_FILES['myfiles'], [
            'limit' => 4,
            'maxSize' => 15,
            'extensions' => ['pdf','jpg','png','jpeg','gif','doc','docx','xlsx','xls'],
            'required' => false,
            'uploadDir' => 'assets/uploads/attachments/'.$dir.'/',
            'title' => fn_get_current_date('YmdHis') . rand(100, 999),
            'removeFiles' => true,
            'replace' => true,
        ]);

        // Everything for owner, read and execute for others
        chmod("assets/uploads/attachments/".$dir.'/', 0755);
        
        if ($data && $data['isComplete']) {
            $files = $data['data'];
            echo json_encode([
                'success' => true,
                'file' => $files['metas'][0]['name']
            ]);
        } elseif ($data && $data['hasErrors']) {
            echo json_encode([
                'success' => false,
                'errors' => $data['errors']
            ]);
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
    
    
    
    
    public function pdfReports() 
    {
        $this->load->helper('pdf_helper');
        
        $data['status']  = false;
        $data['report_title']   = 'REPORTS';
        $data['output_title']   = 'REPORTS';
        $data['is_landscape_orientation'] = false;
        
        $data['reports'] = (array) $this->report->getAllReports();
        if($data['reports'])
        {
            $data['status'] = true;

        }
        $data['view_url'] = 'pdfs/partial/reports';

        $this->load->view('pdfs/index', $data);
            
    }
    
    
}