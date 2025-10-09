<?php

class Attachment_model extends MY_Model
{
    public function __construct() {
        parent::__construct();
    }
    
    
    public function addAttachment($owner_id=0, $post=array())
    {
        if(intval($owner_id) == 0) return FALSE;
        
        $data['owner_id'] = intval($owner_id); 
        
        if (array_key_exists('file_url', $post)) 
        { 
            $data['file_url'] = trim($post['file_url']); 
        }
        
        if (array_key_exists('attachment_type', $post)) 
        { 
            $data['attachment_type'] = intval($post['attachment_type']); 
        }
        
        $result = $this->insert($data, false);
        
        return $result;
        
    }
    
    
    public function getAttachmentsByOwnerID($owner_id=0, $type=ATTACHMENT_TYPE_REPORT)
    {
        if(intval($owner_id) == 0) return FALSE;
        
        return $this->get_all_by(array('owner_id' => intval($owner_id), 'attachment_type' => intval($type)));
    }
    
    
    public function isFileExists($owner_id=0, $file_url=NULL)
    {
        if(intval($owner_id) == 0 and $file_url == NULL) return FALSE;
        
        return $this->count(array('owner_id' => intval($owner_id), 'file_url' => $file_url));
    }
    
}