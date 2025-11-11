<?php

class Report_model extends MY_Model
{
    public function __construct() {
        parent::__construct();
    }
    
    
    public function addEditReport($post=array())
    {
        if (array_key_exists('submitted_date', $post)) 
        { 
            $data['submitted_date'] = fn_format_date($post['submitted_date']); 
        }
        
        if (array_key_exists('title', $post)) 
        { 
            $data['title'] = trim($post['title']); 
        }
        
        if (array_key_exists('notes', $post)) 
        { 
            $data['notes'] = trim($post['notes']); 
        }
        
        $data['submitted_by'] = intval($this->session->userdata(SESS_USER_ID)); 
        
        $data['status'] = 1; 
        
        $result = 0;
        if(intval($post['id']) > 0) // EDIT
        {
            $result = ($this->update(intval($post['id']), $data, false)) ? intval($post['id']) : 0;
            
        } else { // ADD
            
            $success = $this->db->insert($this->_table, $data);
            if ($success) 
            {
                return $this->db->insert_id();
            }    
            
        }
        
        return $result;
        
    }
    
    
    public function loadDatatableReports()
    {
        $this->load->library('Datatables');
        
        $column = '';
        $column .= '<span class="btn btn-sm btn-info" onclick="showReportAttachmentsModal($1);" title="View Details & Attachments">';
            $column .= '<i class="fa fa-eye"></i>';
        $column .= '</span> ';

        $flds  = 'r.id, r.submitted_date, r.title, r.status, u.fullname, r.notes, (SELECT COUNT(*) FROM attachments a WHERE a.owner_id = r.id AND a.attachment_type = ' . ATTACHMENT_TYPE_REPORT . ') as attachments_count';
        
        switch (intval($this->session->userdata(SESS_USER_TYPE)))
        {
            case USER_TYPE_STUDENT:
                $this->datatables->where('r.submitted_by', intval($this->session->userdata(SESS_USER_ID)));
                
                $column .= '<span class="btn btn-sm btn-success" onclick="showReportFormModal($1);" title="Edit Report">';
                    $column .= '<i class="fa fa-edit"></i>';
                $column .= '</span> ';
                $column .= '<span class="btn btn-sm btn-danger" onclick="confirmDeleteReport($1,\'$2\');" title="Delete Report">';
                    $column .= '<i class="fa fa-trash"></i>';
                $column .= '</span>';

                break;
            
            case USER_TYPE_SUPERVISOR:
                $this->datatables->where('u.company_id', intval($this->session->userdata(SESS_COMPANY_ID)));
                break;
        }
        
        $this->datatables
            ->select($flds, FALSE)
            ->from($this->_table . ' r')
            ->join(TBL_USERS . ' u', 'u.id = r.submitted_by')
            ->add_column('Action', $column, 'id,title');
        
        echo $this->datatables->generate();
    }
    
    
    public function getInfoReport($report_id=0) 
    {
        $this->db
            ->select('r.*, u.fullname, u.profile_url, u.username')
            ->where('r.id', intval($report_id))
            ->join(TBL_USERS . ' u', 'u.id = r.submitted_by');
        
        return $this->db->get($this->_table . ' r')->row();
    }
    
    public function countReport($cdtn=array()) 
    {
        switch (intval($this->session->userdata(SESS_USER_TYPE)))
        {
            case USER_TYPE_SUPERVISOR:
                $this->db->where('u.company_id', intval($this->session->userdata(SESS_COMPANY_ID)));
                $this->db->join(TBL_USERS . ' u', 'u.id = r.submitted_by');
                break;
        }
        
        return $this->db->count_all_results($this->_table . ' r');
    }
    
    public function getAllReports()
    {
        $flds  = 'r.*, u.fullname, u.profile_url, u.username';
        
        $this->db
            ->select($flds)
            ->join(TBL_USERS . ' u', 'u.id = r.submitted_by');
        
        return $this->db->get($this->_table . ' r')->result();
        
    }
    
}