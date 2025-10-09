<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller 
{
    protected $data = array();
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user/User_model'         , 'user');
        $this->load->model('notification/Notification_model', 'notification');

        $this->load->module('template/Template');
        $this->data['title']    = SYSTEM_ALIAS . ' | Dashboard';
        $this->data['content']  = 'dashboard/dashboard';
        
    }    
    
   
}
class ValidatedPages extends MY_Controller {
    
    public function __construct() {
        parent::__construct();

        if(!$this->user->isLoggedIn()){
            session_destroy();
            redirect(base_url('login'), 'refresh');
        }
            
    }
  
}


class ValidatedLogin extends MY_Controller {
    
    public function __construct() {
        parent::__construct();

        if ($this->user->isLoggedIn())
        {
            redirect(base_url('main'), 'refresh');
        }
            
    }
    
  
}
