<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personel extends CI_Controller {

    function __construct() {
    parent::__construct();
   
    $this->load->model("Personel_Model");
     $this->load->library("session");
       
       if (!isset($_SESSION["id"])) {
        redirect(base_url());
       }
    }
    function index(){
        $data["personel"] = $this->Personel_Model->Get_All_Personel();
        $data["tipler"] = $this->Personel_Model->Get_All_Type();
     $this->load->view("Layouts/Layout");
    $this->load->view("Personel/Index",$data);
    $this->load->view("Layouts/Footer");
   
    }
    function Personel_Ekle(){

       $name = $this->input->post("name");
        $surname = $this->input->post("surname");
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $yetki = $this->input->post("yetki");
        
        if (isset($password)) {
            $password = md5($password);
            $data = array("name"=>$name,"surname"=>$surname,"username"=>$username,"password"=>$password,"user_type"=>$yetki);
            print_r($this->Personel_Model->Add_Personel($data));
        }
     
    }
    function Personel_Duzenle(){
        $name = $this->input->post("name");
        $surname = $this->input->post("surname");
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $yetki = $this->input->post("yetki");
        $id = $this->input->post("id");
        if ($password!="") {
            
            $password = md5($password);
            $data = array("id"=>$id,"name"=>$name,"surname"=>$surname,"username"=>$username,"password"=>$password,"user_type"=>$yetki);
            print_r($this->Personel_Model->Edit_Personel($data));
        }
        else{
            $data = array("id"=>$id,"name"=>$name,"surname"=>$surname,"username"=>$username,"user_type"=>$yetki);
         print_r($this->Personel_Model->Edit_Personel($data));
        }
        
    }
    function Sil(){
        $id = $this->input->post("id");
        print_r($this->Personel_Model->Delete_Personel($id));
    }
}
