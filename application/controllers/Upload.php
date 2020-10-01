<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class Upload extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->library("session");
       
       if (!isset($_SESSION["id"])) {
        redirect(base_url());
       }
            
        }
        public function index()
        {
          
        }
        public function urun_Ekle()
        {
                $config['upload_path']          = './assets/images/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;
                $config['max_width']            = 1920;
                $config['max_height']           = 1080;
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('userfile'))
                {
                        
                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
                    $error = array('error' => $this->upload->display_errors());
                  
                }
                else
                {
                    $uname =  $this->input->post("uname");
                    $utype = $this->input->post("utype");
                    $uprice = $this->input->post("uprice");
                    if(isset($uname) && isset($utype) && isset($uprice)){
                        $data = array('product_name'=>$uname,'product_type'=>$utype,'price'=>$uprice,'product_image'=>$config['file_name']);
                        $result = $this->Urun_Model->Insert_Urun($data);
                        if($result == 1){
                            redirect('Urunler/');
                        }
                    }
                   
                    $data = array('upload_data' => $this->upload->data());
                   
                }
        }
}