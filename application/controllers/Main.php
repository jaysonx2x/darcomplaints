<?php

class Main extends ValidatedPages {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        echo Modules::run('dashboard/Dashboard/index');
    }
    
    public function progress()
    {
        echo Modules::run('dashboard/Dashboard/progress');
    }
    
    
}
