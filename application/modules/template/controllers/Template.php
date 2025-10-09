<?php

class Template extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function show_login($data = array()){
        $this->load->view('template/login', $data);
    }
    
    public function show_timekeeper($data = array()){
        $this->load->view('template/timekeeper_v', $data);
    }
    
    public function show_template($data = array()){
        $this->load->view('template/template', $data);
    }
    
    public function show_404_page($data = array()){
        $this->load->view('template/404_v', $data);
    }
    
}