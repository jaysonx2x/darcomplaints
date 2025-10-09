<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ImageUploader extends ValidatedPages {

    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $this->template->show_404_page($this->data);
    }




    public function uploadLogo()
    {
        if ($this->input->is_ajax_request()) 
        {
            $imageUri   = $this->input->post('file');
            
            $folderPath = 'assets/uploads/avatars';
            
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

            $image_parts = explode(";base64,", $imageUri);

            $image_type_aux = explode($folderPath, $image_parts[0]);

            $image_base64 = base64_decode($image_parts[1]);

            $name = uniqid() . '.png';

            $file = $folderPath . $name;

            $result['status'] = (file_put_contents($file, $image_base64)) ? TRUE : FALSE;
            if($result['status'])
            {
                $result['image_url'] = $file;
            }

            echo json_encode($result);
        }
    }
    
}