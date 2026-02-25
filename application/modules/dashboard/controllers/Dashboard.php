<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends ValidatedPages {

    public function __construct() {
        parent::__construct();
        $this->load->model('user/User_model'                , 'user');
        $this->load->model('complaint/Complaint_model'      , 'complaint');
        $this->load->model('feedback/Feedback_model'        , 'feedback');
        $this->load->model('announcement/Announcement_model', 'announcement');
    }
    
    public function index()
    {
        $this->data['title']        = 'Dashboard';
        $this->data['breadcrumb']   = 'Dashboard';
        
        $this->data['content'] = 'dashboard/dashboard';
        
        $this->data['pending_complaints_count']    = $this->complaint->count(array('status' => 0));
        $this->data['resolved_complaints_count']   = $this->complaint->count(array('status' => 2));
        $this->data['feedback_count']       = $this->feedback->count();
        $this->data['user_count']           = $this->user->count();
        
        $this->template->show_template($this->data);
        
    }
    
    public function progress()
    {
        $this->data['title']        = 'Progress Tracker';
        $this->data['breadcrumb']   = 'Dashboard';
        
        $this->data['content'] = 'dashboard/progress';
        
        $this->data['user'] = (array) $this->user->get_by(intval($this->session->userdata(SESS_USER_ID)));
        
        $this->template->show_template($this->data);
        
    }
    
}