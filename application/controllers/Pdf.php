<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends ValidatedPages 
{
    public function __construct() {
        parent::__construct();
    }    
    
    public function students($company_id=0, $batch_id=0) {
        echo Modules::run('student/Student/pdfStudents', $company_id, $batch_id);
    }
    
    public function reports() {
        echo Modules::run('report/Report/pdfReports');
    }
    
    public function attendances($user_id=0) {
        echo Modules::run('attendance/Attendance/pdfAttendance', $user_id);
    }
    
    public function companies() {
        echo Modules::run('company/Company/pdfCompanies');
    }
    
    public function users() {
        echo Modules::run('user/User/pdfUsers');
    }
    
}
