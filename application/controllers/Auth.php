<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
    }    
    
    public function login() {
        echo Modules::run('template/Validate/login');
    }
    
    public function logout() {
        echo Modules::run('template/Validate/logout');
    }
    
}