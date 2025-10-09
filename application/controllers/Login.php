<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends ValidatedLogin {
    
    public function __construct() {
        parent::__construct();
    }    

    public function index() {
        echo Modules::run('template/Template/show_login');
    }
    
    public function home() {
        echo Modules::run('template/Template/show_home');
    }
    
    public function finder() {
        echo Modules::run('template/Template/show_finder');
    }
    
    public function faqs() {
        echo Modules::run('template/Template/show_faqs');
    }
    
}