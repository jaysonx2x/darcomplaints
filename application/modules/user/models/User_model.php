<?php

class User_model extends MY_Model
{
    public function __construct() {
        parent::__construct();
    }
    
    
    public function addEditUser($post=array())
    {
        if (array_key_exists('firstname', $post)) 
        { 
            $data['firstname'] = trim($post['firstname']); 
        }
        
        if (array_key_exists('lastname', $post)) 
        { 
            $data['lastname'] = trim($post['lastname']); 
        }
        
        if (array_key_exists('mi', $post)) 
        { 
            $data['mi'] = trim($post['mi']); 
        }
        
        $data['fullname'] = fn_format_name($data['firstname'], $data['lastname'], $data['mi']);
        
        if (array_key_exists('gender', $post)) 
        { 
            $data['gender'] = intval($post['gender']); 
        }
        
        if (array_key_exists('phone', $post)) 
        { 
            $data['phone'] = trim($post['phone']); 
        }
        
        if (array_key_exists('email', $post)) 
        { 
            $data['email'] = trim($post['email']); 
        }
        
        if (array_key_exists('username', $post) AND strlen(trim($post['username'])) > 0) 
        { 
            $data['username'] = trim($post['username']); 
        }
        
        if (array_key_exists('passw', $post) AND strlen(trim($post['passw'])) > 0) 
        { 
//            $data['passw'] = password_hash($post['passw'], PASSWORD_DEFAULT); 
            $data['passw'] = $post['passw']; 
        }
        
        if (array_key_exists('user_type', $post)) 
        { 
            $data['user_type'] = intval($post['user_type']); 
        }
        
        if (array_key_exists('status', $post)) 
        { 
            $data['status'] = intval($post['status']); 
        }
        
        
        $result = 0;
        if(intval($post['id']) > 0) // EDIT
        {
            if (array_key_exists('profile_url', $post) and strlen($post['profile_url'])>0) 
            { 
                $data['profile_url'] = trim($post['profile_url']); 
                
                if(intval($post['id']) === intval($this->session->userdata(SESS_USER_ID)))
                {
                    $this->session->set_userdata(array(SESS_PROFILE_URL => $data['profile_url']));
                }
            }
            
            $result = ($this->update(intval($post['id']), $data, false)) ? intval($post['id']) : 0;
            
        } else { // ADD
            
            if (array_key_exists('profile_url', $post) and strlen($post['profile_url'])>0) 
            { 
                $data['profile_url'] = trim($post['profile_url']); 
            } else {
                $data['profile_url'] = fn_generate_random_avatar($data['gender']);
            }
            
            $success = $this->db->insert($this->_table, $data);
            if ($success) 
            {
                return $this->db->insert_id();
            }    
            
        }
        
        return $result;
        
    }
    
    
    public function loadDatatableUsers()
    {
        $this->load->library('Datatables');
        
        $column = '';
        $column .= '<span class="btn btn-sm btn-primary rounded-pill" onclick="showUserFormModal($1);" title="Edit User">';
            $column .= '<i class="fa fa-edit"></i>';
        $column .= '</span> ';
        $column .= '<span class="btn btn-sm btn-danger rounded-pill" onclick="confirmDeleteUser($1,\'$2\');" title="Delete User">';
            $column .= '<i class="fa fa-trash"></i>';
        $column .= '</span>';
            
        $flds  = 'u.id, u.profile_url, u.username, u.fullname, u.email, u.user_type';
        
        switch (intval($this->session->userdata(SESS_USER_TYPE)))
        {
            case USER_TYPE_ADMIN:
                $this->datatables->where('u.id != 1');
                break;
        }
        
        $this->datatables
            ->select($flds, FALSE)
            ->where_in('u.user_type', array(USER_TYPE_ADMIN, USER_TYPE_STAFF))
            ->from($this->_table . ' u')
            ->add_column('Action', $column, 'id,fullname');
        
        echo $this->datatables->generate();
    }
    
    
    public function isLoggedIn()
    {
        $id = $this->session->userdata(SESS_USER_ID);
        
        if (isset($id) and $id > 0)
        {
            $result = $this->db
                ->where('id', intval($id))
                ->select('is_logged_in, session_id')
                ->get($this->_table)->row();
            
            return ($result and $result->is_logged_in and ( $result->session_id == session_id()));
            
        } else {
            return FALSE;
        }
        
    }
    
    
    public function get_user($username) {
        return $this->db->get_where('users', ['username' => $username])->row();
    }
    
    
    public function updateLoginStatus($id=0, $toLogin=0)
    {
        if(intval($id)>0)
        {
            return $this->db
                ->where('id', intval($id))
                ->update($this->_table, array('is_logged_in' => $toLogin, 'session_id' => session_id()));
            
        } return FALSE;
    }
    
    
    public function checkUsernameExist($username=NULL) 
    {
        if($username !== NULL) 
        {
            return $this->count(array('username' => trim($username)));
            
        } return 0;
    }
    
    
    public function activateDeactivateUser($id=0, $is_active=FALSE)
    {
        if(intval($id) == 0) return FALSE;
        
        $this->db->where('id', intval($id));
        
        return $this->db->update($this->_table, array('is_active' => intval($is_active)));
    }
    
    
    
    public function getAllUsers()
    {
        $flds  = 'u.*, c.company_name';
        
        $this->db->select($flds)
            ->where_in('u.user_type', array(USER_TYPE_ADMIN, USER_TYPE_SUPERVISOR))
            ->where('u.id != 1')
            ->join(TBL_COMPANIES . ' c', 'c.id = u.company_id', 'left');
        
        return $this->db->get($this->_table . ' u')->result();
        
    }
    
}