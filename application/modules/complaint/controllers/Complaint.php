<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Complaint extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('complaint/Complaint_model', 'complaint');
    }
    
    
    public function index()
    {
        $this->data['title'] = 'Complaints';
        
        $this->data['content'] = 'complaint/complaint_table';
        
        $this->data['module_css'] = array (
            base_url('assets/vendors/datatables/dataTables.bootstrap4.min.css'),
//            base_url('assets/vendors/jquery.filer-1.3.0/css/jquery.filer.css'),
//            base_url('assets/vendors/jquery.filer-1.3.0/css/themes/jquery.filer-dragdropbox-theme.css'),
        );
            
        $this->data['module_js'] = array (
            base_url('assets/vendors/datatables/jquery.dataTables.min.js'),
            base_url('assets/vendors/datatables/dataTables.bootstrap4.min.js'),
            base_url('assets/vendors/jquery.validate/jquery.validate.js'),
//            base_url('assets/vendors/jquery.filer-1.3.0/js/jquery.filer.min.js'),
            base_url('assets/js/complaints.js'),
//            base_url('assets/js/complaint-image-uploader.js'),
        );
        
        $this->template->show_template($this->data);
        
    }
    
    
    public function saveComplaint() 
    {
        if ($this->input->is_ajax_request()) 
        {
            $post = $this->input->post();
            
            $result['status'] = $this->complaint->addEditComplaint($post);
            
            echo json_encode($result);
        }
    }
    
    
    public function getComplaintDetails() 
    {
        if ($this->input->is_ajax_request()) 
        {
            $id = $this->input->post('id');
            
            $result['complaint'] = $this->complaint->get(intval($id));
            
            echo json_encode($result);
        }
    }
    
    
    public function loadComplaintsDT() 
    {
        $this->complaint->loadDatatableComplaints();
    }
    
    
    
    public function deleteComplaint()
    {
        if ($this->input->is_ajax_request()) 
        {
            $id = $this->input->post('id');
            
            $result['status'] = $this->complaint->delete(intval($id));
            
            echo json_encode($result);
        }
    }
    
    
    
    public function pdfComplaints() 
    {
        $this->load->helper('pdf_helper');
        
        $data['status']  = false;
        $data['report_title']   = 'COMPANIES';
        $data['output_title']   = 'COMPANIES';
        $data['is_landscape_orientation'] = false;
        
        $data['reports'] = (array) $this->complaint->getAllComplaints();
        if($data['reports'])
        {
            $data['status'] = true;

        }
        $data['view_url'] = 'pdfs/partial/companies';

        $this->load->view('pdfs/index', $data);
            
    }
    
    
}