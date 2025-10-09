<?php

/**
 * A modified version of Jim Rumbelow's MY_Model.
 */

class MY_Model extends CI_Model 
{

    protected $_table = NULL;

    protected $_db = NULL;
    
    // -------------------------------------
    
    public function __construct($newDB = NULL) 
    {
        parent::__construct($newDB);
        
        if (NULL != $newDB)
        {
            $this->_db = $this->load->database($newDB, TRUE);
        } else {
            $this->_db = $this->db; //$this->load->database('default', TRUE);
        }
        
        $this->load->helper('inflector');
        if ( ! $this->_table)
        {
            $temptable = strtolower(plural(str_replace('_model', '', get_class($this))));       
            
            $this->_table = strtolower($temptable);             
        }
    }
    
    public function set_db($newDB = NULL) 
    {
        if (NULL != $newDB)
        {
            $this->_db = $this->load->database($newDB, TRUE);
        } else {
            $this->_db = $this->db; //$this->load->database('default', TRUE);
        }

    }

    public function get() 
    {
        $args = func_get_args();
        if (count($args) > 1 || is_array($args[0]))
        {
            $this->_db->where($args);
        }
        else
        {
            $this->_db->where('id', $args[0]);
        }
        return $this->_db->get($this->_table)->row();
    }

    public function get_array() 
    {
        $args = func_get_args();
        if (count($args) > 1 || is_array($args[0]))
        {
            $this->_db->where($args);
        }
        else
        {
            $this->_db->where('id', $args[0]);
        }
        return $this->_db->get($this->_table)->result_array();
    }
    
    public function get_by($condition)
    {
        if (is_array($condition))
        {
            $this->_db->where($condition);
        }
        else
        {
            $this->_db->where('id', $condition);
        }
        return $this->_db->get($this->_table)->row();
    }
    

    public function get_all() 
    {
        return $this->_db->get($this->_table)->result();
    }

    public function get_all_by($condition) 
    {
        if (is_array($condition) AND count($condition) > 0)
        {
            $this->_db->where($condition);
        }
        else
        {
            $this->_db->where('id', $condition);
        }
        return $this->_db->get($this->_table)->result();
    }
    
    public function order_by($criteria, $order = 'ASC')
    {
        if ( is_array($criteria) )
        {
            foreach ($criteria as $key => $value)
            {
                $this->_db->order_by($key, $value);
            }
        }
        else
        {
            $this->_db->order_by($criteria, $order);
        }
        return $this->_db->get($this->_table)->result();
    }
    
    public function get_all_order_by($condition, $order, $order_type) 
    {
        if (is_array($condition) AND count($condition) > 0)
        {
            $this->_db->where($condition)->order_by($order, $order_type);
        }
        else
        {
            $this->_db->order_by($order, $order_type);
        }
        return $this->_db->get($this->_table)->result();
    }

 
    public function insert($data, $log_it = FALSE) 
    {
        $karon = new DateTime();
        
        if ($log_it)
        {
            $data['CREATED_DATE'] = $data['UPDATED_DATE'] = $karon->format('Y-m-d H:i:s');
            $data['CREATED_BY']   = $data['UPDATED_BY'] = $this->session->userdata(SESS_PROFILE_ID);
        }
        
        $success = $this->_db->insert($this->_table, $data);
        
            if ($success) 
            {
                $current_id = $this->_db->insert_id();
                return $current_id;
            }            
        
        return FALSE;
    }
    
    public function update($condition, $data=array(), $log_it = FALSE) 
    {
        $success = FALSE;
        
        $karon = new DateTime();
        
        if ($log_it)
        {
            $data['UPDATED_DATE'] = $karon->format('Y-m-d H:i:s');
            $data['UPDATED_BY']   = $this->session->userdata(SESS_PROFILE_ID);
        }
        
        if (is_array($condition) AND count($condition) > 0)
        {
            $this->_db->where($condition);
        }
        else
        {
            $this->_db->where('id', $condition);
        }
        
        if (count($data) > 0)      
        {
            $success = $this->_db->update($this->_table, $data);
            return $success;
        }
        
        return FALSE;
    }

    public function delete($condition)
    {
        if (is_array($condition) and count($condition)>0)
        {
            $this->_db->where($condition);
        }
        else
        {
            $this->_db->where('id', $condition);
        }
        return $this->_db->delete($this->_table);
    }
        
    public function count($condition=array())
    {
        if (is_array($condition) and count($condition)>0)
        {
            $this->_db->where($condition);
        }
        return $this->_db->count_all_results($this->_table);         
    }

}