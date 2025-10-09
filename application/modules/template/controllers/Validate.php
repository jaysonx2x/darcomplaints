<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Validate extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $this->template->show_login($this->data);
        
    }
    
    
    public function login()
    {
        if ($this->input->is_ajax_request()) 
        {
            $result['status'] = false;
            $result['error'] = '';
            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('passw', TRUE);

            $user = (array) $this->user->get_user($username);

//            if ($user && password_verify($password, $user['passw'])) {
            if ($user && ($password === $user['passw'])) {

                $data = array(
                    SESS_USER_ID        => $user['id'],
                    SESS_USERNAME       => $user['username'],
                    SESS_USER_TYPE      => $user['user_type'],
                    SESS_PROFILE_URL    => $user['profile_url'],
                    SESS_FULLNAME       => $user['fullname'],
                );

                //SAVE DATA IN SESSION
                $this->session->set_userdata($data);

                $this->user->updateLoginStatus(intval($user['id']), 1);

                $result['status'] = true;
            } else {
                $result['error'] = 'Invalid username or password!';
            }

            echo json_encode($result);
            
        }
    }
    
    
    public function forgot_password()
    {
        if ($this->input->is_ajax_request()) 
        {
            $FORGOT_EMAIL = $this->input->post('FORGOT_EMAIL');
            
            $result['status'] = FALSE;
            
            $user_found = (array) $this->user->get_by(array('EMAIL' => $FORGOT_EMAIL));
            if($user_found)
            {
                $result['status'] = TRUE;
                
                $this->load->model('account/Profile_model'  , 'profile');
                $profile = (array) $this->profile->getInfoProfile($user_found['PROFILES_ID']);
                
                $new_passw = uniqid();
                
                $this->load->library('email');
                
                $message = 'Hi ' . $profile['FULLNAME'] . '<br><br>';
                $message .= 'You have successfully reset your password for ' . APP_ALIAS2 . ' Account. <br><br>';
                $message .= 'If this was not you, and you believe that your account may have been compromised, reset your password as soon as possible.<br><br><br>';
                $message .= 'Your new password is: ' . $new_passw . '<br><br><br>';
                $message .= 'Sincerely, <br>';
                $message .= APP_ALIAS2 . ' Team';
                
                // Prepare email
                $this->email
                    ->from(APP_EMAIL, APP_ALIAS2)
                    ->to($FORGOT_EMAIL)
                    ->subject('Reset Password')
                    ->message($message)
                    ->set_mailtype('html');
                    
                // Send
                $result['status'] = $this->email->send();
                
                if($result['status'])
                {
                    // Save new password
                    $data['ASIN']  = $this->__generate_asin();
                    $enc_salt = hash('sha512', base64_encode(trim($new_passw)).$data['ASIN']);    
                    $enc_pass = hash('sha512', $enc_salt);
                    $data['PASSW'] = $enc_pass; 

                    $this->user->update(array('PROFILES_ID' => intval($user_found['PROFILES_ID'])), $data, TRUE);
                }
                
            }
            
            echo json_encode($result);
        }
        
    }
    
    
    private function __generate_asin($length = 64) 
    {
        $candidates = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

        mt_srand();

        $asin = '';

        for ($el = 0; $el < $length; $el ++) 
        {
            $asin .= $candidates[mt_rand(0, strlen($candidates)-1)];
        }

        return $asin;
    }
    
    
    public function logout()
    {
        $profile_id = $this->session->userdata(SESS_PROFILE_ID);
        
        $this->user->updateLoginStatus($profile_id, 0);
        
        $this->session->sess_destroy();
        
        redirect(base_url('login'));
    }
    
    

}
