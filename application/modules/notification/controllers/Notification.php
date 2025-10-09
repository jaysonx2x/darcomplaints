<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('notification/Notification_model'    , 'notification');
        $this->load->model('report/Attachment_model'            , 'attachment');
    }
    
    
    public function index()
    {
        $this->data['title'] = 'Notifications';
        
        $this->data['notifications'] = $this->notification->getNotificationsByUser();
        
        $this->data['content'] = 'notification/notifications';
        
        $this->data['module_js'] = array (
            base_url().'assets/js/notifications.js',
        );
        
        $this->template->show_template($this->data);
        
    }
    
    
    public function getUserNotifications() 
    {
        if ($this->input->is_ajax_request()) 
        {
            $result['notifications']    = $this->notification->getNotificationsByUser();
            $result['noti_count']       = $this->notification->getNotificationsByUser(true);
            
            echo json_encode($result);
        }
    }
    
    
    public function updateUserNotiStatus() 
    {
        if ($this->input->is_ajax_request()) 
        {
            $result['status'] = $this->notification->update(array(''));
            
            echo json_encode($result);
        }
    }


    public function getNotificationDetails() 
    {
        if ($this->input->is_ajax_request()) 
        {
            $id = $this->input->post('id');
            
            $result = array();
            
            $notification = (array) $this->notification->get(intval($id));
            if($notification)
            {
                $result['notification'] = $notification;
                
                switch (intval($notification['noti_type'])) 
                {
                    case NOTI_TYPE_REPORT:
                        $this->load->model('report/Report_model', 'report');
                        $result['detail'] = $this->report->getInfoReport(intval($notification['owner_id']));
                        $result['attachments']  = $this->attachment->get_all_by(array('owner_id' => intval($notification['owner_id']), 'attachment_type' => ATTACHMENT_TYPE_REPORT));
                        break;
                    case NOTI_TYPE_ANNOUNCEMENT:
                        $this->load->model('announcement/Announcement_model', 'announcement');
                        $result['detail'] = $this->announcement->getInfoAnnouncement(intval($notification['owner_id']));
                        $result['attachments']  = $this->attachment->get_all_by(array('owner_id' => intval($notification['owner_id']), 'attachment_type' => ATTACHMENT_TYPE_ANNOUNCEMENT));
                        break;
                    case NOTI_TYPE_SENTFILE:
                        $this->load->model('file/Sent_file_model', 'file');
                        $result['detail'] = $this->file->getInfoFile(intval($notification['owner_id']));
                        $result['attachments']  = $this->attachment->get_all_by(array('owner_id' => intval($notification['owner_id']), 'attachment_type' => ATTACHMENT_TYPE_SENTFILE));
                        break;
                }
            }
            
            echo json_encode($result);
        }
    }
    
}