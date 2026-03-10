<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Check Internet Connectivity
 * 
 * @return bool TRUE if internet is available, FALSE otherwise
 */
if (!function_exists('check_internet_connection')) {
    function check_internet_connection() {
        // Try to connect to Google's DNS server
        $connected = @fsockopen("www.google.com", 80, $errno, $errstr, 5);
        
        if ($connected) {
            fclose($connected);
            return TRUE;
        }
        
        // Fallback: Try to connect to Cloudflare DNS
        $connected = @fsockopen("1.1.1.1", 80, $errno, $errstr, 5);
        
        if ($connected) {
            fclose($connected);
            return TRUE;
        }
        
        return FALSE;
    }
}

/**
 * Send Email Notification
 * 
 * @param string $to Recipient email address
 * @param string $subject Email subject
 * @param string $message Email message (HTML)
 * @return bool TRUE on success, FALSE on failure
 */
if (!function_exists('send_email_notification')) {
    function send_email_notification($to, $subject, $message) {
        // Check internet connectivity first
        if (!check_internet_connection()) {
            log_message('error', 'Email not sent - No internet connection available');
            return FALSE;
        }
        
        $CI =& get_instance();
        
        // Load email library and configuration
        $CI->load->library('email');
        $CI->load->config('email');
        
        // Get email configuration
        $sender_email = $CI->config->item('sender_email');
        $sender_name = $CI->config->item('sender_name');
        
        // Set email parameters
        $CI->email->from($sender_email, $sender_name);
        $CI->email->to($to);
        $CI->email->subject($subject);
        $CI->email->message($message);
        
        // Send email
        if ($CI->email->send()) {
            return TRUE;
        } else {
            // Log error for debugging
            log_message('error', 'Email sending failed: ' . $CI->email->print_debugger());
            return FALSE;
        }
    }
}

/**
 * Send Complaint Created Email
 * 
 * @param array $complaint_data Complaint data
 * @return bool TRUE on success, FALSE on failure
 */
