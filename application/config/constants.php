<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


// ALIASES
 defined('SYSTEM_TITLE')                OR define('SYSTEM_TITLE'            , "Public Assistance Coordinating and Complaints Unit Online System");
 defined('SYSTEM_ALIAS')                OR define('SYSTEM_ALIAS'            , 'PACCUOS'); //small
 defined('APP_LOGO_LINK')               OR define('APP_LOGO_LINK'           , 'assets/img/dar.png');
 
// SESSIONS
defined('SESS_USER_ID')                 OR define('SESS_USER_ID'            , 'userId');
defined('SESS_USERNAME')                OR define('SESS_USERNAME'           , 'username');
defined('SESS_USER_TYPE')               OR define('SESS_USER_TYPE'          , 'user_type');
defined('SESS_PROFILE_URL')             OR define('SESS_PROFILE_URL'        , 'profile_url');
defined('SESS_FULLNAME')                OR define('SESS_FULLNAME'           , 'fullname');

// TABLES
defined('TBL_USERS')                    OR define('TBL_USERS'               , 'users');

// USER TYPE
defined('USER_TYPE_ADMIN')              OR define('USER_TYPE_ADMIN'         , 1);
defined('USER_TYPE_STAFF')              OR define('USER_TYPE_STAFF'         , 2);
defined('USER_TYPE_GUEST')              OR define('USER_TYPE_GUEST'         , 3);

// ATTACHMENT TYPE
defined('ATTACHMENT_TYPE_ANNOUNCEMENT') OR define('ATTACHMENT_TYPE_ANNOUNCEMENT', 1);
defined('ATTACHMENT_TYPE_COMPLAINT')    OR define('ATTACHMENT_TYPE_COMPLAINT'   , 2);
defined('ATTACHMENT_TYPE_FEEDBACK')     OR define('ATTACHMENT_TYPE_FEEDBACK'    , 3);

// NOTIFICATION FOR
defined('NOTI_FOR_SPECIFIC')            OR define('NOTI_FOR_SPECIFIC'           , 0);
defined('NOTI_FOR_ALL')                 OR define('NOTI_FOR_ALL'                , 1);
defined('NOTI_FOR_STUDENTS')            OR define('NOTI_FOR_STUDENTS'           , 2);
defined('NOTI_FOR_SUPS')                OR define('NOTI_FOR_SUPS'               , 3);
defined('NOTI_FOR_SUPS_STUDENTS')       OR define('NOTI_FOR_SUPS_STUDENTS'      , 4);
defined('NOTI_FOR_SUPS_ADMINS')         OR define('NOTI_FOR_SUPS_ADMINS'        , 5);
defined('NOTI_FOR_ADMINS_STUDENTS')     OR define('NOTI_FOR_ADMINS_STUDENTS'    , 6);

// NOTIFICATION TYPE
defined('NOTI_TYPE_ANNOUNCEMENT')       OR define('NOTI_TYPE_ANNOUNCEMENT'      , 1);
defined('NOTI_TYPE_COMPLAINT')          OR define('NOTI_TYPE_COMPLAINT'         , 2);
defined('NOTI_TYPE_FEEDBACK')           OR define('NOTI_TYPE_FEEDBACK'          , 3);