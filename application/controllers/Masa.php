<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class Masa extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->view("Layouts/Layout");
         $this->load->model("Masa_Model");
         $this->load->library("session");
       
       if (!isset($_SESSION["id"])) {
        redirect(base_url());
       }
            
        }
        public function index()
        {
         
          $data["masalar"] = $this->Masa_Model->Get_All_Masa();
          $this->load->view("Masa/Index",$data);
          $this->load->view("Layouts/Footer");
        }
        function  Masa_Ekle(){
          $tname = $this->input->post("tname");
          $data = array("table_name"=>$tname,"is_busy"=>1);

          $result = $this->Masa_Model->Masa_Ekle($data);
          redirect(htmlspecialchars($_SERVER['HTTP_REFERER']));
        }
        function Masa_Sil(){
          $tid = $this->input->post("id");
          $data = array("id"=>$tid);
          return  $result = $this->Masa_Model->Masa_Sil($data);
        }
      function Masa_Duzenle(){
        $tid = $this->input->post("id");
        $tname = $this->input->post("tname");
        $data = array("table_name"=>$tname);
    $result = $this->Masa_Model->Masa_Duzenle($data,$tid);
    print_r($result);  
  }
  function Masa_Olustur(){
    $tnameTop = $this->input->post("tnameTop");
    $tCount = $this->input->post("tCount");
    
     $this->Masa_Model->Masa_Generator($tnameTop." - ",$tCount);
     redirect(htmlspecialchars($_SERVER['HTTP_REFERER']));
  }
       
}