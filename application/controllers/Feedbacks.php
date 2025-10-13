<?php

class Feedbacks extends ValidatedPages {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        echo Modules::run('feedback/Feedback/index');
    }
    
    public function saveFeedback()
    {
        echo Modules::run('feedback/Feedback/saveFeedback');
    }
    
    public function loadFeedbacksDT()
    {
        echo Modules::run('feedback/Feedback/loadFeedbacksDT');
    }
    
    public function getFeedbackDetails()
    {
        echo Modules::run('feedback/Feedback/getFeedbackDetails');
    }
    
    public function deleteFeedback()
    {
        echo Modules::run('feedback/Feedback/deleteFeedback');
    }
    
}