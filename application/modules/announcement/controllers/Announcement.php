<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('announcement/Announcement_model'    , 'announcement');
        $this->load->model('report/Attachment_model'            , 'attachment');
    }
    
    
    public function index()
    {
        $this->data['title'] = 'Announcements';
        
        $this->data['content'] = 'announcement/announcement_table';
        $announcements = $this->announcement->getAnnouncementsByType();
        if($announcements)
        {
            $this->data['announcements'] = $announcements;
            foreach ($announcements as $announcement)
            {
                $this->data['attachments'][$announcement->id] = $this->attachment->get_all_by(array('owner_id' => intval($announcement->id), 'attachment_type' => ATTACHMENT_TYPE_ANNOUNCEMENT));
            }
        }
        
        $this->data['module_css'] = array (
            base_url('assets/vendors/datatables/dataTables.bootstrap4.min.css'),
            base_url('assets/vendors/jquery.filer-1.3.0/css/jquery.filer.css'),
            base_url('assets/vendors/jquery.filer-1.3.0/css/themes/jquery.filer-dragdropbox-theme.css'),
        );
            
        $this->data['module_js'] = array (
            base_url('assets/vendors/datatables/jquery.dataTables.min.js'),
            base_url('assets/vendors/datatables/dataTables.bootstrap4.min.js'),
            base_url('assets/vendors/jquery.validate/jquery.validate.js'),
            base_url('assets/vendors/jquery.filer-1.3.0/js/jquery.filer.min.js'),
            base_url('assets/js/announcements.js'),
            base_url('assets/js/attachments-uploader.js'),
        );
        
        $this->template->show_template($this->data);
        
    }
    
    
    public function saveAnnouncement() 
    {
        if ($this->input->is_ajax_request()) 
        {
            $post = $this->input->post();
            $UPLOADED_FILES = $this->input->post('UPLOADED_FILES');
            
            $result['status'] = $this->announcement->addEditAnnouncement($post);
            if($result['status'])
            {
                if(isset($post['UPLOADED_FILES']) and count($post['UPLOADED_FILES'])>0) 
                {
                    for($i=0; $i<count($UPLOADED_FILES); $i++)
                    {
                        $url = 'assets/uploads/attachments/' . $post['attachment_type'] . '/' . $UPLOADED_FILES[$i];
                        if(!$this->attachment->isFileExists($result['status'], $url))
                        {
                            $result['detail_status'.$i] = $this->attachment->addAttachment($result['status'], array('file_url' => $url, 'attachment_type' => ATTACHMENT_TYPE_ANNOUNCEMENT));
                        } else {
                            $result['detail_status'.$i] = 'exist';
                        }
                    }
                }
                
                if (intval($post['id']) === 0) 
                { 
                    // Create notification
                    $noti_data['owner_id']  = $result['status'];
                    $noti_data['noti_date'] = fn_get_current_date();
                    $noti_data['title']     = 'New Announcement';
                    $noti_data['message']   = $post['title'] . ' - ' . $post['content'];
                    $noti_data['noti_for']  = $post['announcement_type'];
                    $noti_data['notified_by'] = $this->session->userdata(SESS_USER_ID);
                    $noti_data['noti_type'] = NOTI_TYPE_ANNOUNCEMENT;
                    $this->notification->addNotification($noti_data);
                }
            }
            
            echo json_encode($result);
        }
    }
    
    
    public function getAnnouncementDetails() 
    {
        if ($this->input->is_ajax_request()) 
        {
            $id = $this->input->post('id');
            
            $result['announcement'] = $this->announcement->get(intval($id));
            $result['attachments'] = $this->attachment->getAttachmentsByOwnerID(intval($id), ATTACHMENT_TYPE_ANNOUNCEMENT);
            
            echo json_encode($result);
        }
    }
    
    
    public function loadAnnouncementDT() 
    {
        $this->announcement->loadDatatableAnnouncement();
    }
    
    
    
//    public function removeAnnouncementAttachment()
//    {
//        if ($this->input->is_ajax_request()) 
//        {
//            $file = $this->input->post('file');
//            
//            $path = 'assets/uploads/news/' . $file;
//            
//            if(file_exists($path))
//            {
//                unlink($path);
//            }
//        }
//    }
//    
//    
    public function deleteAttachment()
    {
        if ($this->input->is_ajax_request()) 
        {
            $post = $this->input->post();
            
            $result['status'] = $this->attachment->delete(intval($post['id']));
            
            if(file_exists($post['file_url']))
            {
                unlink($post['file_url']);
            }
            
            echo json_encode($result);
        }
    }
    
    
    
    public function doDeleteAnnouncement()
    {
        if ($this->input->is_ajax_request()) 
        {
            $id = $this->input->post('id');
            
            $result['status'] = $this->announcement->delete(intval($id));
            
            echo json_encode($result);
        }
    }
    
}