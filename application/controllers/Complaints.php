<?php

class Complaints extends ValidatedPages {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        echo Modules::run('complaint/Complaint/index');
    }
    
    public function saveComplaint()
    {
        echo Modules::run('complaint/Complaint/saveComplaint');
    }
    
    public function loadComplaintsDT()
    {
        echo Modules::run('complaint/Complaint/loadComplaintsDT');
    }
    
    public function getComplaintDetails()
    {
        echo Modules::run('complaint/Complaint/getComplaintDetails');
    }
    
    public function deleteComplaint()
    {
        echo Modules::run('complaint/Complaint/deleteComplaint');
    }
    
}