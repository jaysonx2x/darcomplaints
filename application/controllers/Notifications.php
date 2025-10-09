<?php

class Notifications extends ValidatedPages {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        echo Modules::run('notification/Notification/index');
    }
    
    public function getNotificationDetails() {
        echo Modules::run('notification/Notification/getNotificationDetails');
    }
    
    public function getUserNotifications() {
        echo Modules::run('notification/Notification/getUserNotifications');
    }
    
    public function updateUserNotiStatus() {
        echo Modules::run('notification/Notification/updateUserNotiStatus');
    }
    
}