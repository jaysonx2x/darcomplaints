<?php

class Template extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function show_landing($data = array()){
        
        $this->load->model('announcement/Announcement_model'    , 'announcement');
        $this->load->model('report/Attachment_model'            , 'attachment');
        
        $announcements = $this->announcement->getAnnouncementsByType();
        if($announcements)
        {
            $data['announcements'] = $announcements;
            foreach ($announcements as $announcement)
            {
                $data['attachments'][$announcement->id] = $this->attachment->get_all_by(array('owner_id' => intval($announcement->id), 'attachment_type' => ATTACHMENT_TYPE_ANNOUNCEMENT));
            }
        }
        
        $this->load->view('template/landing_v', $data);
    }
    
    public function show_login($data = array()){
        $this->load->view('template/login', $data);
    }
    
    public function show_feedback($data = array()){
        $this->load->view('template/feedback_v', $data);
    }
    
    public function show_complaint($data = array()){
        $this->load->view('template/complaint_v', $data);
    }
    
    public function show_template($data = array()){
        $this->load->view('template/template', $data);
    }
    
    public function show_404_page($data = array()){
        $this->load->view('template/404_v', $data);
    }
    
}