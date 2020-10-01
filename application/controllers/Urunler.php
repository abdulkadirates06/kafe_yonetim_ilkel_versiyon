<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Urunler extends CI_Controller {

    function __construct() {
        parent::__construct();
      $this->load->model("Urun_Model");
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      $this->load->library("session");
      if (!isset($_SESSION["id"])) {
        redirect(base_url());
       }
     
     
    }

    function index(){
      
        $data["urunler"] = $this->Urun_Model->Get_All_Urun();
        $data["kategoriler"] = $this->Urun_Model->Kategori_Getir();
        $this->load->view("Layouts/Layout");
        $this->load->view("Urunler/Index",$data);
        $this->load->view("Layouts/Footer");
        
    }

    function UrunGetir(){

    }
    function Sil(){
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        return $this->Urun_Model->Delete_Where_Urun($id);
        
    }


    public function urun_Guncelle(){
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $un = isset($_POST['un']) ? $_POST['un'] : NULL;
        $pr = isset($_POST['pr']) ? $_POST['pr'] : NULL;
        if(isset($id) && isset($un)){
            $data = array('product_name'=>$un,
            'price'=>$pr);
            print_r($this->Urun_Model->Update_Urun($data,$id));
        }
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
                $data = array('upload_data' => $this->upload->data());
                $uname =  $this->input->post("uname");
                $utype = $this->input->post("utype");
                $uprice = $this->input->post("uprice");
                if(isset($uname) && isset($utype) && isset($uprice)){
                    $data = array('product_name'=>$uname,'product_type'=>$utype,'price'=>$uprice,'product_image'=>$data["upload_data"]['file_name']);
                    $result = $this->Urun_Model->Insert_Urun($data);
                    if($result == 1){
                        redirect('Urunler/');
                    }
                }
               
                
               
            }
    }
}
?>