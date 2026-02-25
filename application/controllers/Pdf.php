<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends ValidatedPages 
{
    public function __construct() {
        parent::__construct();
    }    
    
    public function complaint($complaint_id=0) {
        echo Modules::run('complaint/Complaint/pdfComplaint', $complaint_id);
    }
    
    public function complaints() {
        echo Modules::run('complaint/Complaint/pdfComplaints');
    }
    
    public function feedback($feedback_id=0) {
        echo Modules::run('feedback/Feedback/pdfFeedback', $feedback_id);
    }
    
    public function feedbacks() {
        echo Modules::run('feedback/Feedback/pdfFeedbacks');
    }
    
    public function users() {
        echo Modules::run('user/User/pdfUsers');
    }
    
}
