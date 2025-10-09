<?php

class Companies extends ValidatedPages {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        echo Modules::run('company/Company/index');
    }
    
    public function saveCompany()
    {
        echo Modules::run('company/Company/saveCompany');
    }
    
    public function loadCompaniesDT()
    {
        echo Modules::run('company/Company/loadCompaniesDT');
    }
    
    public function getCompanyDetails()
    {
        echo Modules::run('company/Company/getCompanyDetails');
    }
    
    public function deleteCompany()
    {
        echo Modules::run('company/Company/deleteCompany');
    }
    
}