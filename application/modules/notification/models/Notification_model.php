<?php

class Notification_model extends MY_Model
{
    public function __construct() {
        parent::__construct();
    }
    
    
    public function addNotification($post=array())
    {
        if (array_key_exists('owner_id', $post)) 
        { 
            $data['owner_id'] = intval($post['owner_id']); 
        }
        
        if (array_key_exists('noti_date', $post)) 
        { 
            $data['noti_date'] = fn_format_date($post['noti_date']); 
        }
        
        if (array_key_exists('title', $post)) 
        { 
            $data['title'] = trim($post['title']); 
        }
        
        if (array_key_exists('message', $post)) 
        { 
            $data['message'] = trim($post['message']); 
        }
        
        if (array_key_exists('noti_for', $post)) 
        { 
            $data['noti_for'] = intval($post['noti_for']); 
        }
        
        if (array_key_exists('noti_type', $post)) 
        { 
            $data['noti_type'] = intval($post['noti_type']); 
        }
        
        if (array_key_exists('profiles_id', $post)) 
        { 
            $data['profiles_id'] = intval($post['profiles_id']); 
        }
        
        $data['notified_by'] = $this->session->userdata(SESS_USER_ID);
        
        $result = 0;
        $success = $this->db->insert($this->_table, $data);
        if ($success) 
        {
            $result = $this->db->insert_id();
        }    
        
        return $result;
        
    }
    
    
    public function loadDatatableNotification()
    {
        $this->load->library('Datatables');
        
        $column = '';
        $column .= '<span class="btn btn-sm btn-primary rounded-pill" onclick="showAnnouncementFormModal($1);" title="Edit Announcement">';
            $column .= '<i class="fa fa-edit"></i>';
        $column .= '</span> ';
        $column .= '<span class="btn btn-sm btn-danger rounded-pill" onclick="confirmDeleteAnnouncement($1);" title="Delete Announcement">';
            $column .= '<i class="fa fa-trash"></i>';
        $column .= '</span>';
            
        $flds  = 'n.id, n.noti_date, n.title, n.message, n.noti_type, u.username';
        
        $this->datatables
            ->select($flds, false)
            ->from($this->_table . ' n')
            ->join(TBL_USERS . ' u', 'u.profiles_id = n.notified_by')
            ->add_column('Action', $column, 'id');
        
        echo $this->datatables->generate();
    }
    
    
    public function getNotificationsByUser($is_count=false) 
    {
        switch (intval($this->session->userdata(SESS_USER_TYPE))) 
        {
            case USER_TYPE_ADMIN:
                $this->db->where_in('n.noti_for', array(NOTI_FOR_ALL, NOTI_FOR_SUPS_ADMINS, NOTI_FOR_ADMINS_STUDENTS));
                break;
            case USER_TYPE_SUPERVISOR:
                $this->db->where_in('n.noti_for', array(NOTI_FOR_ALL, NOTI_FOR_SUPS, NOTI_FOR_SUPS_STUDENTS, NOTI_FOR_SUPS_ADMINS));
                break;
            case USER_TYPE_STUDENT:
                $this->db->where_in('n.noti_for', array(NOTI_FOR_ALL, NOTI_FOR_STUDENTS, NOTI_FOR_SUPS_STUDENTS, NOTI_FOR_ADMINS_STUDENTS));
                break;
        }
        
        $this->db
            ->select('n.*, u.fullname, u.profile_url, u.username')
            ->order_by('n.noti_date', 'DESC')
            ->or_where('n.noti_for = 0 AND n.profiles_id = ' . intval($this->session->userdata(SESS_USER_ID)))
            ->join(TBL_USERS . ' u', 'u.id = n.notified_by');
        
        return ($is_count) ? $this->db->count_all_results($this->_table . ' n') : $this->db->get($this->_table . ' n')->result();
    }
    
}