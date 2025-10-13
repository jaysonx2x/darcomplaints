<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outside extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
    }    

    public function index() {
        echo Modules::run('template/Template/show_landing');
    }

    public function feedback() {
        echo Modules::run('template/Template/show_feedback');
    }

    public function complaint() {
        echo Modules::run('template/Template/show_complaint');
    }

    public function saveComplaint()
    {
        echo Modules::run('complaint/Complaint/saveComplaint');
    }

    public function saveFeedback()
    {
        echo Modules::run('feedback/Feedback/saveFeedback');
    }
    
}