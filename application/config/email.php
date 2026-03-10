<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Email Configuration
| -------------------------------------------------------------------------
| Configure email settings for sending notifications
|
| For Gmail SMTP:
| - Enable "Less secure app access" in Gmail settings
| - OR use App Password if 2FA is enabled
|
| For other SMTP providers, adjust settings accordingly
*/

$config['protocol']     = 'smtp';
$config['smtp_host']    = 'smtp.hostinger.com';  // Change to your SMTP host
$config['smtp_port']    = 465;                // 587 for TLS, 465 for SSL
$config['smtp_user']    = 'info@svciosad.online';  // Change to your email
$config['smtp_pass']    = 'Ph2/a#71?';         // Change to your password
$config['smtp_crypto']  = 'ssl';              // 'tls' or 'ssl'
$config['mailtype']     = 'html';
$config['charset']      = 'utf-8';
$config['newline']      = "\r\n";
$config['crlf']         = "\r\n";
$config['wordwrap']     = TRUE;
$config['validation']   = TRUE;

// Sender Information
$config['sender_email'] = 'info@svciosad.online';  // Change to your email
$config['sender_name']  = "DAR - " . SYSTEM_TITLE;

/*
| -------------------------------------------------------------------------
| Alternative Configuration for Local Testing (using PHP mail())
| -------------------------------------------------------------------------
| Uncomment below and comment out SMTP settings above for local testing
|
| $config['protocol'] = 'mail';
| $config['mailtype'] = 'html';
| $config['charset']  = 'utf-8';
| $config['wordwrap'] = TRUE;
*/
