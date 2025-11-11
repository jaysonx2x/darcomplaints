<?php

class Feedback_model extends MY_Model
{
    public function __construct() {
        parent::__construct();
    }
    
    
    public function addEditFeedback($post=array())
    {
        if (array_key_exists('lang', $post)) 
        { 
            $data['lang'] = trim($post['lang']); 
        }
        
        if (array_key_exists('client_type', $post)) 
        { 
            $data['client_type'] = intval($post['client_type']); 
        }
        
        if (array_key_exists('client_type_other', $post)) 
        { 
            $data['client_type_other'] = trim($post['client_type_other']); 
        }

        if (array_key_exists('age_group', $post)) 
        { 
            $data['age_group'] = intval($post['age_group']); 
        }
        
        if (array_key_exists('feedback_date', $post)) 
        { 
            $data['feedback_date'] = fn_format_date($post['feedback_date'], 'Y-m-d'); 
        } else {
            $data['feedback_date'] = fn_get_current_date('Y-m-d');
        }
        
        if (array_key_exists('sex', $post)) 
        { 
            $data['sex'] = intval($post['sex']); 
        }
        
        if (array_key_exists('region', $post)) 
        { 
            $data['region'] = trim($post['region']); 
        }
        
        if (array_key_exists('service_availed', $post)) 
        { 
            $data['service_availed'] = trim($post['service_availed']); 
        }
        
        if (array_key_exists('time_in', $post)) 
        { 
            $data['time_in'] = trim($post['time_in']); 
        }
        
        if (array_key_exists('time_out', $post)) 
        { 
            $data['time_out'] = trim($post['time_out']); 
        }
        
        if (array_key_exists('cc1', $post)) 
        { 
            $data['cc1'] = intval($post['cc1']); 
        }
        
        if (array_key_exists('cc2', $post)) 
        { 
            $data['cc2'] = intval($post['cc2']); 
        }
        
        if (array_key_exists('cc3', $post)) 
        { 
            $data['cc3'] = intval($post['cc3']); 
        }
        
        if (array_key_exists('sqd0', $post)) 
        { 
            $data['sqd0'] = intval($post['sqd0']); 
        }
        
        if (array_key_exists('sqd1', $post)) 
        { 
            $data['sqd1'] = intval($post['sqd1']); 
        }
        
        if (array_key_exists('sqd2', $post)) 
        { 
            $data['sqd2'] = intval($post['sqd2']); 
        }
        
        if (array_key_exists('sqd3', $post)) 
        { 
            $data['sqd3'] = intval($post['sqd3']); 
        }
        
        if (array_key_exists('sqd4', $post)) 
        { 
            $data['sqd4'] = intval($post['sqd4']); 
        }
        
        if (array_key_exists('sqd5', $post)) 
        { 
            $data['sqd5'] = intval($post['sqd5']); 
        }
        
        if (array_key_exists('sqd6', $post)) 
        { 
            $data['sqd6'] = intval($post['sqd6']); 
        }
        
        if (array_key_exists('sqd7', $post)) 
        { 
            $data['sqd7'] = intval($post['sqd7']); 
        }
        
        if (array_key_exists('sqd8', $post)) 
        { 
            $data['sqd8'] = intval($post['sqd8']); 
        }
        
        if (array_key_exists('suggestions', $post)) 
        { 
            $data['suggestions'] = trim($post['suggestions']); 
        }
        
        $result = 0;
        if(intval($post['id']) > 0) // EDIT
        {
            $result = ($this->update(intval($post['id']), $data, false)) ? intval($post['id']) : 0;
            
        } else { // ADD
            
            $result = $this->insert($data, false);
            
        }
        
        return $result;
        
    }
    
    
    public function loadDatatableFeedbacks()
    {
        $this->load->library('Datatables');
        
        $column = '';
        $column .= '<span class="btn btn-sm btn-info" onclick="showPDFModal($1);" title="Print Feedback">';
            $column .= '<i class="fa fa-print"></i>';
        $column .= '</span> ';
        $column .= '<span class="btn btn-sm btn-danger" onclick="confirmDeleteFeedback($1);" title="Delete Feedback">';
            $column .= '<i class="fa fa-trash"></i>';
        $column .= '</span>';
            
        $flds  = 'f.id, f.feedback_date, f.client_type, f.age_group, f.region, f.service_availed, f.suggestions';
        
        $this->datatables
            ->select($flds, FALSE)
            ->from(TBL_FEEDBACKS . ' f')
            ->add_column('Action', $column, 'id');
        
        echo $this->datatables->generate();
    }
    
    
}