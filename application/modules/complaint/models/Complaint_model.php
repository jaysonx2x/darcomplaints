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
        } else {
            $data['complaint_date'] = fn_get_current_date('Y-m-d');
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
    
    
    public function loadDatatableComplaints($status=null)
    {
        $this->load->library('Datatables');
        
        $column = '';
        
        $column .= '<span class="btn btn-sm btn-success" onclick="showStatusFormModal($1, $2, \'$3\', \'$4\');" title="Update Status">';
            $column .= '<i class="fa fa-pencil"></i>';
        $column .= '</span> ';
        
        $column .= '<span class="btn btn-sm btn-info" onclick="showPDFModal(\'pdf/complaint/$1\');" title="Print Complaint"><i class="fa fa-print"></i></span> ';
            
        $flds  = 'c.id, c.control_no, c.complaint_date, c.fullname, c.address, c.phone1, c.status, c.addressed_by, c.addressed_date, c.concerns';
        
        (intval($status) != 10) ? $this->datatables->where('c.status = ' . intval($status)) : '';
        
        $this->datatables
            ->select($flds, FALSE)
            ->from(TBL_COMPLAINTS . ' c')
            ->add_column('Action', $column, 'id,status,addressed_by,addressed_date');
        
        echo $this->datatables->generate();
    }
    
    
    public function getAllComplaints($from_date=null, $to_date=null)
    {
        if($from_date !== null and $to_date === null)
        { 
            $this->db->where('c.complaint_date >= "' . $from_date . '"'); 
            
        } elseif($from_date !== null and $to_date !== null) {
            
            $to_date = fn_add_days_to_date($to_date, 1);
            
            $this->db->where('(c.complaint_date >= "' . $from_date . '" AND c.complaint_date < "' . $to_date . '")');
            
        }
        
        return $this->db
            ->order_by('c.complaint_date', 'DESC')
            ->select('c.*')
            ->from($this->_table . ' c')
            ->get()->result();
        
    }
    
}