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
    
    
    public function saveComplaintStatus() 
    {
        if ($this->input->is_ajax_request()) 
        {
            $post = $this->input->post();
            
            $result['status'] = $this->complaint->update(
                intval($post['id']),
                array(
                    'status'         => intval($post['status']), 
                    'addressed_by'   => trim($post['addressed_by']), 
                    'addressed_date' => fn_format_date($post['addressed_date'], 'Y-m-d') . ' ' . fn_get_current_date('H:i:s')
                ), 
                false
            );
            
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
    
    
    public function loadComplaintsDT($status=null) 
    {
        $this->complaint->loadDatatableComplaints($status);
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
    
    
    
    public function pdfComplaint($complaint_id=0) 
    {
        if(intval($complaint_id)>0) 
        {
            $this->load->helper('pdf_helper');

            $data['status']  = false;
            $data['report_title']   = 'CLIENTELE INFORMATION SHEET (CIS)';
            $data['output_title']   = 'COMPLAINT';
            $data['is_landscape_orientation'] = false;

            $data['report'] = (array) $this->complaint->get(intval($complaint_id));
            if($data['report'])
            {
                $data['status'] = true;
            }
            
            $data['view_url'] = 'pdfs/partial/complaint';

            $this->load->view('pdfs/index', $data);
            
        } else {
            show_404();
        }
            
    }
    
    
    
    public function pdfComplaints() 
    {
        $this->load->helper('pdf_helper');
        
        $data['status']  = false;
        $data['report_title']   = 'COMPLAINTS';
        $data['output_title']   = 'COMPLAINTS';
        $data['is_landscape_orientation'] = true;
        
        $data['reports'] = (array) $this->complaint->getAllComplaints();
        if($data['reports'])
        {
            $data['status'] = true;
        }
        $data['view_url'] = 'pdfs/partial/complaints';

        $this->load->view('pdfs/index', $data);
            
    }
    
    
}