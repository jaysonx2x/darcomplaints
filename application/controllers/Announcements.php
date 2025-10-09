<?php

class Announcements extends ValidatedPages {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        echo Modules::run('announcement/Announcement/index');
    }
    
    public function saveAnnouncement()
    {
        echo Modules::run('announcement/Announcement/saveAnnouncement');
    }
    
    public function loadAnnouncementDT()
    {
        echo Modules::run('announcement/Announcement/loadAnnouncementDT');
    }
    
    public function getAnnouncementDetails()
    {
        echo Modules::run('announcement/Announcement/getAnnouncementDetails');
    }
    
    
    public function doDeleteAnnouncement()
    {
        echo Modules::run('announcement/Announcement/doDeleteAnnouncement');
    }
    
    public function uploadAttachments()
    {
        echo Modules::run('announcement/Announcement/uploadAttachments');
    }
    
    public function deleteAttachment()
    {
        echo Modules::run('announcement/Announcement/deleteAttachment');
    }
    
}