if (!function_exists('send_complaint_created_email')) {
    function send_complaint_created_email($complaint_data) {
        $to = $complaint_data['email'];
        $subject = 'Complaint Received - ' . $complaint_data['control_no'];
        
        $message = '
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: linear-gradient(135deg, #28a745 0%, #20c997 100%); color: white; padding: 20px; text-align: center; border-radius: 5px 5px 0 0; }
                .content { background: #f8f9fa; padding: 30px; border: 1px solid #dee2e6; }
                .footer { background: #343a40; color: white; padding: 15px; text-align: center; font-size: 12px; border-radius: 0 0 5px 5px; }
                .info-box { background: white; padding: 15px; margin: 15px 0; border-left: 4px solid #28a745; border-radius: 3px; }
                .label { font-weight: bold; color: #495057; }
                .value { color: #212529; margin-bottom: 10px; }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h2>Complaint Received</h2>
                </div>
                <div class="content">
                    <p>Dear <strong>' . htmlspecialchars($complaint_data['fullname']) . '</strong>,</p>
                    
                    <p>Thank you for submitting your complaint to the Department of Agrarian Reform - Public Assistance Coordinating and Complaints Unit.</p>
                    
                    <div class="info-box">
                        <div class="value">
                            <span class="label">Control Number:</span> ' . htmlspecialchars($complaint_data['control_no']) . '
                        </div>
                        <div class="value">
                            <span class="label">Date Filed:</span> ' . date('F d, Y', strtotime($complaint_data['complaint_date'])) . '
                        </div>
                        <div class="value">
                            <span class="label">Status:</span> <span style="color: #ffc107;">Pending</span>
                        </div>
                    </div>
                    
                    <p><strong>Your Concern:</strong></p>
                    <div class="info-box">
                        <p style="white-space: pre-line;">' . htmlspecialchars($complaint_data['concerns']) . '</p>
                    </div>
                    
                    <p>Your complaint has been received and is currently being reviewed by our team. We will update you on the status of your complaint via email.</p>
                    
                    <p>Please keep your control number (<strong>' . htmlspecialchars($complaint_data['control_no']) . '</strong>) for future reference.</p>
                    
                    <p>If you have any questions, please contact us.</p>
                    
                    <p>Best regards,<br>
                    <strong>DAR Public Assistance Coordinating and Complaints Unit</strong></p>
                </div>
                <div class="footer">
                    &copy; ' . date('Y') . ' Department of Agrarian Reform. All rights reserved.
                </div>
            </div>
        </body>
        </html>
        ';
        
        return send_email_notification($to, $subject, $message);
    }
}

/**
 * Send Complaint Status Update Email
 * 
 * @param array $complaint_data Complaint data with updated status
 * @return bool TRUE on success, FALSE on failure
 */
if (!function_exists('send_complaint_status_update_email')) {
    function send_complaint_status_update_email($complaint_data) {
        $to = $complaint_data['email'];
        
        // Determine status text and color
        $status_info = get_complaint_status_info($complaint_data['status']);
        
        $subject = 'Complaint Status Update - ' . $complaint_data['control_no'];
        
        $message = '
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: linear-gradient(135deg, ' . $status_info['gradient'] . '); color: white; padding: 20px; text-align: center; border-radius: 5px 5px 0 0; }
                .content { background: #f8f9fa; padding: 30px; border: 1px solid #dee2e6; }
                .footer { background: #343a40; color: white; padding: 15px; text-align: center; font-size: 12px; border-radius: 0 0 5px 5px; }
                .info-box { background: white; padding: 15px; margin: 15px 0; border-left: 4px solid ' . $status_info['color'] . '; border-radius: 3px; }
                .status-badge { display: inline-block; padding: 8px 15px; background: ' . $status_info['color'] . '; color: white; border-radius: 20px; font-weight: bold; }
                .label { font-weight: bold; color: #495057; }
                .value { color: #212529; margin-bottom: 10px; }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h2>Complaint Status Updated</h2>
                </div>
                <div class="content">
                    <p>Dear <strong>' . htmlspecialchars($complaint_data['fullname']) . '</strong>,</p>
                    
                    <p>We would like to inform you that the status of your complaint has been updated.</p>
                    
                    <div class="info-box">
                        <div class="value">
                            <span class="label">Control Number:</span> ' . htmlspecialchars($complaint_data['control_no']) . '
                        </div>
                        <div class="value">
                            <span class="label">Date Filed:</span> ' . date('F d, Y', strtotime($complaint_data['complaint_date'])) . '
                        </div>
                        <div class="value">
                            <span class="label">Current Status:</span> <span class="status-badge">' . $status_info['text'] . '</span>
                        </div>
                        ' . (!empty($complaint_data['addressed_by']) ? '
                        <div class="value">
                            <span class="label">Addressed By:</span> ' . htmlspecialchars($complaint_data['addressed_by']) . '
                        </div>
                        ' : '') . '
                        ' . (!empty($complaint_data['addressed_date']) ? '
                        <div class="value">
                            <span class="label">Addressed Date:</span> ' . date('F d, Y', strtotime($complaint_data['addressed_date'])) . '
                        </div>
                        ' : '') . '
                    </div>
                    
                    <p><strong>Your Concern:</strong></p>
                    <div class="info-box">
                        <p style="white-space: pre-line;">' . htmlspecialchars($complaint_data['concerns']) . '</p>
                    </div>
                    
                    ' . get_status_message($complaint_data['status']) . '
                    
                    <p>If you have any questions or concerns, please do not hesitate to contact us.</p>
                    
                    <p>Best regards,<br>
                    <strong>DAR Public Assistance Coordinating and Complaints Unit</strong></p>
                </div>
                <div class="footer">
                    &copy; ' . date('Y') . ' Department of Agrarian Reform. All rights reserved.
                </div>
            </div>
        </body>
        </html>
        ';
        
        return send_email_notification($to, $subject, $message);
    }
}

/**
 * Get complaint status information
 * 
 * @param int $status Status code
 * @return array Status information
 */
if (!function_exists('get_complaint_status_info')) {
    function get_complaint_status_info($status) {
        switch (intval($status)) {
            case 0:
                return [
                    'text' => 'Pending',
                    'color' => '#ffc107',
                    'gradient' => '#ffc107 0%, #fd7e14 100%'
                ];
            case 2:
                return [
                    'text' => 'Resolved',
                    'color' => '#28a745',
                    'gradient' => '#28a745 0%, #20c997 100%'
                ];
            case 3:
                return [
                    'text' => 'Rejected',
                    'color' => '#dc3545',
                    'gradient' => '#dc3545 0%, #e83e8c 100%'
                ];
            default:
                return [
                    'text' => 'Unknown',
                    'color' => '#6c757d',
                    'gradient' => '#6c757d 0%, #495057 100%'
                ];
        }
    }
}

/**
 * Get status-specific message
 * 
 * @param int $status Status code
 * @return string HTML message
 */
if (!function_exists('get_status_message')) {
    function get_status_message($status) {
        switch (intval($status)) {
            case 0:
                return '<p>Your complaint is currently <strong>pending</strong> and is being reviewed by our team. We will update you once there is progress.</p>';
            case 2:
                return '<p>We are pleased to inform you that your complaint has been <strong>resolved</strong>. Thank you for bringing this matter to our attention.</p>';
            case 3:
                return '<p>After careful review, your complaint has been <strong>rejected</strong>. If you have additional information or would like to discuss this further, please contact us.</p>';
            default:
                return '<p>Your complaint status has been updated.</p>';
        }
    }
}
