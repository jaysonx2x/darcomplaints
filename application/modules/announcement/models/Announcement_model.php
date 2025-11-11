<?php

class Announcement_model extends MY_Model
{
    public function __construct() {
        parent::__construct();
    }
    
    
    public function addEditAnnouncement($post=array())
    {
        if (array_key_exists('title', $post)) 
        { 
            $data['title'] = trim($post['title']); 
        }
        
        if (array_key_exists('content', $post)) 
        { 
            $data['content'] = trim($post['content']); 
        }
        
        if (array_key_exists('announcement_type', $post)) 
        { 
            $data['announcement_type'] = intval($post['announcement_type']); 
        }
        
        if (array_key_exists('publish_date', $post)) 
        { 
            $data['publish_date'] = fn_format_date($post['publish_date'], 'Y-m-d') . ' ' . fn_get_current_date('H:i:s'); 
        }
        
        $data['posted_by'] = $this->session->userdata(SESS_USER_ID);
        
        $result = 0;
        if(intval($post['id']) > 0) // EDIT
        {
            $result = ($this->update(intval($post['id']), $data, false)) ? intval($post['id']) : 0;
            
        } else { // ADD
            
            $success = $this->db->insert($this->_table, $data);
            if ($success) 
            {
                $result = $this->db->insert_id();
            }    
            
        }
        
        return $result;
        
    }
    
    
    public function loadDatatableAnnouncement()
    {
        $this->load->library('Datatables');
        
        $column = '';
        $column .= '<span class="btn btn-sm btn-success rounded-pill" onclick="showAnnouncementFormModal($1);" title="Edit Announcement">';
            $column .= '<i class="fa fa-edit"></i>';
        $column .= '</span> ';
        $column .= '<span class="btn btn-sm btn-danger rounded-pill" onclick="confirmDeleteAnnouncement($1);" title="Delete Announcement">';
            $column .= '<i class="fa fa-trash"></i>';
        $column .= '</span>';
            
        $flds  = 'n.id, n.publish_date, (SELECT file_url FROM attachments a WHERE a.owner_id = n.id LIMIT 1) AS firstFile, n.title, n.content, n.announcement_type, u.username';
        
        $this->datatables
            ->select($flds, false)
            ->from($this->_table . ' n')
            ->join(TBL_USERS . ' u', 'u.profiles_id = n.posted_by')
            ->add_column('Action', $column, 'id');
        
        echo $this->datatables->generate();
    }
    
    
    public function getAnnouncementsByType() 
    {
//        switch (intval($this->session->userdata(SESS_USER_TYPE))) 
//        {
//            case USER_TYPE_STUDENT:
//                $this->db->where_in('a.announcement_type', array(1,2));
//                break;
//            case USER_TYPE_SUPERVISOR:
//                $this->db->where_in('a.announcement_type', array(1,3));
//                break;
//        }
        
        return $this->db->get($this->_table . ' a')->result();
    }
    
    public function getInfoAnnouncement($id=0) 
    {
        return $this->db->select('a.*, u.fullname, u.profile_url, u.username')
            ->where('a.id', intval($id))
            ->join(TBL_USERS . ' u', 'u.id = a.posted_by')
            ->get($this->_table . ' a')->row();
    }
    
}