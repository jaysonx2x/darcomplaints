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
        
        $this->data['announcement_count']   = $this->announcement->count();
        $this->data['complaint_count']      = $this->complaint->count();
        $this->data['feedback_count']       = $this->feedback->count();
        $this->data['user_count']           = $this->user->count();
        
        $this->data['complaint_analytics'] = $this->complaint->getComplaintAnalyticsByStatus();
        $this->data['monthly_trends']      = $this->complaint->getMonthlyComplaintTrends(6);
        
        $this->data['module_js'] = array(
//            'https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js'
            base_url('assets/vendors/chartjs/chartjs.js')
        );
        
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