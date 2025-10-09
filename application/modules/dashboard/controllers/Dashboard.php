<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends ValidatedPages {

    public function __construct() {
        parent::__construct();
        $this->load->model('user/User_model'                , 'user');
        $this->load->model('company/Company_model'          , 'company');
        $this->load->model('announcement/Announcement_model', 'announcement');
    }
    
    public function index()
    {
        $this->data['title']        = 'Dashboard';
        $this->data['breadcrumb']   = 'Dashboard';
        
        $this->data['content'] = 'dashboard/dashboard';
        
        $this->data['announcement_count'] = count($this->announcement->getAnnouncementsByType());
        
//        switch (intval($this->session->userdata(SESS_USER_TYPE))) 
//        {
//            case USER_TYPE_ADMIN:
//                $this->data['student_count']    = $this->user->count(array('user_type' => USER_TYPE_STUDENT));
//                $this->data['report_count']     = $this->report->count();
//                $this->data['files_count']      = $this->file->count(array('sent_to' => 1));
//                $this->data['attendance_count'] = $this->attendance->count();
//                $this->data['company_count']    = $this->company->count();
//                $this->data['user_count']       = $this->user->count(array('user_type !=' => USER_TYPE_STUDENT));
//                break;
//            case USER_TYPE_SUPERVISOR:
//                $this->data['student_count']    = $this->user->count(array('company_id' => intval($this->session->userdata(SESS_COMPANY_ID)), 'user_type' => USER_TYPE_STUDENT));
//                $this->data['report_count']     = $this->report->countReport();
//                $this->data['attendance_count'] = $this->attendance->count();
//                $this->data['files_count']      = $this->file->count(array('sent_to' => 2));
//                break;
//            case USER_TYPE_STUDENT:
//                $this->data['report_count']     = $this->report->count(array('submitted_by' => intval($this->session->userdata(SESS_USER_ID))));
//                $this->data['user'] = (array) $this->user->get_by(intval($this->session->userdata(SESS_USER_ID)));
//                $this->data['files_count']      = $this->file->count(array('sent_by' => intval($this->session->userdata(SESS_USER_ID))));
//                break;
//        }
        
        
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