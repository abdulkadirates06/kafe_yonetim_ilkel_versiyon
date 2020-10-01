<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model("Kategori_Model");
     $this->load->library("session");
       
       if (!isset($_SESSION["id"])) {
        redirect(base_url());
       }
	}
	public function index()
	{
     
		
        $data["kategori"] = $this->Kategori_Model->Get_All_Kategori();
      
        $this->load->view("Layouts/Layout");
        $this->load->view("Kategori/Index",$data);
        $this->load->view("Layouts/Footer");
	}
	public function Kategori_Ekle(){
        $catName = $this->input->post("catName");

        $this->Kategori_Model->Add_Category($catName);
        redirect(htmlspecialchars($_SERVER['HTTP_REFERER']));

    }
    function Kategori_Sil(){
        $id = $this->input->post("id");
        $data = array("id"=>$id);
        return  $result = $this->Kategori_Model->Delete_Category($data);
      }
    function Kategori_Duzenle(){
        $id = $this->input->post("id");
        $catname = $this->input->post("catname");
        $data = array("product_name"=>$catname);
    $result = $this->Kategori_Model->Edit_Category($data,$id);
    print_r($result);  
  }
	

}
