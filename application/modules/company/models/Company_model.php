<?php

class Company_model extends MY_Model
{
    public function __construct() {
        parent::__construct();
    }
    
    
    public function addEditCompany($post=array())
    {
        if (array_key_exists('company_name', $post)) 
        { 
            $data['company_name'] = trim($post['company_name']); 
        }
        
        if (array_key_exists('address', $post)) 
        { 
            $data['address'] = trim($post['address']); 
        }
        
        if (array_key_exists('phone', $post)) 
        { 
            $data['phone'] = trim($post['phone']); 
        }
        
        if (array_key_exists('email', $post)) 
        { 
            $data['email'] = trim($post['email']); 
        }
        
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
    
    
    public function loadDatatableCompanies()
    {
        $this->load->library('Datatables');
        
        $column = '';
        $column .= '<span class="btn btn-sm btn-primary" onclick="showCompanyFormModal($1);" title="Edit Company">';
            $column .= '<i class="fa fa-edit"></i>';
        $column .= '</span> ';
        $column .= '<span class="btn btn-sm btn-danger" onclick="confirmDeleteCompany($1,\'$2\');" title="Delete Company">';
            $column .= '<i class="fa fa-trash"></i>';
        $column .= '</span>';
            
        $flds  = 'c.id, c.company_name, c.address, c.phone, c.email';
        
        $this->datatables
            ->select($flds, FALSE)
            ->from(TBL_COMPANIES . ' c')
            ->add_column('Action', $column, 'id,company_name');
        
        echo $this->datatables->generate();
    }
    
    
    public function getAllCompanies()
    {
        $flds  = 'c.*';
        
        $this->db->select($flds);
        
        return $this->db->get($this->_table . ' c')->result();
        
    }
}