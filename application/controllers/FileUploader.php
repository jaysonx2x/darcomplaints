<?php

class FileUploader extends ValidatedPages {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
//        echo Modules::run('company/Company/index');
    }
    
    public function uploadLogo()
    {
        echo Modules::run('user/ImageUploader/uploadLogo');
    }
    
    public function uploadAttachments()
    {
        echo Modules::run('report/Report/uploadAttachments');
    }
    
}