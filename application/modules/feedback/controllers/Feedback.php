<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('feedback/Feedback_model', 'feedback');
        $this->load->model('notification/Notification_model', 'notification');
    }
    
    
    public function index()
    {
        $this->data['title'] = 'Feedbacks';
        
        $this->data['content'] = 'feedback/feedback_table';
        
        $this->data['module_css'] = array (
            base_url('assets/vendors/datatables/dataTables.bootstrap4.min.css'),
//            base_url('assets/vendors/jquery.filer-1.3.0/css/jquery.filer.css'),
//            base_url('assets/vendors/jquery.filer-1.3.0/css/themes/jquery.filer-dragdropbox-theme.css'),
        );
            
        $this->data['module_js'] = array (
            base_url('assets/vendors/datatables/jquery.dataTables.min.js'),
            base_url('assets/vendors/datatables/dataTables.bootstrap4.min.js'),
//            base_url('assets/vendors/jquery.validate/jquery.validate.js'),
//            base_url('assets/vendors/jquery.filer-1.3.0/js/jquery.filer.min.js'),
            base_url('assets/js/feedbacks.js'),
//            base_url('assets/js/feedback-image-uploader.js'),
        );
        
        $this->template->show_template($this->data);
        
    }
    
    
    public function saveFeedback() 
    {
        if ($this->input->is_ajax_request()) 
        {
            $post = $this->input->post();
            
            $result['status'] = $this->feedback->addEditFeedback($post);
            
            // Create notification for admins and staff when new feedback is submitted
            if (intval($result['status']) > 0 && intval($post['id']) == 0) {
                // Get the complete feedback data
                $feedback_data = (array) $this->feedback->get($result['status']);
                
                // Create notification for admins and staff
                $notification_data = array(
                    'owner_id'      => $result['status'],
                    'noti_date'     => fn_get_current_date('Y-m-d H:i:s'),
                    'title'         => 'New Feedback Submitted',
                    'message'       => 'A new feedback has been submitted (' . ucfirst($feedback_data['lang']) . ' - ' . $feedback_data['service_availed'] . ')',
                    'noti_for'      => NOTI_FOR_ADMINS_STAFF,
                    'noti_type'     => NOTI_TYPE_FEEDBACK,
                    'profiles_id'   => 0
                );
                $this->notification->addNotification($notification_data);
            }
            
            echo json_encode($result);
        }
    }
    
    
    public function getFeedbackDetails() 
    {
        if ($this->input->is_ajax_request()) 
        {
            $id = $this->input->post('id');
            
            $result['feedback'] = $this->feedback->get(intval($id));
            
            echo json_encode($result);
        }
    }
    
    
    public function loadFeedbacksDT() 
    {
        $this->feedback->loadDatatableFeedbacks();
    }
    
    
    
    public function deleteFeedback()
    {
        if ($this->input->is_ajax_request()) 
        {
            $id = $this->input->post('id');
            
            $result['status'] = $this->feedback->delete(intval($id));
            
            echo json_encode($result);
        }
    }
    
    
    
    
    public function pdfFeedback($feedback_id=0) 
    {
        if(intval($feedback_id)>0) 
        {
            $this->load->helper('pdf_helper');

            $data['status']  = false;
            $data['output_title']   = 'FEEDBACK';
            $data['is_landscape_orientation'] = false;

            $data['report'] = (array) $this->feedback->get(intval($feedback_id));
            if($data['report'])
            {
                $data['status'] = true;
                
                if($data['report']['lang'] === 'english') 
                {
                    $data['report_title'] = 'HELP US SERVE YOU BETTER!';
                } else {
                    $data['report_title'] = 'TULUNGAN MO KAMI MAS MAPABUTI ANG AMING PROSESO AT SERBISYO!';
                }
                
                $data['view_url'] = 'pdfs/partial/feedback_'.$data['report']['lang'];
                
            }
            
//            var_dump($data['report_title']);
//            exit;
            
            $this->load->view('pdfs/index', $data);
            
        } else {
            show_404();
        }
            
    }
    
    
    
    public function pdfFeedbacks() 
    {
        $this->load->helper('pdf_helper');
        
        $data['status']  = false;
        $data['report_title']   = 'FEEDBACKS';
        $data['output_title']   = 'FEEDBACKS';
        $data['is_landscape_orientation'] = true;
        
        $data['reports'] = (array) $this->feedback->getAllFeedbacks();
        if($data['reports'])
        {
            $data['status'] = true;
        }
        $data['view_url'] = 'pdfs/partial/feedbacks';

        $this->load->view('pdfs/index', $data);
            
    }
    
    
}