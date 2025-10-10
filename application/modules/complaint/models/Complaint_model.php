<?php

class Complaint_model extends MY_Model
{
    public function __construct() {
        parent::__construct();
    }
    
    
    public function addEditComplaint($post=array())
    {
        if (array_key_exists('complaint_date', $post)) 
        { 
            $data['complaint_date'] = fn_format_date($post['complaint_date'], 'Y-m-d'); 
        }
        
        if (array_key_exists('fullname', $post)) 
        { 
            $data['fullname'] = trim($post['fullname']); 
        }
        
        if (array_key_exists('address', $post)) 
        { 
            $data['address'] = trim($post['address']); 
        }
        
        if (array_key_exists('phone1', $post)) 
        { 
            $data['phone1'] = trim($post['phone1']); 
        }
        
        if (array_key_exists('email', $post)) 
        { 
            $data['email'] = trim($post['email']); 
        }
        
        if (array_key_exists('id_no', $post)) 
        { 
            $data['id_no'] = trim($post['id_no']); 
        }
        
        if (array_key_exists('concerns', $post)) 
        { 
            $data['concerns'] = trim($post['concerns']); 
        }
        
        $result = 0;
        if(intval($post['id']) > 0) // EDIT
        {
            $result = ($this->update(intval($post['id']), $data, false)) ? intval($post['id']) : 0;
            
        } else { // ADD
            
            $data['control_no'] = fn_get_current_date('Ym') . '-' . rand(100, 9999);
            
            $result = $this->insert($data, false);
            
        }
        
        return $result;
        
    }
    
    
    public function loadDatatableComplaints()
    {
        $this->load->library('Datatables');
        
        $column = '';
        $column .= '<span class="btn btn-sm btn-info" onclick="showPDFModal($1);" title="Print Complaint">';
            $column .= '<i class="fa fa-print"></i>';
        $column .= '</span> ';
        $column .= '<span class="btn btn-sm btn-primary" onclick="showComplaintFormModal($1);" title="Edit Complaint">';
            $column .= '<i class="fa fa-edit"></i>';
        $column .= '</span> ';
        $column .= '<span class="btn btn-sm btn-danger" onclick="confirmDeleteComplaint($1);" title="Delete Complaint">';
            $column .= '<i class="fa fa-trash"></i>';
        $column .= '</span>';
            
        $flds  = 'c.id, c.control_no, c.complaint_date, c.fullname, c.address, c.phone1, c.concerns';
        
        $this->datatables
            ->select($flds, FALSE)
            ->from(TBL_COMPLAINTS . ' c')
            ->add_column('Action', $column, 'id');
        
        echo $this->datatables->generate();
    }
    
    
}