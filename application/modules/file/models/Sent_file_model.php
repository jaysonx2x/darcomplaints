<?php

class Sent_file_model extends MY_Model
{
    public function __construct() {
        parent::__construct();
    }
    
    
    public function addEditFile($post=array())
    {
        if (array_key_exists('title', $post)) 
        { 
            $data['title'] = trim($post['title']); 
        }
        
        if (array_key_exists('sent_to', $post)) 
        { 
            $data['sent_to'] = intval($post['sent_to']); 
        }
        
        if (array_key_exists('remarks', $post)) 
        { 
            $data['remarks'] = trim($post['remarks']); 
        }
        
        $data['sent_by']    = intval($this->session->userdata(SESS_USER_ID)); 
        $data['company_id'] = intval($this->session->userdata(SESS_COMPANY_ID)); 
        
        $data['is_read'] = 0; 
        
        $result = 0;
        if(intval($post['id']) > 0) // EDIT
        {
            $result = ($this->update(intval($post['id']), $data, false)) ? intval($post['id']) : 0;
            
        } else { // ADD
            
            $data['sent_date'] = fn_get_current_date();
            
            $success = $this->db->insert($this->_table, $data);
            if ($success) 
            {
                return $this->db->insert_id();
            }    
            
        }
        
        return $result;
        
    }
    
    
    public function loadDatatableFiles()
    {
        $this->load->library('Datatables');
        
        $column = '';
        $column .= '<span class="btn btn-sm btn-success" onclick="showSentFileDetailsModal($1);" title="View File">';
            $column .= '<i class="fa fa-search"></i>';
        $column .= '</span> ';
        
        $flds  = 'f.id, f.sent_date, f.title, u.fullname, f.sent_to, f.remarks, (SELECT COUNT(*) FROM attachments a WHERE a.owner_id = f.id AND a.attachment_type = ' . ATTACHMENT_TYPE_SENTFILE . ') as attachments_count';
        
        switch (intval($this->session->userdata(SESS_USER_TYPE)))
        {
            case USER_TYPE_STUDENT:
                $this->datatables->where('f.sent_by', intval($this->session->userdata(SESS_USER_ID)));
                
                $column .= '<span class="btn btn-sm btn-primary" onclick="showFileFormModal($1);" title="Edit File">';
                    $column .= '<i class="fa fa-edit"></i>';
                $column .= '</span> ';
                $column .= '<span class="btn btn-sm btn-danger" onclick="confirmDeleteFile($1,\'$2\');" title="Delete File">';
                    $column .= '<i class="fa fa-trash"></i>';
                $column .= '</span>';

                break;
            
            case USER_TYPE_SUPERVISOR:
                $this->datatables->where('f.sent_to', 2);
                $this->datatables->where('f.company_id', intval($this->session->userdata(SESS_COMPANY_ID)));
                break;
            
            case USER_TYPE_ADMIN:
                $this->datatables->where('f.sent_to', 1);
                break;
            
        }
        
        $this->datatables
            ->select($flds, FALSE)
            ->from($this->_table . ' f')
            ->join(TBL_USERS . ' u', 'u.id = f.sent_by')
            ->add_column('Action', $column, 'id,title');
        
        echo $this->datatables->generate();
    }
    
    
    public function getInfoFile($file_id=0) 
    {
        $this->db
            ->select('f.*, u.fullname, u.profile_url, u.username')
            ->where('f.id', intval($file_id))
            ->join(TBL_USERS . ' u', 'u.id = f.sent_by');
        
        return $this->db->get($this->_table . ' f')->row();
    }
    
}