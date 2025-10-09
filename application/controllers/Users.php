<?php

class Users extends ValidatedPages {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        echo Modules::run('user/User/index');
    }
    
    public function profile() {
        echo Modules::run('user/User/profile');
    }
    
    public function loadUsersDT() {
        echo Modules::run('user/User/loadUsersDT');
    }
    
    public function saveUser() {
        echo Modules::run('user/User/saveUser');
    }
    
    public function getUserDetails() {
        echo Modules::run('user/User/getUserDetails');
    }
    
    public function deleteUser() {
        echo Modules::run('user/User/deleteUser');
    }
    
    public function updateUserProfile() {
        echo Modules::run('user/User/updateUserProfile');
    }
    
    public function saveProfilePicture() {
        echo Modules::run('user/User/saveProfilePicture');
    }
    
}